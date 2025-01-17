<?php

/* - - - - - - - - - - - - - - - - - - - - -

 Title : PHP Quick Profiler Class
 Author : Created by Ryan Campbell
 URL : http://particletree.com/features/php-quick-profiler/

 Last Updated : April 22, 2009

 Description : This class processes the logs and organizes the data
 for output to the browser. Initialize this class with a start time at
 the beginning of your code, and then call the display method when your code
 is terminating.

- - - - - - - - - - - - - - - - - - - - - */

class PhpQuickProfiler {
	
	public $output = array();
	public $config = '';
	
	public $path_to_classes = '';
	public $url_to_classes = '';
	
	public function __construct($startTime, $config = '/profiler/')
	{
		$this->startTime = $startTime;
		$this->config = $config;		
		$this->path_to_classes = SHIN_Core::$_config['core']['base_path'].SHIN_Core::$_config['core']['shinfw_folder'].'/libraries';		
		$this->url_to_classes = SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/libraries/profiler/';
	}
	
	/*-------------------------------------------
	     FORMAT THE DIFFERENT TYPES OF LOGS
	-------------------------------------------*/
	
	public function gatherConsoleData() {
		$logs = Console::getLogs();
		if($logs['console']) {
			foreach($logs['console'] as $key => $log) {
				if($log['type'] == 'log') {
					$logs['console'][$key]['data'] = print_r($log['data'], true);
				}
				elseif($log['type'] == 'memory') {
					$logs['console'][$key]['data'] = $this->getReadableFileSize($log['data']);
				}
				elseif($log['type'] == 'speed') {
					$logs['console'][$key]['data'] = $this->getReadableTime(($log['data'] - $this->startTime)*1000);
				}
			}
		}
		$this->output['logs'] = $logs;
	}
	
	/*-------------------------------------------
	    AGGREGATE DATA ON THE FILES INCLUDED
	-------------------------------------------*/
	
	public function gatherFileData() {
		$files = get_included_files();
		$fileList = array();
		$fileTotals = array(
			"count" => count($files),
			"size" => 0,
			"largest" => 0,
		);

		foreach($files as $key => $file) {
			$size = filesize($file);
			$fileList[] = array(
					'name' => $file,
					'size' => $this->getReadableFileSize($size)
				);
			$fileTotals['size'] += $size;
			if($size > $fileTotals['largest']) $fileTotals['largest'] = $size;
		}
		
		$fileTotals['size'] = $this->getReadableFileSize($fileTotals['size']);
		$fileTotals['largest'] = $this->getReadableFileSize($fileTotals['largest']);
		$this->output['files'] = $fileList;
		$this->output['fileTotals'] = $fileTotals;
	}
	
	/*-------------------------------------------
	     MEMORY USAGE AND MEMORY AVAILABLE
	-------------------------------------------*/
	
	public function gatherMemoryData() {
		$memoryTotals = array();
		$memoryTotals['used'] = $this->getReadableFileSize(memory_get_peak_usage());
		$memoryTotals['total'] = ini_get("memory_limit");
		$this->output['memoryTotals'] = $memoryTotals;
	}
	
	/*--------------------------------------------------------
	     QUERY DATA -- DATABASE OBJECT WITH LOGGING REQUIRED
	----------------------------------------------------------*/
	
	public function gatherQueryData() {
		$queryTotals = array();
		$queryTotals['count'] = 0;
		$queryTotals['time'] = 0;
		$queries = array();
		
		if($this->db != '') {
			$queryTotals['count'] += $this->db->total_queries();
			foreach($this->db->queries as $key => $query) {
				$query = $this->attemptToExplainQuery($query);
				if($query==NULL)continue;				
				$queryTotals['time'] += $query['time'];
				$query['time'] = $this->getReadableTime($query['time']);
				$queries[] = $query;
			}
		}
		
		$queryTotals['time'] = $this->getReadableTime($queryTotals['time']);
		$this->output['queries'] = $queries;
		$this->output['queryTotals'] = $queryTotals;
	}
	
	/*--------------------------------------------------------
	     CALL SQL EXPLAIN ON THE QUERY TO FIND MORE INFO
	----------------------------------------------------------*/
	
	function attemptToExplainQuery($query) {
		try {
			$_query = strtolower($query['sql']);
			
			$pos1 = strpos($_query, 'delete');
			$pos2 = strpos($_query, 'update');
			$pos3 = strpos($_query, 'insert');
			
			if($pos1 === 0 || $pos2 === 0 || $pos3 === 0) return $query;
			$sql = 'EXPLAIN '.$query['sql'];
			$rs_query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
		}
		catch(Exception $e) {}
		if($rs_query) {
		
			if ($rs_query->num_rows() > 0){
				foreach ($rs_query->result() as $row){
					$query['explain'] = $row;
				}
			} 		
		}
		return $query;
	}
	
	/*-------------------------------------------
	     SPEED DATA FOR ENTIRE PAGE LOAD
	-------------------------------------------*/
	
	public function gatherSpeedData() {
		$speedTotals = array();
		$speedTotals['total'] = $this->getReadableTime(($this->getMicroTime() - $this->startTime)*1000);
		$speedTotals['allowed'] = ini_get("max_execution_time");
		$this->output['speedTotals'] = $speedTotals;
	}
	
	/*-------------------------------------------
	     HELPER FUNCTIONS TO FORMAT DATA
	-------------------------------------------*/
	
	static function getMicroTime() {
		$time = microtime();
		$time = explode(' ', $time);
		return $time[1] + $time[0];
	}
	
	public function getReadableFileSize($size, $retstring = null) {
        	// adapted from code at http://aidanlister.com/repos/v/function.size_readable.php
	       $sizes = array('bytes', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

	       if ($retstring === null) { $retstring = '%01.2f %s'; }

		$lastsizestring = end($sizes);

		foreach ($sizes as $sizestring) {
	       	if ($size < 1024) { break; }
	           if ($sizestring != $lastsizestring) { $size /= 1024; }
	       }
	       if ($sizestring == $sizes[0]) { $retstring = '%01d %s'; } // Bytes aren't normally fractional
	       return sprintf($retstring, $size, $sizestring);
	}
	
	public function getReadableTime($time) {
		$ret = $time;
		$formatter = 0;
		$formats = array('ms', 's', 'm');
		if($time >= 1000 && $time < 60000) {
			$formatter = 1;
			$ret = ($time / 1000);
		}
		if($time >= 60000) {
			$formatter = 2;
			$ret = ($time / 1000) / 60;
		}
		$ret = number_format($ret,3,'.','') . ' ' . $formats[$formatter];
		return $ret;
	}
	
	/*---------------------------------------------------------
	     DISPLAY TO THE SCREEN -- CALL WHEN CODE TERMINATING
	-----------------------------------------------------------*/
	
	public function display($db = '', $master_db = '') {
		$this->db = $db;
		$this->master_db = $master_db;
		$this->gatherConsoleData();
		$this->gatherFileData();
		$this->gatherMemoryData();
		$this->gatherSpeedData();

		if($this->db){
			$this->gatherQueryData();
		}


		$path = $this->path_to_classes.$this->config;
		
		require_once($path.'display.php');
		displayPqp($this->output, $path, $this->url_to_classes);
	}
	
}

?>
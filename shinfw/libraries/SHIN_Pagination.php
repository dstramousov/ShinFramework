<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Message.php
 */

// ------------------------------------------------------------------------


define('PAGER_UP',		'up');
define('PAGER_DOWN',	'down');


/**
 *  Pagination class. This is wrapper.
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Pagination.php
 */
class SHIN_Pagination
{
	var $paginator = NULL;

	public function __construct($css_file = NULL, $params = array())
	{
		if(SHIN_Core::is_mobile()){
			$this->paginator = new SHIN_MobilePagination($css_file = NULL, $params = array());
		} else {
			$this->paginator = new SHIN_NormalPagination($css_file = NULL, $params = array());
		}
	}
   
	public function get_limit_clause()
	{
		return $this->paginator->get_limit_clause();
	}
   
	public function initialize($params = array())
	{
		$this->paginator->initialize($params);
	}
	
	public function create_per_page_selector()
	{
		return $this->paginator->create_per_page_selector();
	}
	   
	public function create_links($_mode = PAGER_UP)
	{
		return $this->paginator->create_links($_mode);
	}
} // end of class



/**
 * Normal Pagination class
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Pagination.php
 */

class SHIN_NormalPagination
{
	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows  		= ''; // Total number of items (database results)
	var $per_page	 		= 18; // Max number of items you want shown per page
	var $num_links			=  5; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page	 		=  0; // The current page being viewed
	var $first_link   		= '&lsaquo; First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $first_url			= ''; // Alternative URL for the First Page.
	var $cur_tag_open		= '&nbsp;<strong>';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'cur_page';
	var $selector_dom_name 	= 'per_page';
	var $display_pages		= TRUE;
	var $anchor_class		= '';

	var $__init_param		= array();

	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
    public function __construct($css_file = NULL, $params = array())
    {   
		$this->initialize($params);

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		SHIN_Core::log('debug', 'Pagination Class Initialized');
        
		Console::logSpeed('Pagination Class Initialized, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Pagination. Size of class: ');
	}
	
	// --------------------------------------------------------------------

	/**
	 * Return LIMIT clause based on current values of $this->offset and $this->rows
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
    function get_limit_clause() 
	{	
		if(!is_numeric($this->cur_page) || $this->cur_page == NULL){
			// TODO need think about this. Right now i`m just show error.
			//SHIN_Core::show_error('Invalid pager parameters. Pls check URL.');
			$this->cur_page = 0;
		}
	
        $limit = "$this->cur_page, $this->per_page";

        return $limit;
    }
	
	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
        include(SHIN_Core::isConfigExists('paging.php'));
		
		foreach ($pager as $key => $val){$this->$key = $val;}
		
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}
	
	
	/**
	 * Generate "per page" selector 
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function create_per_page_selector()
	{
		$ret = array();
		
		$options = SHIN_Core::$_config['input']['item_per_page_values'];
		
		// analyse $options for lng_label /////////////////////////////
		// each application can override values for user For example: small/normall/big/biggest and offcource this is multilanguage.
		foreach($options as $k=>$v){
			if(!is_int($v)){
				$options[$k] = SHIN_Core::$_language->line($v);
			}
		}
			
		$nedded_libs = array('help' => array('form'));
		SHIN_Core::postInit($nedded_libs);
		
		array_push($ret, form_dropdown($this->selector_dom_name.'_up', $options, $this->per_page, 'onchange="$(\'form[name=' . SHIN_Core::$_config['input']['pager_selector_form_name'].'_up' . '\]\')[0].submit();"'));
		array_push($ret, form_dropdown($this->selector_dom_name.'_down', $options, $this->per_page, 'onchange="$(\'form[name=' . SHIN_Core::$_config['input']['pager_selector_form_name'] .'_down'. '\]\')[0].submit();"'));

		return $ret;
	}
	

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links($_mode = PAGER_UP)
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}
		
		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Only one page
		if ($num_pages == 1)
		{
			//return '';
		}
		

		// Determine the current page number.
		if (SHIN_Core::$_config['input']['enable_query_strings'] === TRUE OR $this->page_query_string === TRUE)
		{
			if (SHIN_Core::$_input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = SHIN_Core::$_input->get($this->query_string_segment);
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if (SHIN_Core::$_libs['uri']->segment($this->uri_segment) != 0)
			{
				$this->cur_page = SHIN_Core::$_libs['uri']->segment($this->uri_segment);
				$this->cur_page = (int) $this->cur_page;
			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			SHIN_Core::show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if (SHIN_Core::$_config['input']['enable_query_strings'] === TRUE OR $this->page_query_string === TRUE)
		{		
			// clear current url
			preg_match("/(.*)&".$this->query_string_segment."=(.*)/", $this->base_url, $out);
			if($out){
				$this->base_url = $out[1];
			}

			$question_sight = strpos($this->base_url, '?');

			if ($question_sight === false) {$limiter = '?';} else {$limiter = '&amp;';}					
			$this->base_url = rtrim($this->base_url).$limiter.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}

		
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;
								
			if ($i == 0 && $this->first_url != '')
			{
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;				
			}
			else
			{
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
		
		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				$i = ($loop * $this->per_page) - $this->per_page;

				if ($i >= 0)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == 0) ? '' : $i;
					
						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$loop.'</a>'.$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;
						
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$loop.'</a>'.$this->num_tag_close."\n";
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page * $this->per_page).$this->suffix.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}
		
		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;
        
        if(SHIN_Core::$_config['input']['wrap_pager_in_form']){
		    $__per_page_selector_src_html = $this->create_per_page_selector();

			$attributes_up = array('id' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_up', 'name' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_up');
			$attributes_down = array('id' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_down', 'name' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_down');
			
			// if router works we have application, if not - simple script w/o routing
			$url_back = '';
//			$__tmp = '';
//			if(isset(SHIN_Core::$_libs['router'])){			
//				if(SHIN_Core::$_config['core']['index_page']){$__tmp = SHIN_Core::$_config['core']['index_page'].'/';}
//				$url_back = $__tmp.last_segment();
//				$url_back = last_segment();
//			} else {				
				$url_back = last_segment();
//			}
			
//			dump($url_back);
			
			$_form_open_up = form_open($url_back, $attributes_up);
			$_form_open_down = form_open($url_back, $attributes_down);
						
			$__t1 = SHIN_Core::$_config['input']['item_per_page_sight'] ? $__per_page_selector_src_html[0] : '';
			$__t2 = SHIN_Core::$_config['input']['item_per_page_sight'] ? $__per_page_selector_src_html[1] : '';
			$out = array();
			$s = $_form_open_up."\n".
						$output.
						SHIN_Core::$_config['input']['selector_pager_delimiter'].
						$__t1.
						form_close();
			array_push($out, $s);

			$s = $_form_open_down."\n".
						$output.
						SHIN_Core::$_config['input']['selector_pager_delimiter'].
						$__t2.
						form_close();
			array_push($out, $s);
		}

		return $out;
	} // end of function 	
	
}// END normal pagination Class


/**
 * Mobile Pagination class
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Pagination.php
 */

class SHIN_MobilePagination
{
	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows  		= ''; // Total number of items (database results)
	var $per_page	 		= 18; // Max number of items you want shown per page
	var $num_links			=  5; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page	 		=  0; // The current page being viewed
	var $first_link   		= '&lsaquo; First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $first_url			= ''; // Alternative URL for the First Page.
	var $cur_tag_open		= '&nbsp;<strong data-inline="true" data-role="button">';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'cur_page';
	var $selector_dom_name 	= 'per_page';
	var $display_pages		= TRUE;
	var $anchor_class		= '';

	var $__init_param		= array();

	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
    public function __construct($css_file = NULL, $params = array())
    {   
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		SHIN_Core::log('debug', 'Pagination Class Initialized');
        
		Console::logSpeed('Pagination Class Initialized, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Pagination. Size of class: ');
	}
	
	// --------------------------------------------------------------------

	/**
	 * Return LIMIT clause based on current values of $this->offset and $this->rows
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
    function get_limit_clause() 
	{	
		if(!is_numeric($this->cur_page) || $this->cur_page == NULL){
			// TODO need think about this. Right now i`m just show error.
			//SHIN_Core::show_error('Invalid pager parameters. Pls check URL.');
			$this->cur_page = 0;
		}
	
        $limit = "$this->cur_page, $this->per_page";

        return $limit;
    }
	
	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
        include(SHIN_Core::isConfigExists('paging.php'));
		
		foreach ($pager as $key => $val){$this->$key = $val;}
		
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}
	
	
	/**
	 * Generate "per page" selector 
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function create_per_page_selector()
	{
		$ret = array();
		
		$options = SHIN_Core::$_config['input']['item_per_page_values'];
		
		// analyse $options for lng_label /////////////////////////////
		// each application can override values for user For example: small/normall/big/biggest and offcource this is multilanguage.
		foreach($options as $k=>$v){
			if(!is_int($v)){
				$options[$k] = SHIN_Core::$_language->line($v);
			}
		}
			
		$nedded_libs = array('help' => array('form'));
		SHIN_Core::postInit($nedded_libs);
		
		array_push($ret, form_dropdown($this->selector_dom_name.'_up', $options, $this->per_page, 'data-native-menu="false" onchange="$(\'form[name=' . SHIN_Core::$_config['input']['pager_selector_form_name'].'_up' . ']\')[0].submit();"'));
		array_push($ret, form_dropdown($this->selector_dom_name.'_down', $options, $this->per_page, 'data-native-menu="false" onchange="$(\'form[name=' . SHIN_Core::$_config['input']['pager_selector_form_name'] .'_down'. ']\')[0].submit();"'));
		//dump($ret);
		return $ret;
	}
	

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links($_mode = PAGER_UP)
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}
		
		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Only one page
		if ($num_pages == 1)
		{
			//return '';
		}
		
		// Determine the current page number.
		if (SHIN_Core::$_config['input']['enable_query_strings'] === TRUE OR $this->page_query_string === TRUE)
		{
			if (SHIN_Core::$_input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = SHIN_Core::$_input->get($this->query_string_segment);
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if (SHIN_Core::$_libs['uri']->segment($this->uri_segment) != 0)
			{
				$this->cur_page = SHIN_Core::$_libs['uri']->segment($this->uri_segment);
				$this->cur_page = (int) $this->cur_page;
			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			SHIN_Core::show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;
		

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if (SHIN_Core::$_config['input']['enable_query_strings'] === TRUE OR $this->page_query_string === TRUE)
		{		
			// clear current url
			preg_match("/(.*)&".$this->query_string_segment."=(.*)/", $this->base_url, $out);
			if($out){
				$this->base_url = $out[1];
			}

			$question_sight = strpos($this->base_url, '?');

			if ($question_sight === false) {$limiter = '?';} else {$limiter = '&amp;';}					
			$this->base_url = rtrim($this->base_url).$limiter.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}

		
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a data-inline="true" data-ajax="false" data-role="button"'.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;
								
			if ($i == 0 && $this->first_url != '')
			{
				//$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;				
				$output .= $this->prev_tag_open.'<a data-inline="true" data-ajax="false" data-role="button"'.$this->anchor_class.'href="'.$this->first_url.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
			else
			{
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a data-inline="true" data-ajax="false" data-role="button"'.$this->anchor_class.'href="'.$this->base_url.$i.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
		
		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				$i = ($loop * $this->per_page) - $this->per_page;

				if ($i >= 0)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == 0) ? '' : $i;
					
						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.'<a data-inline="true" data-ajax="false" data-role="button" '.$this->anchor_class.'href="'.$this->first_url.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$loop.'</a>'.$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;
//							$output .= $this->num_tag_open.'<input type="submit" value="'.$loop.'" onclick="$(#cur_page).val('.$this->per_page.');">';
						
							$output .= $this->num_tag_open.'<a data-inline="true" data-ajax="false" data-role="button" '.$this->anchor_class.'href="'.$this->base_url.$n.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$loop.'</a>'.$this->num_tag_close."\n";
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a data-inline="true" data-ajax="false" data-role="button" '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.($this->cur_page * $this->per_page).$this->suffix.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a data-inline="true" data-ajax="false" data-role="button" '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'&'.$this->selector_dom_name.'='.$this->per_page.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}
		
		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);
		//dump($output);
		

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;
        
		    $__per_page_selector_src_html = $this->create_per_page_selector();

			$attributes_up = array('id' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_up', 'name' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_up');
			$attributes_down = array('id' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_down', 'name' => SHIN_Core::$_config['input']['pager_selector_form_name'].'_down');
			
			// if router works we have application, if not - simple script w/o routing
			$url_back = '';
			$__tmp = '';
			if(isset(SHIN_Core::$_libs['router'])){			
				if(SHIN_Core::$_config['core']['index_page']){$__tmp = SHIN_Core::$_config['core']['index_page'].'/';}
				$url_back = $__tmp.last_segment();
			} else {				
				$url_back = last_segment();
			}
			
			$_form_open_up = form_open($url_back, $attributes_up);
			$_form_open_down = form_open($url_back, $attributes_down);
						
			$__t1 = SHIN_Core::$_config['input']['item_per_page_sight'] ? $__per_page_selector_src_html[0] : '';
			$__t2 = SHIN_Core::$_config['input']['item_per_page_sight'] ? $__per_page_selector_src_html[1] : '';
			$out = array();
			$s = $_form_open_up."\n".
						$output.
						SHIN_Core::$_config['input']['selector_pager_delimiter'].
						$__t1.
						form_close();
			array_push($out, $s);

			$s = $_form_open_down."\n".
						$output.
						SHIN_Core::$_config['input']['selector_pager_delimiter'].
						$__t2.
						form_close();
			array_push($out, $s);
		return $out;
	} // end of function 
	
}// END MobilePagination Class

/* End of file SHIN_Pagination.php */
/* Location: shinfw/libraries/SHIN_Pagination.php */
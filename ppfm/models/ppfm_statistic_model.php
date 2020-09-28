<?php

class Ppfm_Statistic_model extends SHIN_Model {

    /**
    * list of categories
    */
    var $categoryList       =   array();
    
    /**
    * list of holders
    */
    var $holderList         =   array();
    
    /**
    * list of accounts
    */
    var $accountList        =   array();
    
    /**
     * Physical tablename.
     */
    var $table_name = 'ppfm_statistic';

    /**
     * Sight for setup.
     */
    var $setup_include_sight = FALSE;


    function __construct() {
        parent::__construct($this->table_name);

        /*
		if($this->setup_include_sight == FALSE){
			return;
		}
		*/

        $this->categoryList  = $this->getDataList('ppfm_category', 'cat');
        $this->holderList    = $this->getDataList('ppfm_holder', 'holder');
        $this->accountList   = $this->getDataList('ppfm_account', 'account');
        
    }
    
    function categoryYearSummary($dateFrom, $dateTo)
	{
        $resultArray = array();
		
        $yearList      = range($dateFrom, $dateTo, 1);
        $resultArray   = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_category.cat as cat');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.idCat as idCat');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('YEAR(ppfm_entry.date) as year');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_category');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_entry.idCat = ppfm_category.idCat');
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where_in('YEAR(ppfm_entry.date)', $yearList);
		        				
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) 
		{  // 1 time !!!!
			if(!isset($resultArray[$amountData['year']][$amountData['cat']])) {
				$resultArray[$amountData['year']][$amountData['cat']] = 0;
			}
			
			if($amountData['type'] == '-') {
				if(isset($amountData['amount'])) {
					$resultArray[$amountData['year']][$amountData['cat']] = $resultArray[$amountData['year']][$amountData['cat']] - $amountData['amount'];    
				}    
			} else {
				if(isset($amountData['amount'])) {
					$resultArray[$amountData['year']][$amountData['cat']] = $resultArray[$amountData['year']][$amountData['cat']] + $amountData['amount'];    
				}    
			}        
		} // end of foreach
        
        // merge with default values
        for($i=$dateFrom; $i<=$dateTo; $i++) {
            if(!isset($resultArray[$i])) {
                $resultArray[$i]  =   $this->categoryList;    
            } else {
                $resultArray[$i] +=   $this->categoryList;    
            }
        }
        
        krsort($resultArray);
        
        return $resultArray;    
    }
    
    function categoryMonthlySummary($dateFrom){
        
        $tempArray     = array();
        $resultArray   = array(); 
        
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_category.cat as cat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.idCat as idCat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MONTH(ppfm_entry.date) as month');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_category');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_entry.idCat = ppfm_category.idCat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('YEAR(ppfm_entry.date)', $dateFrom);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']])) {
                $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] - $amountData['amount'];    
                } else {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] - 0;    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] + $amountData['amount'];    
                } else {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] + 0;    
                }    
            }        
        }
        
        // merge with default values
        for($i=1; $i<=12; $i++) {
            $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]  =   $this->categoryList;
            if(array_key_exists(SHIN_Core::$_language->line('lng_label_month_short_name_' .$i), $tempArray)) {
                $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)] = array_merge($resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)], $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]);
            }    
        }
        
        return $resultArray;
            
    }
    
    function holderYearSummary($dateFrom, $dateTo){
        
        
        $yearList      = range($dateFrom, $dateTo, 1);
        $resultArray   = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_holder.holder as holder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.idHolder as idHolder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('YEAR(ppfm_entry.date) as year');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_holder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_holder.idHolder = ppfm_entry.idHolder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where_in('YEAR(ppfm_entry.date)', $yearList);
                                
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($resultArray[$amountData['year']][$amountData['holder']])) {
                 $resultArray[$amountData['year']][$amountData['holder']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $resultArray[$amountData['year']][$amountData['holder']] = $resultArray[$amountData['year']][$amountData['holder']] - $amountData['amount'];    
                } else {
                    $resultArray[$amountData['year']][$amountData['holder']] = $resultArray[$amountData['year']][$amountData['holder']] - 0;    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $resultArray[$amountData['year']][$amountData['holder']] = $resultArray[$amountData['year']][$amountData['holder']] + $amountData['amount'];    
                } else {
                    $resultArray[$amountData['year']][$amountData['holder']] = $resultArray[$amountData['year']][$amountData['holder']] + 0;    
                }    
            }    
        }
        
        // merge with default values
        for($i=$dateFrom; $i<=$dateTo; $i++) {
            if(!isset($resultArray[$i])) {
                $resultArray[$i]  =   $this->holderList;    
            } else {
                $resultArray[$i] +=   $this->holderList;    
            }
        }
        
        krsort($resultArray);
        
        return $resultArray;
     
    }
    
    function holderMonthlySummary($dateFrom) {
        
        $resultArray   = array();
        $tempArray     = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_holder.holder as holder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_holder.idHolder as idHolder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MONTH(ppfm_entry.date) as month');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_holder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_entry.idHolder = ppfm_holder.idHolder');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('YEAR(ppfm_entry.date)', $dateFrom);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']])) {
                $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']] - $amountData['amount'];    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['holder']] + $amountData['amount'];    
                }    
            }    
        }
        
        // merge with default values
        for($i=1; $i<=12; $i++) {
            $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]  =   $this->holderList;
            if(array_key_exists(SHIN_Core::$_language->line('lng_label_month_short_name_' .$i), $tempArray)) {
                $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)] = array_merge($resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)], $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]);
            }    
        }
        
        return $resultArray;    
    }
    
    function accountYearSummary($dateFrom, $dateTo) {
        
        $yearList      = range($dateFrom, $dateTo, 1);
        $resultArray   = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_account.account as account');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.idAccount as idAccount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('YEAR(ppfm_entry.date) as year');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_account');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_account.idAccount = ppfm_entry.idAccount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where_in('YEAR(ppfm_entry.date)', $yearList);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($resultArray[$amountData['year']][$amountData['account']])) {
                 $resultArray[$amountData['year']][$amountData['account']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $resultArray[$amountData['year']][$amountData['account']] = $resultArray[$amountData['year']][$amountData['account']] - $amountData['amount'];    
                } else {
                    $resultArray[$amountData['year']][$amountData['account']] = $resultArray[$amountData['year']][$amountData['account']] - 0;    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $resultArray[$amountData['year']][$amountData['account']] = $resultArray[$amountData['year']][$amountData['account']] + $amountData['amount'];    
                } else {
                    $resultArray[$amountData['year']][$amountData['account']] = $resultArray[$amountData['year']][$amountData['account']] + 0;    
                }    
            }    
        }
        
        // merge with default values
        for($i=$dateFrom; $i<=$dateTo; $i++) {
            if(!isset($resultArray[$i])) {
                $resultArray[$i]  =   $this->accountList;    
            } else {
                $resultArray[$i] +=   $this->accountList;    
            }
        }
        
        krsort($resultArray);
        
        return $resultArray;
     }
    
    function accountMonthlySummary($dateFrom) {
        
        $resultArray   = array();
        $tempArray     = array();
        
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_account.account as account');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_account.idAccount as idAccount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MONTH(ppfm_entry.date) as month');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_account');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_entry.idAccount = ppfm_account.idAccount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('YEAR(ppfm_entry.date)', $dateFrom);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']])) {
                 $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']] - $amountData['amount'];    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['account']] + $amountData['amount'];    
                }
            }    
        }
        
        // merge with default values
        for($i=1; $i<=12; $i++) {
            $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]  =   $this->accountList;
            if(array_key_exists(SHIN_Core::$_language->line('lng_label_month_short_name_' .$i), $tempArray)) {
                $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)] = array_merge($resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)], $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]);
            }    
        }
                
        return $resultArray;    
    }
    
    function accountSituation() {
        
        $resultArray = array();
        
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_account.account AS account');
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('DATE(ppfm_account.lastUpdate) as date');
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_account.curAmount AS amount');
                 SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_account');    
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $accountList    = $query->result_array();
        
        foreach($accountList as $account) {
            $resultArray[0][$account['account']] =  round($account['amount'], 2);    
        }
        
        
        return $resultArray;    
    }
    
    function yearDebitCreditSituation($dateFrom, $dateTo){
    
        
        $yearList      = range($dateFrom, $dateTo, 1);
        $resultArray   = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('YEAR(ppfm_entry.date) as year');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where_in('YEAR(ppfm_entry.date)', $yearList);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            !isset($resultArray[$amountData['year']]['Credit']) ? $resultArray[$amountData['year']]['Credit'] = 0 : '';
            !isset($resultArray[$amountData['year']]['Debid'])  ? $resultArray[$amountData['year']]['Debid']  = 0 : '';
            
            if($amountData['type'] == '-') {
                $resultArray[$amountData['year']]['Credit'] -= $amountData['amount'];    
            } else {
                $resultArray[$amountData['year']]['Debid']  += $amountData['amount'];    
            }
        }
        
        // merge with default values
        for($i=$dateFrom; $i<=$dateTo; $i++) {
            if(!isset($resultArray[$i])) {
                $resultArray[$i]  =   array('Credit' => 0,
                                            'Debid'  => 0);    
            }
        }
        
        krsort($resultArray);
        
        return $resultArray;
     }
    
    function monthDebitCreditSituation($dateFrom){
        
        $tempArray   = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MONTH(ppfm_entry.date) as month');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('YEAR(ppfm_entry.date)', $dateFrom);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $amountDataList  = $query->result_array();
        
        //dump($amountDataList);
        foreach($amountDataList as $amountData) {
            !isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Credit']) ? $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Credit'] = 0 : '';
            !isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Debid'])  ? $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Debid']  = 0 : '';
            
            if($amountData['type'] == '-') {
                $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Credit'] -= $amountData['amount'];    
            } else {
                $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])]['Debid']  += $amountData['amount'];    
            }
        }
        
        // merge with default values  
        for($i=1; $i<=12; $i++) {
            $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]  =   array('Credit' => 0, 'Debid' => 0);
            if(array_key_exists(SHIN_Core::$_language->line('lng_label_month_short_name_' .$i), $tempArray)) {
                $resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)] = array_merge($resultArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)], $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' .$i)]);
            }    
        }
        
        return $resultArray;
            
    }
    
    function categoryCurrentMonthSummary($month){
        
        $tempArray     = array();
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_category.cat as cat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.idCat as idCat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.amount as amount');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('ppfm_entry.type as type');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('MONTH(ppfm_entry.date) as month');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_entry');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from('ppfm_category');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('ppfm_entry.idCat = ppfm_category.idCat');
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('MONTH(ppfm_entry.date)', $month);
        
        $query           = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        
        $amountDataList  = $query->result_array();
        
        foreach($amountDataList as $amountData) {
            if(!isset($tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']])) {
                $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = 0;
            }
            if($amountData['type'] == '-') {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] - $amountData['amount'];    
                } else {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] - 0;    
                }    
            } else {
                if(isset($amountData['amount'])) {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] + $amountData['amount'];    
                } else {
                    $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] = $tempArray[SHIN_Core::$_language->line('lng_label_month_short_name_' . $amountData['month'])][$amountData['cat']] + 0;    
                }    
            }        
        }
        
        return $tempArray;
            
    }
    
    /**
    * get default values from the table
    * 
    * @param string $table - table name
    * @param string $field - field name
    * @param string $type  - type can be year|month
    * @access protected
    * @return array
    */
    protected function getDataList($table, $field, $type = 'year') {
        
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select($table . '.' . $field . ' as ' . $field);
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($table);
        
        $dataList   = array();
        $query      = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
        $result     = $query->result_array();
        
        foreach($result as $data) {
            $dataList[$data[$field]] = 0;       
        }
        
            return $dataList;    
    }
} // end of class

/* End of file Statistic_model.php */
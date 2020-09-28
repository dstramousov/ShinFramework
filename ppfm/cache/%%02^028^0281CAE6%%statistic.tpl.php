<?php /* Smarty version 2.6.26, created on 2010-10-20 13:27:18
         compiled from statistic.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">
<?php echo '
    <style type="text/css">
        .buttons, .show-section, .chart, .datatable   {
            clear: both;
        }
        .show-section{
            float: left;
            margin-right: 10px;    
        }
        .report-section{
            float: left;
        }
        
        .datatable {
            height: inherit;
            width: 1130px;
            overflow: auto;
        }
        
        select{
            width: 70px;
        }
    </style>
'; ?>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_ppfm_menu']; ?>
</b>&nbsp;&nbsp;</legend>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ppfm_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</fieldset>

<br/>

<fieldset>
    <legend><?php echo $this->_tpl_vars['lng_label_statistic_category_report']; ?>
</legend>
    <div id="category_tabs">
        <ul>
            <li><a href="#category_tab_1"><?php echo $this->_tpl_vars['lng_label_statistic_category_tab_1']; ?>
</a></li>
            <li><a href="#category_tab_2"><?php echo $this->_tpl_vars['lng_label_statistic_category_tab_2']; ?>
</a></li>
            <li><a href="#category_tab_3"><?php echo $this->_tpl_vars['lng_label_statistic_category_tab_3']; ?>
</a></li>
            <li><a href="#category_tab_4"><?php echo $this->_tpl_vars['lng_label_statistic_category_tab_4']; ?>
</a></li>
        </ul>
        <div id="category_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                            <input type="hidden" name="action" value="category_year_summary_action">
                            <label for="category_year_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="category_year_summary_from_date" name="from_date">
                                <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryYearSummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_summary_to_date"><?php echo $this->_tpl_vars['lng_label_statistic_to']; ?>
</label>
                            <select id="category_year_summary_to_date" name="to_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryYearSummaryActionTo']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/categoryYear'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['categoryYearSummaryDatatable']; ?>

                </div>
        </div>
        <div id="category_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                            <input type="hidden" name="action" value="category_monthly_summary_action">
                            <label for="category_monthly_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="category_monthly_summary_from_date" name="from_date">
                                <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryMonthlySummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/categoryMonthly'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['categoryMonthlySummaryDatatable']; ?>

                </div>
        </div>
        <div id="category_tab_3">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                        <input type="hidden" name="action" value="category_year_situation_action">
                            <label for="category_year_situation_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="category_year_situation_from_date" name="from_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryDebitCreditYearSummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_situation_to_date"><?php echo $this->_tpl_vars['lng_label_statistic_to']; ?>
</label>
                            <select id="category_year_situation_to_date" name="to_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryDebitCreditYearSummaryActionTo']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/categoryYearSituation'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['categoryDebitCreditYearSummaryDatatable']; ?>

                </div>
        </div>
        <div id="category_tab_4">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                            <input type="hidden" name="action" value="category_month_situation_action">
                            <label for="category_month_situation_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="category_month_situation_from_date" name="from_date">
                                <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['categoryDebitCreditMonthlySummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </forM
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/categoryMonthSituation'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['categoryDebitCreditMonthlySummaryDatatable']; ?>

                </div>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $this->_tpl_vars['lng_label_statistic_holder_report']; ?>
</legend>
    <div id="holder_tabs">
        <ul>
            <li><a href="#holder_tab_1"><?php echo $this->_tpl_vars['lng_label_statistic_holder_tab_1']; ?>
</a></li>
            <li><a href="#holder_tab_2"><?php echo $this->_tpl_vars['lng_label_statistic_holder_tab_2']; ?>
</a></li>
        </ul>
        <div id="holder_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                        <input type="hidden" name="action" value="holder_year_summary_action">
                            <label for="holder_year_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="holder_year_summary_from_date" name="from_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['holderYearSummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="holder_year_summary_to_date"><?php echo $this->_tpl_vars['lng_label_statistic_to']; ?>
</label>
                            <select id="holder_year_summary_to_date" name="to_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['holderYearSummaryActionTo']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/holderYear'); ?>">
                            <input type="hidden" name="tab_action" value="holder_year_summary_action" id="holder_year_summary_action" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['holderYearSummaryDatatable']; ?>

                </div>
        </div>
        <div id="holder_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                            <input type="hidden" name="action" value="holder_monthly_summary_action">
                            <label for="holder_monthly_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="holder_monthly_summary_from_date" name="from_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['holderMonthlySummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/holderMonthly'); ?>">
                            <input type="hidden" name="tab_action" value="holder_monthly_summary_action" id="holder_monthly_summary_action" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['holderMonthlySummaryDatatable']; ?>

                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $this->_tpl_vars['lng_label_statistic_account_report']; ?>
</legend>
    <div id="account_tabs">
        <ul>
            <li><a href="#account_tab_1"><?php echo $this->_tpl_vars['lng_label_statistic_account_tab_1']; ?>
</a></li>
            <li><a href="#account_tab_2"><?php echo $this->_tpl_vars['lng_label_statistic_account_tab_2']; ?>
</a></li>
        </ul>
        <div id="account_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                            <input type="hidden" name="action" value="account_year_summary_action">
                            <label for="account_year_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="account_year_summary_from_date" name="from_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['accountYearSummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="account_year_summary_to_date"><?php echo $this->_tpl_vars['lng_label_statistic_to']; ?>
</label>
                            <select id="account_year_summary_to_date" name="to_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['accountYearSummaryActionTo']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/accountYear'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['accountYearSummaryDatatable']; ?>

                </div>
            </form>
        </div>
        <div id="account_tab_2">
                <div class="buttons">
                    <div class="show-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic'); ?>">
                       <input type="hidden" name="action" value="account_monthly_summary_action">
                            <label for="account_monthly_summary_from_date"><?php echo $this->_tpl_vars['lng_label_statistic_from']; ?>
</label>
                            <select id="account_monthly_summary_from_date" name="from_date">
                               <?php $_from = $this->_tpl_vars['yearList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['year']):
?>
                                    <?php if ($this->_tpl_vars['year'] == $this->_tpl_vars['accountMonthlySummaryActionFrom']): ?>
                                        <option selected="selected"><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php else: ?>
                                        <option><?php echo $this->_tpl_vars['year']; ?>
</option>
                                    <?php endif; ?>
                               <?php endforeach; endif; unset($_from); ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_show_btn']; ?>
" name="show_btn" id="show_btn" />
                       </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/accountMonthly'); ?>">
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['accountMonthlySummaryDatatable']; ?>

                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $this->_tpl_vars['lng_label_statistic_account_situation']; ?>
</legend>
    <div id="account_situation">
        <ul>
            <li><a href="#account_situation_tab_1"><?php echo $this->_tpl_vars['lng_label_statistic_account_situation_tab_1']; ?>
</a></li>
        </ul>
        <div id="account_situation_tab_1">
                <div class="buttons">
                    <div class="report-section">
                       <form method="post" action="<?php echo prep_url(base_url().'/index.php/statistic/accountSituation'); ?>">
                            <input type="hidden" name="tab_action" value="account_situation_action" id="account_situation_action" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_xls_button']; ?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $this->_tpl_vars['lng_label_statistic_page_pdf_button']; ?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountSituationColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $this->_tpl_vars['accountSituationDatatable']; ?>

                </div>
        </div>
    </div>
</fieldset>

<?php echo '
    <script type="text/javascript">
    $(document).ready(function(){
        $("#category_tabs").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['category_tab']; ?>
<?php echo '\');    
        $("#holder_tabs").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['holder_tab']; ?>
<?php echo '\');    
        $("#account_tabs").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['account_tab']; ?>
<?php echo '\');    
        $("#account_situation").tabs(\'select\', \''; ?>
<?php echo $this->_tpl_vars['account_situation']; ?>
<?php echo '\');    
    })
    </script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'tech_info.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>

</html>
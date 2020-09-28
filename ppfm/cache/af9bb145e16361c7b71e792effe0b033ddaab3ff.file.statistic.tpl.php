<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-23 12:28:25
         compiled from "D:\Work\web\shinframework\ppfm/views/statistic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215794c9b1db9dcf871-07077537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af9bb145e16361c7b71e792effe0b033ddaab3ff' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/statistic.tpl',
      1 => 1285234103,
    ),
  ),
  'nocache_hash' => '215794c9b1db9dcf871-07077537',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">

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

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_ppfm_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("ppfm_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<fieldset>
    <legend><?php echo $_smarty_tpl->getVariable('lng_label_statistic_category_report')->value;?>
</legend>
    <div id="category_tabs">
        <ul>
            <li><a href="#category_tab_1"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_category_tab_1')->value;?>
</a></li>
            <li><a href="#category_tab_2"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_category_tab_2')->value;?>
</a></li>
            <li><a href="#category_tab_3"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_category_tab_3')->value;?>
</a></li>
            <li><a href="#category_tab_4"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_category_tab_4')->value;?>
</a></li>
        </ul>
        <div id="category_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="action" value="category_year_summary_action">
                            <label for="category_year_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="category_year_summary_from_date" name="from_date">
                                <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryYearSummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_summary_to_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_to')->value;?>
</label>
                            <select id="category_year_summary_to_date" name="to_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryYearSummaryActionTo')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/categoryYear');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('categoryYearSummaryDatatable')->value;?>

                </div>
        </div>
        <div id="category_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="action" value="category_monthly_summary_action">
                            <label for="category_monthly_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="category_monthly_summary_from_date" name="from_date">
                                <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryMonthlySummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/categoryMonthly');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('categoryMonthlySummaryDatatable')->value;?>

                </div>
        </div>
        <div id="category_tab_3">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                        <input type="hidden" name="action" value="category_year_situation_action">
                            <label for="category_year_situation_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="category_year_situation_from_date" name="from_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryDebitCreditYearSummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_situation_to_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_to')->value;?>
</label>
                            <select id="category_year_situation_to_date" name="to_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryDebitCreditYearSummaryActionTo')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/categoryYearSituation');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('categoryDebitCreditYearSummaryDatatable')->value;?>

                </div>
        </div>
        <div id="category_tab_4">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="action" value="category_month_situation_action">
                            <label for="category_month_situation_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="category_month_situation_from_date" name="from_date">
                                <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('categoryDebitCreditMonthlySummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </forM
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/categoryMonthSituation');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('categoryDebitCreditMonthlySummaryDatatable')->value;?>

                </div>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $_smarty_tpl->getVariable('lng_label_statistic_holder_report')->value;?>
</legend>
    <div id="holder_tabs">
        <ul>
            <li><a href="#holder_tab_1"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_holder_tab_1')->value;?>
</a></li>
            <li><a href="#holder_tab_2"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_holder_tab_2')->value;?>
</a></li>
        </ul>
        <div id="holder_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                        <input type="hidden" name="action" value="holder_year_summary_action">
                            <label for="holder_year_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="holder_year_summary_from_date" name="from_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('holderYearSummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="holder_year_summary_to_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_to')->value;?>
</label>
                            <select id="holder_year_summary_to_date" name="to_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('holderYearSummaryActionTo')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/holderYear');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="tab_action" value="holder_year_summary_action" id="holder_year_summary_action" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('holderYearSummaryDatatable')->value;?>

                </div>
        </div>
        <div id="holder_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="action" value="holder_monthly_summary_action">
                            <label for="holder_monthly_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="holder_monthly_summary_from_date" name="from_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('holderMonthlySummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/holderMonthly');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="tab_action" value="holder_monthly_summary_action" id="holder_monthly_summary_action" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('holderMonthlySummaryDatatable')->value;?>

                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $_smarty_tpl->getVariable('lng_label_statistic_account_report')->value;?>
</legend>
    <div id="account_tabs">
        <ul>
            <li><a href="#account_tab_1"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_account_tab_1')->value;?>
</a></li>
            <li><a href="#account_tab_2"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_account_tab_2')->value;?>
</a></li>
        </ul>
        <div id="account_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="action" value="account_year_summary_action">
                            <label for="account_year_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="account_year_summary_from_date" name="from_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('accountYearSummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="account_year_summary_to_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_to')->value;?>
</label>
                            <select id="account_year_summary_to_date" name="to_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('accountYearSummaryActionTo')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/accountYear');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('accountYearSummaryDatatable')->value;?>

                </div>
            </form>
        </div>
        <div id="account_tab_2">
                <div class="buttons">
                    <div class="show-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                       <input type="hidden" name="action" value="account_monthly_summary_action">
                            <label for="account_monthly_summary_from_date"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_from')->value;?>
</label>
                            <select id="account_monthly_summary_from_date" name="from_date">
                               <?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('yearList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
?>
                                    <?php if ($_smarty_tpl->tpl_vars['year']->value==$_smarty_tpl->getVariable('accountMonthlySummaryActionFrom')->value){?>
                                        <option selected="selected"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }else{ ?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                                    <?php }?>
                               <?php }} ?>
                            </select>
                            &nbsp;
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_show_btn')->value;?>
" name="show_btn" id="show_btn" />
                       </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/accountMonthly');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('accountMonthlySummaryDatatable')->value;?>

                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend><?php echo $_smarty_tpl->getVariable('lng_label_statistic_account_situation')->value;?>
</legend>
    <div id="account_situation">
        <ul>
            <li><a href="#account_situation_tab_1"><?php echo $_smarty_tpl->getVariable('lng_label_statistic_account_situation_tab_1')->value;?>
</a></li>
        </ul>
        <div id="account_situation_tab_1">
                <div class="buttons">
                    <div class="report-section">
                       <form method="post" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/statistic/accountSituation');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
                            <input type="hidden" name="tab_action" value="account_situation_action" id="account_situation_action" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_xls_button')->value;?>
" name="xls" id="xls" />
                            <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_statistic_page_pdf_button')->value;?>
" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountSituationColumn2d"></div>
                </div>
                
                <div class="datatable">
                    <?php echo $_smarty_tpl->getVariable('accountSituationDatatable')->value;?>

                </div>
        </div>
    </div>
</fieldset>


    <script type="text/javascript">
    $(document).ready(function(){
        $("#category_tabs").tabs('select', '<?php echo $_smarty_tpl->getVariable('category_tab')->value;?>
');    
        $("#holder_tabs").tabs('select', '<?php echo $_smarty_tpl->getVariable('holder_tab')->value;?>
');    
        $("#account_tabs").tabs('select', '<?php echo $_smarty_tpl->getVariable('account_tab')->value;?>
');    
        $("#account_situation").tabs('select', '<?php echo $_smarty_tpl->getVariable('account_situation')->value;?>
');    
    })
    </script>


<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</body>

</html>

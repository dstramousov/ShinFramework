{include file="header.tpl"}

<body id="page">
{literal}
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
{/literal}
<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	{include file="main_menu.tpl"}

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_ppfm_menu}</b>&nbsp;&nbsp;</legend>
	{include file="ppfm_menu.tpl"}

</fieldset>

<br/>

<fieldset>
    <legend>{$lng_label_statistic_category_report}</legend>
    <div id="category_tabs">
        <ul>
            <li><a href="#category_tab_1">{$lng_label_statistic_category_tab_1}</a></li>
            <li><a href="#category_tab_2">{$lng_label_statistic_category_tab_2}</a></li>
            <li><a href="#category_tab_3">{$lng_label_statistic_category_tab_3}</a></li>
            <li><a href="#category_tab_4">{$lng_label_statistic_category_tab_4}</a></li>
        </ul>
        <div id="category_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                            <input type="hidden" name="action" value="category_year_summary_action">
                            <label for="category_year_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="category_year_summary_from_date" name="from_date">
                                {foreach from=$yearList item=year}
                                    {if $year == $categoryYearSummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                                {/foreach}
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_summary_to_date">{$lng_label_statistic_to}</label>
                            <select id="category_year_summary_to_date" name="to_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $categoryYearSummaryActionTo}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                                {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/categoryYear');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$categoryYearSummaryDatatable}
                </div>
        </div>
        <div id="category_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                            <input type="hidden" name="action" value="category_monthly_summary_action">
                            <label for="category_monthly_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="category_monthly_summary_from_date" name="from_date">
                                {foreach from=$yearList item=year}
                                    {if $year == $categoryMonthlySummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                                {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/categoryMonthly');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$categoryMonthlySummaryDatatable}
                </div>
        </div>
        <div id="category_tab_3">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                        <input type="hidden" name="action" value="category_year_situation_action">
                            <label for="category_year_situation_from_date">{$lng_label_statistic_from}</label>
                            <select id="category_year_situation_from_date" name="from_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $categoryDebitCreditYearSummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="category_year_situation_to_date">{$lng_label_statistic_to}</label>
                            <select id="category_year_situation_to_date" name="to_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $categoryDebitCreditYearSummaryActionTo}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/categoryYearSituation');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$categoryDebitCreditYearSummaryDatatable}
                </div>
        </div>
        <div id="category_tab_4">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                            <input type="hidden" name="action" value="category_month_situation_action">
                            <label for="category_month_situation_from_date">{$lng_label_statistic_from}</label>
                            <select id="category_month_situation_from_date" name="from_date">
                                {foreach from=$yearList item=year}
                                    {if $year == $categoryDebitCreditMonthlySummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                                {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </forM
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/categoryMonthSituation');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="categoryDebutCreditMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$categoryDebitCreditMonthlySummaryDatatable}
                </div>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend>{$lng_label_statistic_holder_report}</legend>
    <div id="holder_tabs">
        <ul>
            <li><a href="#holder_tab_1">{$lng_label_statistic_holder_tab_1}</a></li>
            <li><a href="#holder_tab_2">{$lng_label_statistic_holder_tab_2}</a></li>
        </ul>
        <div id="holder_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                        <input type="hidden" name="action" value="holder_year_summary_action">
                            <label for="holder_year_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="holder_year_summary_from_date" name="from_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $holderYearSummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="holder_year_summary_to_date">{$lng_label_statistic_to}</label>
                            <select id="holder_year_summary_to_date" name="to_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $holderYearSummaryActionTo}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/holderYear');{/php}">
                            <input type="hidden" name="tab_action" value="holder_year_summary_action" id="holder_year_summary_action" />
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$holderYearSummaryDatatable}
                </div>
        </div>
        <div id="holder_tab_2">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                            <input type="hidden" name="action" value="holder_monthly_summary_action">
                            <label for="holder_monthly_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="holder_monthly_summary_from_date" name="from_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $holderMonthlySummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/holderMonthly');{/php}">
                            <input type="hidden" name="tab_action" value="holder_monthly_summary_action" id="holder_monthly_summary_action" />
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="holderMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$holderMonthlySummaryDatatable}
                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend>{$lng_label_statistic_account_report}</legend>
    <div id="account_tabs">
        <ul>
            <li><a href="#account_tab_1">{$lng_label_statistic_account_tab_1}</a></li>
            <li><a href="#account_tab_2">{$lng_label_statistic_account_tab_2}</a></li>
        </ul>
        <div id="account_tab_1">
                <div class="buttons">
                    <div class="show-section">
                        <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                            <input type="hidden" name="action" value="account_year_summary_action">
                            <label for="account_year_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="account_year_summary_from_date" name="from_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $accountYearSummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="account_year_summary_to_date">{$lng_label_statistic_to}</label>
                            <select id="account_year_summary_to_date" name="to_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $accountYearSummaryActionTo}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                        </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/accountYear');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountYearSummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$accountYearSummaryDatatable}
                </div>
            </form>
        </div>
        <div id="account_tab_2">
                <div class="buttons">
                    <div class="show-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic');{/php}">
                       <input type="hidden" name="action" value="account_monthly_summary_action">
                            <label for="account_monthly_summary_from_date">{$lng_label_statistic_from}</label>
                            <select id="account_monthly_summary_from_date" name="from_date">
                               {foreach from=$yearList item=year}
                                    {if $year == $accountMonthlySummaryActionFrom}
                                        <option selected="selected">{$year}</option>
                                    {else}
                                        <option>{$year}</option>
                                    {/if}
                               {/foreach}
                            </select>
                            &nbsp;
                            <input type="submit" value="{$lng_label_statistic_show_btn}" name="show_btn" id="show_btn" />
                       </form>
                    </div>
                    
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/accountMonthly');{/php}">
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountMonthlySummaryColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$accountMonthlySummaryDatatable}
                </div>
            </form>
        </div>
    </div>
</fieldset>
<br />
<br />
<fieldset>
    <legend>{$lng_label_statistic_account_situation}</legend>
    <div id="account_situation">
        <ul>
            <li><a href="#account_situation_tab_1">{$lng_label_statistic_account_situation_tab_1}</a></li>
        </ul>
        <div id="account_situation_tab_1">
                <div class="buttons">
                    <div class="report-section">
                       <form method="post" action="{php}echo prep_url(base_url().'/index.php/statistic/accountSituation');{/php}">
                            <input type="hidden" name="tab_action" value="account_situation_action" id="account_situation_action" />
                            <input type="submit" value="{$lng_label_statistic_page_xls_button}" name="xls" id="xls" />
                            <input type="submit" value="{$lng_label_statistic_page_pdf_button}" name="pdf" id="pdf" />
                        </form>
                    </div>
                </div>
                
                <div class="chart">
                    <div id="accountSituationColumn2d"></div>
                </div>
                
                <div class="datatable">
                    {$accountSituationDatatable}
                </div>
        </div>
    </div>
</fieldset>

{literal}
    <script type="text/javascript">
    $(document).ready(function(){
        $("#category_tabs").tabs('select', '{/literal}{$category_tab}{literal}');    
        $("#holder_tabs").tabs('select', '{/literal}{$holder_tab}{literal}');    
        $("#account_tabs").tabs('select', '{/literal}{$account_tab}{literal}');    
        $("#account_situation").tabs('select', '{/literal}{$account_situation}{literal}');    
    })
    </script>
{/literal}

{include file='tech_info.tpl'}

</body>

</html>

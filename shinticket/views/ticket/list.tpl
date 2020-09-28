{include file='header.tpl'}

<div class="legent-list">
    {include file='ticket/legend.tpl'}
</div>

<div class="filter-list">
    <div class="filter-collaps">
        <a href="javascript:void(0);" onclick="filterCollaps()" title="{$lng_label_filet_hide}"></a>
    </div>
    <div class="filter-inner">
        {if !empty($currentPriority) || !empty($currentApplication) || !empty($currentStatus)}
            <a href="javascript:void(0);" onclick="showHideFilter(this);">{$lng_label_filet_hide}</a>
        {else}
            <a href="javascript:void(0);" onclick="showHideFilter(this);">{$lng_label_filet_show}</a>
        {/if}
        <fieldset {if empty($currentPriority) && empty($currentApplication) && empty($currentStatus)} class="shin-hide" {/if}>
            <legend>{$lng_label_datatable_filter_list}</legend>
            <form action="{php}echo prep_url(base_url().'/ticket/list');{/php}" method="post" id="filter-form">
            <table>
                <tr>
                    <th>
                        <label for="priority-sort">{$lng_label_datatable_priority}:</label>
                    </th>
                    <td>
                        <select name="priority-sort" id="priority-sort">
                            <option value="">&nbsp;</option>
                            {foreach from=$priorityList item=priority key=key}
                                {if $key == $currentPriority}
                                    <option value="{$key}" selected="selected">{$priority}</option>
                                {else}
                                    <option value="{$key}">{$priority}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </td>
                    <th>
                        <label for="priority-sort">{$lng_label_datatable_application}:</label>
                    </th>
                    <td>
                        <input type="text" value="{$currentApplication}" name="application-sort" id="application-sort" />
                    </td>
                    <th>
                        <label for="priority-sort">{$lng_label_datatable_status}:</label>
                    </th>
                    <td>
                        <select name="status-sort" id="status-sort">
                            <option value="">&nbsp;</option>
                            {foreach from=$statusList item=status key=key}
                                {if $key == $currentStatus}
                                    <option value="{$key}" selected="selected">{$status}</option>
                                {else}
                                    <option value="{$key}">{$status}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="search-filter" value="{$lng_label_datatable_search}" id="search-filter" />
                        <input type="button" name="search-rest" value="{$lng_label_datatable_reset}" id="search-rest" onclick="resetFilterForm();" />
                    </td>
                </tr>
            </table>
            </form>
        </fieldset>
    </div>
</div>

<div class="ticket-list">
    <fieldset>
        <legend>&nbsp;&nbsp;<b>{$lng_label_list_ticket}</b>&nbsp;&nbsp;</legend>
        {$ticketList}
    </fieldset>
</div>

{literal}
    <script type="text/javascript">
        
        $(document).ready(function() {
            
            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            $('td img[class=ticket-with-details]', ticketList.fnGetNodes()).each( function () {
                $(this).click( function () {
                    var nTr = this.parentNode.parentNode;
                    if ( this.src.match('details_close')) {
                        /* This row is already open - close it */
                        this.src = "{/literal}{php} echo prep_url(base_url().'/images/datatable/');{/php}{literal}details_open.png";
                        ticketList.fnClose( nTr );
                    } else {
                        /* Open this row */
                        this.src = "{/literal}{php} echo prep_url(base_url().'/images/datatable/');{/php}{literal}details_close.png";
                        ticketList.fnOpen( nTr, fnFormatDetails(ticketList, nTr), 'details' );
                    }
                });
            });
        });
        
        function fnRowCallback(nRow, aData, iDisplayIndex, iDisplayIndexFull){
            
            if(!$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-low-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-normal-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-hight-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-asap-priority')) {
               
               switch(aData[4]) {
                    case 'l':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-low-priority');
                        break;
                    case 'n':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-normal-priority');
                        break;
                    case 'h':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-hight-priority');
                        break;
                    case 'a':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-asap-priority');
                        break;
                }
            }
            
            return nRow;
        }
        
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
        
            var ticketId = $(nTr).find('td:eq(1)').text();
            
            $.ajax({
                url:        '{/literal}{php} echo prep_url(base_url().'/ticket/detail-list');{/php}{literal}',
                data:       {ticketId:ticketId},
                dataType:   'json',
                type:       'POST',
                async:      false,
                success:    function(json) {
                    if(json.result) {
                        sOut = '';
                        for(index in json.data) {
                            sOut   +=   '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                            
                            if(json.data[index].owner == 'user') {
                                sOut   +=   '<tr><td colspan="2" align="left"><img src="{/literal}{php} echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/';{/php}{literal}user.png" /></td></tr>'
                            } else {
                                sOut   +=   '<tr><td colspan="2" align="left"><img src="{/literal}{php} echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/';{/php}{literal}user_red.png" /></td></tr>'
                            }
                            
                            sOut   +=   '<tr><td>{/literal}{$lng_label_datatable_details_updated}:{literal}</td><td>' + json.data[index].created + '</td><tr>'     
                            sOut   +=   '<tr><td>{/literal}{$lng_label_datatable_details_body}:{literal}</td><td>' + json.data[index].bodyparced + '</td><tr>'     
                            sOut   +=   '</table><hr />';
                        }
                    } else {
                    
                    }    
                }
            })
            
            return sOut;
        }
        
        function showHideFilter(target){
            var fieldset = $('.filter-list fieldset');
            
            if($(fieldset).hasClass('shin-hide')) {
                $(target).text('{/literal}{$lng_label_filet_hide}{literal}');
                $(fieldset).removeClass('shin-hide');
            } else {
                $(target).text('{/literal}{$lng_label_filet_show}{literal}');
                $(fieldset).addClass('shin-hide');    
            }        
        }
        
        function resetFilterForm(){
            $('#application-sort').val('');
            $("#priority-sort [value='']").attr("selected", "selected");
            $("#status-sort [value='']").attr("selected", "selected");
            
            $('#filter-form').submit();
            
        }
    </script>
{/literal}
{include file='footer.tpl'}
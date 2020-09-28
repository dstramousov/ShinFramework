<fieldset>
    <span style="color:red; font-weight:bold">{$lng_label_picture_filter}:</span>
    <form>
    {$lng_label_current_user}:
    <select id="userId" name="search[userId]" onchange="changeUser(this);">
        <option value=""></option>
        {foreach from=$userList item=user}
            <option value="{$user.userId}" {if $user.userId == $currentUser}selected="selected"{/if}>{$user.sys_user_username}</option>
        {/foreach}
    </select>
    <br />
    <table class="admin-search-table">
        <tr>
            <td valign="top" >
                <fieldset>
                    <span style="color:red; font-weight:bold">{$lng_label_search_base}:</span>
                    <table>
                        <tr>
                            <th>{$lng_label_search_circuit_type}</th>
                            <td>
                                <select name="search[type]" id="circuit-type" onchange="loadCircuitList();">
                                    {foreach from=$circuitTypeList item=type key=key}
                                        <option value="{$key}">{$type}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_circuit_country}</th>
                            <td>
                                <select name="search[country]" id="circuit-country" onchange="loadCircuitList();">
                                    {foreach from=$circuitCountryList item=country key=key}
                                        <option value="{$key}">{$country}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_circuit}</th>
                            <td>
                                <select name="search[circuit]" id="circuit" class="search-circuit">
                                    {foreach from=$circuitList item=circuit key=key}
                                        <option value="{$key}">{$circuit}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_race_day}</th>
                            <td>
                                <input type="text" name="search[raceDay]" value="" id="raceDay">
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_race_time_from}</th>
                            <td>
                                <input type="text" name="search[raceTimeFrom]" value="" id="raceTimeFrom">
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_race_time_to}</th>
                            <td>
                                <input type="text" name="search[raceTimeTo]" value="" id="raceTimeTo">
                            </td>
                        </tr>
                    </table>
                </fieldset>    
            </td>
            <td valign="top">
                <fieldset>
                    <span style="color:red; font-weight:bold">{$lng_label_search_advanced}:</span>
                    <table>
                        <tr>
                            <th>{$lng_label_search_licence}</th>
                            <td>
                                <input type="text" name="search[licence]" value="" id="license">
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_car_number}</th>
                            <td>
                                <input type="text" name="search[car_number]" value="" id="car_number">
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_car_pilot}</th>
                            <td>
                                <input type="text" name="search[car_pilot]" value="" id="car_pilot">
                            </td>
                        </tr>
                        <tr>
                            <th>{$lng_label_search_car_brand}</th>
                            <td>
                                <input type="text" name="search[car_brand]" value="" id="car_brand">
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <th>{$lng_label_search_rate}</th>
                            <td>
                                <div id="half"></div>
                                <input type="hidden" name="search[rate]" value="" id="rate" class="search-rate">
                            </td>
                        </tr>
                        -->
                    </table>
                </fieldset>    
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" name="search-btn" value="{$lng_label_search_button}" id="search" onclick="makeSearch();" />
                <input type="reset"  name="search-btn" value="{$lng_label_search_reset}" id="reset" onclick="resetSearch();" />
            </td>
        </tr>
    </table>
    </form>
</fieldset>

{literal}
    <script type="text/javascript">
    
        $('#circuit-type').val('{/literal}{if !empty($search.type)}{$search.type}{/if}{literal}');
        $('#circuit-country').val('{/literal}{if !empty($search.country)}{$search.country}{/if}{literal}');
        $('#circuit').val('{/literal}{if !empty($search.circuit)}{$search.circuit}{/if}{literal}');
        $('#raceDay').val('{/literal}{if !empty($search.raceDay)}{$search.raceDay}{/if}{literal}');
        $('#raceTimeFrom').val('{/literal}{if !empty($search.raceTimeFrom)}{$search.raceTimeFrom}{/if}{literal}');
        $('#raceTimeTo').val('{/literal}{if !empty($search.raceTimeTo)}{$search.raceTimeTo}{/if}{literal}');
        $('#license').val('{/literal}{if !empty($search.licence)}{$search.licence}{/if}{literal}');
        $('#car_number').val('{/literal}{if !empty($search.car_number)}{$search.car_number}{/if}{literal}');
        $('#car_pilot').val('{/literal}{if !empty($search.car_pilot)}{$search.car_pilot}{/if}{literal}');
        $('#car_brand').val('{/literal}{if !empty($search.car_brand)}{$search.car_brand}{/if}{literal}');
        
        function makeSearch(){
        
            var search  =  {};
            
                search['type']           =   $('#circuit-type').val();
                search['country']        =   $('#circuit-country').val();
                search['circuit']        =   $('#circuit').val();
                search['raceDay']        =   $('#raceDay').val();
                search['raceTimeFrom']   =   $('#raceTimeFrom').val();
                search['raceTimeTo']     =   $('#raceTimeTo').val();
                search['license']        =   $('#license').val();
                search['car_number']     =   $('#car_number').val();
                search['car_pilot']      =   $('#car_pilot').val();
                search['car_brand']      =   $('#car_brand').val();
                search['rate']           =   $('#rate').val();
                search['userId']         =   $('#userId').val();
                
            $.getJSON({/literal}'{php} echo base_url(); {/php}/adminimage/setfilter'{literal}, {
                search: search        
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }        
            })
        }
        
        function resetSearch(){
            $.getJSON({/literal}'{php} echo base_url(); {/php}/adminimage/resetfilter'{literal}, null, function(json) {
                pictureDataList.fnDraw();    
            })    
        }

		$.fn.sort_select_box = function()
		{
			var my_options = $("#" + this.attr('id') + ' option');
			my_options.sort(function(a,b) {
				if (a.text > b.text) return 1;
				else if (a.text < b.text) return -1;
				else return 0
    		})

			$(this).empty().append(my_options);

			$("#"+this.attr('id')+" option").attr('selected', false);
		}

        
        function loadCircuitList(){
            
            var circuitType     =   $('#circuit-type').val();
            var circuitCountry  =   $('#circuit-country').val();
            
            if(circuitType != '' && circuitCountry != '') {
                $.getJSON({/literal}'{php} echo base_url(); {/php}/getcircuitlist'{literal}, {
                    type:       circuitType,
                    country:    circuitCountry
                }, function(json) {
                    $('#circuit').empty();
                    for(index in json) {
                        $('#circuit').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }

                    $('#circuit').sort_select_box();
                })
            }
        }
    </script>
{/literal}
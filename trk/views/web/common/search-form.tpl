<form action="{php} echo prep_url(base_url()) {/php}/search" method="post" id="gallery-search"> 
    <div>
        <table class="search-panel" align="center">
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
                    <select name="search[circuit]" id="circuit">
                        {foreach from=$circuitList item=circuit key=key}
                            <option value="{$key}">{$circuit}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_race_day}</th>
                <td>
                    <input type="text" name="search[raceDay]" value="" id="raceDay" />
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_race_time_from}</th>
                <td>
                    <input type="text" name="search[raceTimeFrom]" value="" id="raceTimeFrom" />
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_race_time_to}</th>
                <td>
                    <input type="text" name="search[raceTimeTo]" value="" id="raceTimeTo" />
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_licence}</th>
                <td>
                    {if !empty($anon_readonly_addons)}
                    {$lng_label_search_after_registration}
                    {else}
                    <input type="text" name="search[licence]" value="" id="licence" />
                    {/if}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_car_number}</th>
                <td>
                    {if !empty($anon_readonly_addons)}
                    {$lng_label_search_after_registration}
                    {else}
                    <input type="text" name="search[car_number]" value="" id="car_number" />
                    {/if}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_car_pilot}</th>
                <td>
                    {if !empty($anon_readonly_addons)}
                    {$lng_label_search_after_registration}
                    {else}
                    <input type="text" name="search[car_pilot]" value="" id="car_pilot" />
                    {/if}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_car_brand}</th>
                <td>
                    {if !empty($anon_readonly_addons)}
                    {$lng_label_search_after_registration}
                    {else}
                    <input type="text" name="search[car_brand]" value="" id="car_brand" />
                    {/if}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_search_rate}</th>
                <td>
                    <div id="half"></div>
                    <input type="hidden" name="search[rate]" value="" id="rate" class="search-rate" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" class="without-bottom-border">
                    <input type="submit" name="search-btn" value="Search" id="search" class="search-btn left" />
                    <input type="reset"  name="search-btn" value="Reset" id="reset" class="reset-btn right" onclick="resetForm();" />
                </td>
            </tr>
        </table>
    </div>
</form>

{literal}
    <script type="text/javascript">
    
        $('#half').raty({
            path:       '{/literal}{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/images/rate/{literal}',
            onClick:    function(score) {
                $('#rate').val(score);
            },
            direction:  'right'
        });
        
        $('#circuit-type').val('{/literal}{if !empty($search.type)}{$search.type}{/if}{literal}');
        $('#circuit-country').val('{/literal}{if !empty($search.country)}{$search.country}{/if}{literal}');
        $('#circuit').val('{/literal}{if !empty($search.circuit)}{$search.circuit}{/if}{literal}');
        $('#raceDay').val('{/literal}{if !empty($search.raceDay)}{$search.raceDay}{/if}{literal}');
        $('#raceTimeFrom').val('{/literal}{if !empty($search.raceTimeFrom)}{$search.raceTimeFrom}{/if}{literal}');
        $('#raceTimeTo').val('{/literal}{if !empty($search.raceTimeTo)}{$search.raceTimeTo}{/if}{literal}');
        $('#licence').val('{/literal}{if !empty($search.licence)}{$search.licence}{/if}{literal}');
        $('#car_number').val('{/literal}{if !empty($search.car_number)}{$search.car_number}{/if}{literal}');
        $('#car_pilot').val('{/literal}{if !empty($search.car_pilot)}{$search.car_pilot}{/if}{literal}');
        $('#car_brand').val('{/literal}{if !empty($search.car_brand)}{$search.car_brand}{/if}{literal}');
        
        $.fn.raty.start({/literal}{if !empty($search.rate)}{$search.rate}{/if}{literal});
        
        function resetForm(){
            $.fn.raty.start(0, '#half');
            $('#rate').val(0);    
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

                    // reorder after receive
                    $('#circuit').sort_select_box();
                })
            }
        }
        
    </script>
{/literal}

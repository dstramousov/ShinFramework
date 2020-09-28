<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table style="margin:0px;">
		<tr>
			<td>
				<table style="margin:0px;">
					<tr>
						<th></th>
						<td>{$trk_photo_idPhoto_hidden}</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_description}:</th>
						<td>
							{$trk_photo_description_input}
							<span class="validatetion-error" id="trk_photo_description_error"></span>
						</td>
					</tr>
					{if !empty($trk_photo_sysname)}
					<tr>
						<th>{$lng_label_picture_old_sysname}</th>
						<td><img src="{$trk_photo_sysname}" /></td>
					</tr>
					{/if}
					<tr>
						<th>{$lng_label_picture_sysname}</th>
						<td>
							<div id="imgUploader"></div>
							<span class="validatetion-error" id="trk_photo_sysname_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_search_circuit_type}</th>
						<td>
							<select id="circuitType" name="circuitType" onchange="loadCircuitList();">
							{foreach from=$circuitTypeList item=type key=keyType}
								<option value="{$keyType}" {if $keyType == $trk_photo_trk_circuits_circuitType}selected="selected"{/if}>{$type}</option>                
							{/foreach}
							</select><br/>
							<span class="validatetion-error" id="trk_photo_circuittype_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_search_circuit_country}</th>
						<td>
							<select id="circuitCountry" name="circuitCountry" onchange="loadCircuitList();">
							{foreach from=$circuitCountryList item=country key=keyCountry}
								<option value="{$keyCountry}" {if $keyCountry == $trk_photo_trk_circuits_country}selected="selected"{/if}>{$country}</option>                
							{/foreach}
							</select><br/>
							<span class="validatetion-error" id="trk_photo_circuitcountry_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_circuit}:</th>
						<td>
							<select name="trk_photo_circuit" id="trk_photo_circuit">
								{foreach from=$circuitList item=circuit key=keyCircuit}
									<option value="{$keyCircuit}" {if $keyCircuit == $trk_photo_circuit}selected="selected"{/if}>{$circuit}</option>
								{/foreach}
							</select><br />
							<span class="validatetion-error" id="trk_photo_circuit_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_lang_photo_status}:</th>
						<td>
							{$trk_photo_status_input}
						</td>
					</tr>
					<!-- from here -->
					<tr>
						<th>{$lng_label_picture_raceday}:</th>
						<td>
							{$trk_photo_raceday_input}<br />
							<span class="validatetion-error" id="trk_photo_raceday_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_racetime}:</th>
						<td>
							{$trk_photo_racetime_input}<br />
							<span class="validatetion-error" id="trk_photo_racetime_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_car_license}:</th>
						<td>
							{$trk_photo_carLicensePlate_input}<br />
							<span class="validatetion-error" id="trk_photo_carLicensePlate_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_car_number}:</th>
						<td>
							{$trk_photo_carNumber_input}<br />
							<span class="validatetion-error" id="trk_photo_carNumber_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_car_pilot}:</th>
						<td>
							{$trk_photo_carPilot_input}<br />
							<span class="validatetion-error" id="trk_photo_carPilot_error"></span>
						</td>
					</tr>
					<tr>
						<th>{$lng_label_picture_car_brand}:</th>
						<td>
							{$trk_photo_carBrandName_input}<br />
							<span class="validatetion-error" id="trk_photo_carBrandName_error"></span>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top">
				<table>
					<tr>
						<td valign="top">
							<div id="imgUploaderQueue"></div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
    </table>
</form>

{literal}
    <script type="text/javascript">

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
            
            var circuitType     =   $('#circuitType').val();
            var circuitCountry  =   $('#circuitCountry').val();
            
            if(circuitType != '' && circuitCountry != '') {
                $.getJSON({/literal}'{php} echo base_url(); {/php}/getcircuitlist'{literal}, {
                    type:       circuitType,
                    country:    circuitCountry
                }, function(json) {
                    $('#trk_photo_circuit').empty();
                    for(index in json) {
                        $('#trk_photo_circuit').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }        

                    $('#circuit').sort_select_box();
                })
            }
        } 
    </script>
{/literal}

 {literal}
 <style type="text/css">
    .uploadifyQueue{
        float: right;
        max-height: 500px;
        height: 500px;
        overflow: auto;
        width: 400px;
    }
 </style>
{/literal}

{$jsdocready}

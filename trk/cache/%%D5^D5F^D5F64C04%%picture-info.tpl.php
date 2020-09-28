<?php /* Smarty version 2.6.26, created on 2011-05-10 08:55:02
         compiled from proom/image/picture-info.tpl */ ?>
<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table style="margin:0px;">
		<tr>
			<td>
				<table style="margin:0px;">
					<tr>
						<th></th>
						<td><?php echo $this->_tpl_vars['trk_photo_idPhoto_hidden']; ?>
</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_description']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_description_input']; ?>

							<span class="validatetion-error" id="trk_photo_description_error"></span>
						</td>
					</tr>
					<?php if (! empty ( $this->_tpl_vars['trk_photo_sysname'] )): ?>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_old_sysname']; ?>
</th>
						<td><img src="<?php echo $this->_tpl_vars['trk_photo_sysname']; ?>
" /></td>
					</tr>
					<?php endif; ?>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_sysname']; ?>
</th>
						<td>
							<div id="imgUploader"></div>
							<span class="validatetion-error" id="trk_photo_sysname_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_search_circuit_type']; ?>
</th>
						<td>
							<select id="circuitType" name="circuitType" onchange="loadCircuitList();">
							<?php $_from = $this->_tpl_vars['circuitTypeList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyType'] => $this->_tpl_vars['type']):
?>
								<option value="<?php echo $this->_tpl_vars['keyType']; ?>
" <?php if ($this->_tpl_vars['keyType'] == $this->_tpl_vars['trk_photo_trk_circuits_circuitType']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['type']; ?>
</option>                
							<?php endforeach; endif; unset($_from); ?>
							</select><br/>
							<span class="validatetion-error" id="trk_photo_circuittype_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_search_circuit_country']; ?>
</th>
						<td>
							<select id="circuitCountry" name="circuitCountry" onchange="loadCircuitList();">
							<?php $_from = $this->_tpl_vars['circuitCountryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyCountry'] => $this->_tpl_vars['country']):
?>
								<option value="<?php echo $this->_tpl_vars['keyCountry']; ?>
" <?php if ($this->_tpl_vars['keyCountry'] == $this->_tpl_vars['trk_photo_trk_circuits_country']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['country']; ?>
</option>                
							<?php endforeach; endif; unset($_from); ?>
							</select><br/>
							<span class="validatetion-error" id="trk_photo_circuitcountry_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_circuit']; ?>
:</th>
						<td>
							<select name="trk_photo_circuit" id="trk_photo_circuit">
								<?php $_from = $this->_tpl_vars['circuitList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyCircuit'] => $this->_tpl_vars['circuit']):
?>
									<option value="<?php echo $this->_tpl_vars['keyCircuit']; ?>
" <?php if ($this->_tpl_vars['keyCircuit'] == $this->_tpl_vars['trk_photo_circuit']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['circuit']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select><br />
							<span class="validatetion-error" id="trk_photo_circuit_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_lang_photo_status']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_status_input']; ?>

						</td>
					</tr>
					<!-- from here -->
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_raceday']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_raceday_input']; ?>
<br />
							<span class="validatetion-error" id="trk_photo_raceday_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_racetime']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_racetime_input']; ?>
<br />
							<span class="validatetion-error" id="trk_photo_racetime_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_car_license']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_carLicensePlate_input']; ?>
<br />
							<span class="validatetion-error" id="trk_photo_carLicensePlate_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_car_number']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_carNumber_input']; ?>
<br />
							<span class="validatetion-error" id="trk_photo_carNumber_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_car_pilot']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_carPilot_input']; ?>
<br />
							<span class="validatetion-error" id="trk_photo_carPilot_error"></span>
						</td>
					</tr>
					<tr>
						<th><?php echo $this->_tpl_vars['lng_label_picture_car_brand']; ?>
:</th>
						<td>
							<?php echo $this->_tpl_vars['trk_photo_carBrandName_input']; ?>
<br />
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

<?php echo '
    <script type="text/javascript">
        function loadCircuitList(){
            
            var circuitType     =   $(\'#circuitType\').val();
            var circuitCountry  =   $(\'#circuitCountry\').val();
            
            if(circuitType != \'\' && circuitCountry != \'\') {
                $.getJSON('; ?>
'<?php  echo base_url();  ?>/getcircuitlist'<?php echo ', {
                    type:       circuitType,
                    country:    circuitCountry
                }, function(json) {
                    $(\'#trk_photo_circuit\').empty();
                    for(index in json) {
                        $(\'#trk_photo_circuit\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }        
                })
            }
        } 
    </script>
'; ?>


 <?php echo '
 <style type="text/css">
    .uploadifyQueue{
        float: right;
        max-height: 500px;
        height: 500px;
        overflow: auto;
        width: 400px;
    }
 </style>
'; ?>


<?php echo $this->_tpl_vars['jsdocready']; ?>

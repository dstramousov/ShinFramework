<?php /* Smarty version 2.6.26, created on 2011-09-08 14:27:16
         compiled from web/common/search-form.tpl */ ?>
<form action="<?php  echo prep_url(base_url())  ?>/search" method="post" id="gallery-search"> 
    <div>
        <table class="search-panel" align="center">
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_circuit_type']; ?>
</th>
                <td>
                    <select name="search[type]" id="circuit-type" onchange="loadCircuitList();">
                        <?php $_from = $this->_tpl_vars['circuitTypeList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['type']):
?>
                            <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['type']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_circuit_country']; ?>
</th>
                <td>
                    <select name="search[country]" id="circuit-country" onchange="loadCircuitList();">
                        <?php $_from = $this->_tpl_vars['circuitCountryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['country']):
?>
                            <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['country']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_circuit']; ?>
</th>
                <td>
                    <select name="search[circuit]" id="circuit">
                        <?php $_from = $this->_tpl_vars['circuitList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['circuit']):
?>
                            <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['circuit']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_race_day']; ?>
</th>
                <td>
                    <input type="text" name="search[raceDay]" value="" id="raceDay" />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_race_time_from']; ?>
</th>
                <td>
                    <input type="text" name="search[raceTimeFrom]" value="" id="raceTimeFrom" />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_race_time_to']; ?>
</th>
                <td>
                    <input type="text" name="search[raceTimeTo]" value="" id="raceTimeTo" />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_licence']; ?>
</th>
                <td>
                    <?php if (! empty ( $this->_tpl_vars['anon_readonly_addons'] )): ?>
                    <?php echo $this->_tpl_vars['lng_label_search_after_registration']; ?>

                    <?php else: ?>
                    <input type="text" name="search[licence]" value="" id="licence" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_car_number']; ?>
</th>
                <td>
                    <?php if (! empty ( $this->_tpl_vars['anon_readonly_addons'] )): ?>
                    <?php echo $this->_tpl_vars['lng_label_search_after_registration']; ?>

                    <?php else: ?>
                    <input type="text" name="search[car_number]" value="" id="car_number" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_car_pilot']; ?>
</th>
                <td>
                    <?php if (! empty ( $this->_tpl_vars['anon_readonly_addons'] )): ?>
                    <?php echo $this->_tpl_vars['lng_label_search_after_registration']; ?>

                    <?php else: ?>
                    <input type="text" name="search[car_pilot]" value="" id="car_pilot" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_car_brand']; ?>
</th>
                <td>
                    <?php if (! empty ( $this->_tpl_vars['anon_readonly_addons'] )): ?>
                    <?php echo $this->_tpl_vars['lng_label_search_after_registration']; ?>

                    <?php else: ?>
                    <input type="text" name="search[car_brand]" value="" id="car_brand" />
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_search_rate']; ?>
</th>
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

<?php echo '
    <script type="text/javascript">
    
        $(\'#half\').raty({
            path:       \''; ?>
<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/images/rate/<?php echo '\',
            onClick:    function(score) {
                $(\'#rate\').val(score);
            },
            direction:  \'right\'
        });
        
        $(\'#circuit-type\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['type'] )): ?><?php echo $this->_tpl_vars['search']['type']; ?>
<?php endif; ?><?php echo '\');
        $(\'#circuit-country\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['country'] )): ?><?php echo $this->_tpl_vars['search']['country']; ?>
<?php endif; ?><?php echo '\');
        $(\'#circuit\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['circuit'] )): ?><?php echo $this->_tpl_vars['search']['circuit']; ?>
<?php endif; ?><?php echo '\');
        $(\'#raceDay\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['raceDay'] )): ?><?php echo $this->_tpl_vars['search']['raceDay']; ?>
<?php endif; ?><?php echo '\');
        $(\'#raceTimeFrom\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['raceTimeFrom'] )): ?><?php echo $this->_tpl_vars['search']['raceTimeFrom']; ?>
<?php endif; ?><?php echo '\');
        $(\'#raceTimeTo\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['raceTimeTo'] )): ?><?php echo $this->_tpl_vars['search']['raceTimeTo']; ?>
<?php endif; ?><?php echo '\');
        $(\'#licence\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['licence'] )): ?><?php echo $this->_tpl_vars['search']['licence']; ?>
<?php endif; ?><?php echo '\');
        $(\'#car_number\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['car_number'] )): ?><?php echo $this->_tpl_vars['search']['car_number']; ?>
<?php endif; ?><?php echo '\');
        $(\'#car_pilot\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['car_pilot'] )): ?><?php echo $this->_tpl_vars['search']['car_pilot']; ?>
<?php endif; ?><?php echo '\');
        $(\'#car_brand\').val(\''; ?>
<?php if (! empty ( $this->_tpl_vars['search']['car_brand'] )): ?><?php echo $this->_tpl_vars['search']['car_brand']; ?>
<?php endif; ?><?php echo '\');
        
        $.fn.raty.start('; ?>
<?php if (! empty ( $this->_tpl_vars['search']['rate'] )): ?><?php echo $this->_tpl_vars['search']['rate']; ?>
<?php endif; ?><?php echo ');
        
        function resetForm(){
            $.fn.raty.start(0, \'#half\');
            $(\'#rate\').val(0);    
        }

		$.fn.sort_select_box = function()
		{
			var my_options = $("#" + this.attr(\'id\') + \' option\');
			my_options.sort(function(a,b) {
				if (a.text > b.text) return 1;
				else if (a.text < b.text) return -1;
				else return 0
    		})

			$(this).empty().append(my_options);

			$("#"+this.attr(\'id\')+" option").attr(\'selected\', false);
		}
        
        function loadCircuitList(){
            
            var circuitType     =   $(\'#circuit-type\').val();
            var circuitCountry  =   $(\'#circuit-country\').val();
            
            if(circuitType != \'\' && circuitCountry != \'\') {
                $.getJSON('; ?>
'<?php  echo base_url();  ?>/getcircuitlist'<?php echo ', {
                    type:       circuitType,
                    country:    circuitCountry
                }, function(json) {
                    $(\'#circuit\').empty();
                    for(index in json) {
                        $(\'#circuit\').append(\'<option value="\' + index + \'">\' +  json[index] + \'</option>\');    
                    }

                    // reorder after receive
                    $(\'#circuit\').sort_select_box();
                })
            }
        }
        
    </script>
'; ?>

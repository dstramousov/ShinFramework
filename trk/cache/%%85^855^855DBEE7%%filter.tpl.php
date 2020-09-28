<?php /* Smarty version 2.6.26, created on 2011-05-04 08:13:33
         compiled from proom/image/filter.tpl */ ?>
<fieldset>
    <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_picture_filter']; ?>
:</span>
    <form>
    <table class="admin-search-table">
        <tr>
            <td valign="top" >
                <fieldset>
                    <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_search_base']; ?>
:</span>
                    <table>
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
                                <select name="search[circuit]" id="circuit" class="search-circuit">
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
                                <input type="text" name="search[raceDay]" value="" id="raceDay">
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_race_time_from']; ?>
</th>
                            <td>
                                <input type="text" name="search[raceTimeFrom]" value="" id="raceTimeFrom">
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_race_time_to']; ?>
</th>
                            <td>
                                <input type="text" name="search[raceTimeTo]" value="" id="raceTimeTo">
                            </td>
                        </tr>
                    </table>
                </fieldset>    
            </td>
            <td valign="top">
                <fieldset>
                    <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_search_advanced']; ?>
:</span>
                    <table>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_licence']; ?>
</th>
                            <td>
                                <input type="text" name="search[licence]" value="" id="license">
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_car_number']; ?>
</th>
                            <td>
                                <input type="text" name="search[car_number]" value="" id="car_number">
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_car_pilot']; ?>
</th>
                            <td>
                                <input type="text" name="search[car_pilot]" value="" id="car_pilot">
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_car_brand']; ?>
</th>
                            <td>
                                <input type="text" name="search[car_brand]" value="" id="car_brand">
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_search_rate']; ?>
</th>
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
                <input type="button" name="search-btn" value="<?php echo $this->_tpl_vars['lng_label_search_button']; ?>
" id="search" onclick="makeSearch();" />
                <input type="reset"  name="search-btn" value="<?php echo $this->_tpl_vars['lng_label_search_reset']; ?>
" id="reset" onclick="resetSearch();" />
            </td>
        </tr>
    </table>
    </form>
</fieldset>

<?php echo '
    <script type="text/javascript">
    
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
        $(\'#license\').val(\''; ?>
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
        
        function makeSearch(){
        
            var search  =  {};
            
                search[\'type\']           =   $(\'#circuit-type\').val();
                search[\'country\']        =   $(\'#circuit-country\').val();
                search[\'circuit\']        =   $(\'#circuit\').val();
                search[\'raceDay\']        =   $(\'#raceDay\').val();
                search[\'raceTimeFrom\']   =   $(\'#raceTimeFrom\').val();
                search[\'raceTimeTo\']     =   $(\'#raceTimeTo\').val();
                search[\'license\']        =   $(\'#license\').val();
                search[\'car_number\']     =   $(\'#car_number\').val();
                search[\'car_pilot\']      =   $(\'#car_pilot\').val();
                search[\'car_brand\']      =   $(\'#car_brand\').val();
                search[\'rate\']           =   $(\'#rate\').val();
                search[\'userId\']         =   $(\'#userId\').val();
                
            $.getJSON('; ?>
'<?php  echo base_url();  ?>/image/setfilter'<?php echo ', {
                search: search        
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }        
            })
        }
        
        function resetSearch(){
            $.getJSON('; ?>
'<?php  echo base_url();  ?>/image/resetfilter'<?php echo ', null, function(json) {
                pictureDataList.fnDraw();    
            })    
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
                })
            }
        }
    </script>
'; ?>
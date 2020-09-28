<?php /* Smarty version 2.6.26, created on 2011-05-05 12:41:44
         compiled from web/photographer/photo-info.tpl */ ?>
<table align="center" class="generalinformation-table">
    <tr>
        <td valign="bottom">
            <div id="photo-rate" class="photo-rate"></div>
            <div class="user-not-loggedin" id="user-not-loggedin">
                <?php echo $this->_tpl_vars['lng_label_please']; ?>
 <a href="<?php  echo base_url().'/main';  ?>"><?php echo $this->_tpl_vars['lng_label_logged_in']; ?>
</a> <?php echo $this->_tpl_vars['lng_label_or']; ?>
 <a href="<?php  echo base_url().'/joinus';  ?>"><?php echo $this->_tpl_vars['lng_label_registrate']; ?>
</a> 
            </div>
        </td>
        <td class="middle-photo">
            <div>
                <img src="<?php echo $this->_tpl_vars['img']; ?>
" alt="" title="" class="preview-photo" />
            </div>
        </td>
        <td valign="bottom">
            <table class="cirsuit-info" border="0">
                <tr>
                    <td style="width:50px;padding-bottom:15px;">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/photographer/facebook_button.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="<?php echo $this->_tpl_vars['circuit_photo']; ?>
" alt="Circuit photo" title="Circuit photo" /><br /><br/ >
                    </td>
                </tr>
                <tr>
                    <td class="circuit-name"><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_circuit_name']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['circuit_name']; ?>
</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_circuit_country']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['circuit_country']; ?>
</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_race_day']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['raceday']; ?>
</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_shuter_time']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['racetime']; ?>
</td>
                </tr>
                <!-- if anon not show this block -->
                <?php if (! empty ( $this->_tpl_vars['photoData']['ainfo'] )): ?>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_cat_license']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['carLicensePlate']; ?>
</td>
                </tr>    
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_car_number']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['carNumber']; ?>
</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_car_pilot']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['carPilot']; ?>
</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_picture_web_car_brand']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photoData']['carBrandName']; ?>
</td>
                </tr>
                <?php endif; ?>
                <!-- if anon not show this block -->
            <tr>
                <td>&nbsp;</td>
            </tr>
            
            <tr>
                <td><?php echo $this->_tpl_vars['lng_label_photographerinfo']; ?>
</td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['photoData']['ainfo'] )): ?>
            <tr>
                <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_photographerinfo_fn']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photographer_fullname']; ?>
</td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_photographerinfo_nick']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photographer_nick']; ?>
</td>
            </tr>
            <tr>
                <td><span class="circuitdata-header"><?php echo $this->_tpl_vars['lng_label_photographerinfo_at']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['photographer_type']; ?>
</td>
            </tr>
            </table>
        </td>
    </tr>
  
    <tr>
        <td></td>
        <td class="middle-photo">
            <div class="photo-actions">
                <table width="100%" align="center">
                    <tr>
                        <td align="left">
                            <?php if (! is_null ( $this->_tpl_vars['idUser'] )): ?>
                                <?php if ($this->_tpl_vars['userphotoaction'] != 'sell'): ?>
                                    <a href="<?php echo $this->_tpl_vars['urlfordownload']; ?>
" target="_blank" class="scarica-hires-btn"></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td align="right">
                            <?php if (! is_null ( $this->_tpl_vars['idUser'] )): ?>
                                <?php if ($this->_tpl_vars['userphotoaction'] == 'sell'): ?>
                                    <?php if (! in_array ( $this->_tpl_vars['idPhoto'] , $this->_tpl_vars['cart'] )): ?>
                                        <a href="javascript:void(0)" class="ordina-btn"  onclick="addToCart(<?php echo $this->_tpl_vars['idPhoto']; ?>
, this)"></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>

    <?php echo '
        <script type="text/javascript">

        	$(\'#facebookimage\').attr(\'content\', \''; ?>
<?php echo $this->_tpl_vars['facebook_img_url']; ?>
<?php echo '\');

            $(\'#photo-rate\').raty({
                    path:       \''; ?>
<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/images/rate/<?php echo '\',
                    start:      '; ?>
<?php echo $this->_tpl_vars['photoData']['score']; ?>
<?php echo ',
                    onClick:    function(score) {
                        '; ?>

                            <?php if (! empty ( $this->_tpl_vars['idUser'] )): ?>
                        <?php echo '
                            
                            // 1. disable raiting for this user
                            $.fn.raty.readOnly(true);
                            
                            // 2. send request
                            $.getJSON('; ?>
'<?php  echo base_url();  ?>/setraiting'<?php echo ', {
                                score:  score,
                                photo:  '; ?>
<?php echo $this->_tpl_vars['photoData']['idPhoto']; ?>
<?php echo '
                            }, function(json) {
                                $.fn.raty.start(json.score);
                                $(\'.total-raters\').text(json.raters);
                            })
                        '; ?>

                            <?php else: ?>
                        <?php echo '
                                $(\'#photo-rate\').hide();
                                $(\'.user-not-loggedin\').show();
                        '; ?>
    
                            <?php endif; ?>
                        <?php echo '
                    }
            });
        </script>
    '; ?>


<?php if ($this->_tpl_vars['isRate'] == 'true'): ?>
    <?php echo '
        <script type="text/javascript">
            $.fn.raty.readOnly(true);    
        </script>    
    '; ?>

<?php endif; ?>

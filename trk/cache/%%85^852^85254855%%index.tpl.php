<?php /* Smarty version 2.6.26, created on 2011-05-11 16:59:17
         compiled from proom/tools/index.tpl */ ?>
<?php echo '
    <script type="text/javascript">
    
        var file    =   \'\';
        
        function selectFile(event, ID, fileObj){
            file    =   fileObj.name;
        }
    
        function uploadComplete(event, data){
            $.getJSON(\''; ?>
<?php echo base_url(); ?>/tools/savewt<?php echo '\', {
                wtFile:   file  
            }, function(json){
                if(json.result) {
                    $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/tools/getwtimagelink'); ?><?php echo '\', null, function(json){
                        $(\'#wt-file\').attr(\'src\', json.link);    
                    })
                }
            });    
        }
    </script>
'; ?>


<?php echo $this->_tpl_vars['jsdocready']; ?>


<div class="tools-tab">
    <div class="wt-properties">
        <?php echo $this->_tpl_vars['jsMessages']; ?>

        <fieldset>
        <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_prop']; ?>
</span>
        <table class="wt-table">
            <!--<tr>
                <td><label for="watermark_status"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_status']; ?>
</label></td>
                <td><input type="checkbox" value="" name="" id="watermark_status" <?php if ($this->_tpl_vars['userData']['watermark_status'] == 1): ?>checked="checked"<?php endif; ?> onclick="setStatus();" /></td>
            </tr>-->
            <tr>
                <td><label for="trk_user_watermarkusage"><?php echo $this->_tpl_vars['lng_label_snaptrack_photoaction']; ?>
</label></td>
                <td>
					<select name="trk_user_photoaction" id="trk_user_photoaction" onchange="setPhotoAction();">
						<option value="sell" <?php if ($this->_tpl_vars['userData']['photoaction'] == 'sell'): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['lng_label_snaptrack_photosell']; ?>
</option>
						<option value="download" <?php if ($this->_tpl_vars['userData']['photoaction'] == 'download'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lng_label_snaptrack_photodownload']; ?>
</option>
					</select>
                </td>
            </tr>
            <tr>
                <td><label for="trk_user_watermarkusage"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_usage']; ?>
</label></td>
                <td>
					<select name="trk_user_watermarkusage" id="trk_user_watermarkusage" onchange="setStatusWM();">
						<option value="s" <?php if ($this->_tpl_vars['userData']['watermarkusage'] == 's'): ?>selected="selected"<?php endif; ?> >System</option>
						<option value="c" <?php if ($this->_tpl_vars['userData']['watermarkusage'] == 'c'): ?>selected="selected"<?php endif; ?>>Custom</option>
						<option value="o" <?php if ($this->_tpl_vars['userData']['watermarkusage'] == 'o'): ?>selected="selected"<?php endif; ?>>Off</option>
					</select>
                </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['userData']['wtm_file_name'] )): ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_watermark_old']; ?>
</th>
                <td><img src="<?php echo $this->_tpl_vars['userData']['wtm_file_name']; ?>
" id="wt-file" /></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_watermark_new']; ?>
</th>
                <td>
                    <div id="wtUploader"></div>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position']; ?>
</th>
                <td>
                    <table class="wt-position">
                        <tr>
                            <td class="top-left" onclick="setPosition(this, 1);" id="position_1"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_t_l']; ?>
</td>
                            <td class="top-center" onclick="setPosition(this, 2);" id="position_2"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_t_c']; ?>
</td>
                            <td class="top-right" onclick="setPosition(this, 3);" id="position_3"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_t_r']; ?>
</td>
                        </tr>
                        <tr>
                            <td class="center-left" onclick="setPosition(this, 4);" id="position_4"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_c_l']; ?>
</td>
                            <td class="center-center" onclick="setPosition(this, 5);" id="position_5"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_c_c']; ?>
</td>
                            <td class="center-right" onclick="setPosition(this, 6);" id="position_6"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_c_r']; ?>
</td>
                        </tr>
                        <tr>
                            <td class="bottom-left" onclick="setPosition(this, 7);" id="position_7"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_b_l']; ?>
</td>
                            <td class="bottom-center" onclick="setPosition(this, 8);" id="position_8"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_b_c']; ?>
</td>
                            <td class="bottom-right" onclick="setPosition(this, 9);" id="position_9"><?php echo $this->_tpl_vars['lng_label_prifle_watermark_position_b_r']; ?>
</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!--<tr>
                <td colspan="2"><input type="button" name="save-btn" value="<?php echo $this->_tpl_vars['lng_label_prifle_watermark_save']; ?>
" id="save-btn" onclick="upload();"></td>
            </tr>-->
        </table>
    </fieldset>
    </div>
</div>

<?php echo '
    <script type="text/javascript">
        
        $(\'#position_\' + '; ?>
<?php echo $this->_tpl_vars['userData']['watermark_position']; ?>
<?php echo ').addClass(\'active-position\');
        
        function setStatusWM(){
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/tools/setstatuswm'); ?><?php echo '\', {
                wmstatus: $(\'#trk_user_watermarkusage\').val()
            },function(json){
                if(json.result) {
                    $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/tools/getwtimagelink'); ?><?php echo '\', null, function(json){
                        $(\'#wt-file\').attr(\'src\', json.link);    
                    })
                }
            })        
        }

        function setPhotoAction(){
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/tools/setphotoaction'); ?><?php echo '\', {
                photoaction: $(\'#trk_user_photoaction\').val()
            })        
        }
        
        function upload(){
        
             $(\'#wtUploader\').uploadifyUpload();
        }
        
        function setPosition(target, position) {
            
           $(\'td\').removeClass(\'selected-position\');
           $(target).addClass(\'selected-position\');
            
           $.getJSON(\''; ?>
<?php  echo base_url();  ?>/tools/saveposition<?php echo '\', {
                position: position
           });
            
        }
    </script>
'; ?>
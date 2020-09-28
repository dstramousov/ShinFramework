{literal}
    <script type="text/javascript">
    
        var file    =   '';
        
        function selectFile(event, ID, fileObj){
            file    =   fileObj.name;
        }
    
        function uploadComplete(event, data){
            $.getJSON('{/literal}{php}echo base_url();{/php}/tools/savewt{literal}', {
                wtFile:   file  
            }, function(json){
                if(json.result) {
                    $.getJSON('{/literal}{php}echo prep_url(base_url().'/tools/getwtimagelink');{/php}{literal}', null, function(json){
                        $('#wt-file').attr('src', json.link);    
                    })
                }
            });    
        }
    </script>
{/literal}

{$jsdocready}

<div class="tools-tab">
    <div class="wt-properties">
        {$jsMessages}
        <fieldset>
        <span style="color:red; font-weight:bold">{$lng_label_prifle_watermark_prop}</span>
        <table class="wt-table">
            <!--<tr>
                <td><label for="watermark_status">{$lng_label_prifle_watermark_status}</label></td>
                <td><input type="checkbox" value="" name="" id="watermark_status" {if $userData.watermark_status == 1}checked="checked"{/if} onclick="setStatus();" /></td>
            </tr>-->
            <tr>
                <td><label for="trk_user_watermarkusage">{$lng_label_snaptrack_photoaction}</label></td>
                <td>
					<select name="trk_user_photoaction" id="trk_user_photoaction" onchange="setPhotoAction();">
						<option value="sell" {if $userData.photoaction == 'sell'}selected="selected"{/if} >{$lng_label_snaptrack_photosell}</option>
						<option value="download" {if $userData.photoaction == 'download'}selected="selected"{/if}>{$lng_label_snaptrack_photodownload}</option>
					</select>
                </td>
            </tr>
            <tr>
                <td><label for="trk_user_watermarkusage">{$lng_label_prifle_watermark_usage}</label></td>
                <td>
					<select name="trk_user_watermarkusage" id="trk_user_watermarkusage" onchange="setStatusWM();">
						<option value="s" {if $userData.watermarkusage == 's'}selected="selected"{/if} >System</option>
						<option value="c" {if $userData.watermarkusage == 'c'}selected="selected"{/if}>Custom</option>
						<option value="o" {if $userData.watermarkusage == 'o'}selected="selected"{/if}>Off</option>
					</select>
                </td>
            </tr>
            {if !empty($userData.wtm_file_name)}
            <tr>
                <th>{$lng_label_prifle_watermark_old}</th>
                <td><img src="{$userData.wtm_file_name}" id="wt-file" /></td>
            </tr>
            {/if}
            <tr>
                <th>{$lng_label_prifle_watermark_new}</th>
                <td>
                    <div id="wtUploader"></div>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_prifle_watermark_position}</th>
                <td>
                    <table class="wt-position">
                        <tr>
                            <td class="top-left" onclick="setPosition(this, 1);" id="position_1">{$lng_label_prifle_watermark_position_t_l}</td>
                            <td class="top-center" onclick="setPosition(this, 2);" id="position_2">{$lng_label_prifle_watermark_position_t_c}</td>
                            <td class="top-right" onclick="setPosition(this, 3);" id="position_3">{$lng_label_prifle_watermark_position_t_r}</td>
                        </tr>
                        <tr>
                            <td class="center-left" onclick="setPosition(this, 4);" id="position_4">{$lng_label_prifle_watermark_position_c_l}</td>
                            <td class="center-center" onclick="setPosition(this, 5);" id="position_5">{$lng_label_prifle_watermark_position_c_c}</td>
                            <td class="center-right" onclick="setPosition(this, 6);" id="position_6">{$lng_label_prifle_watermark_position_c_r}</td>
                        </tr>
                        <tr>
                            <td class="bottom-left" onclick="setPosition(this, 7);" id="position_7">{$lng_label_prifle_watermark_position_b_l}</td>
                            <td class="bottom-center" onclick="setPosition(this, 8);" id="position_8">{$lng_label_prifle_watermark_position_b_c}</td>
                            <td class="bottom-right" onclick="setPosition(this, 9);" id="position_9">{$lng_label_prifle_watermark_position_b_r}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!--<tr>
                <td colspan="2"><input type="button" name="save-btn" value="{$lng_label_prifle_watermark_save}" id="save-btn" onclick="upload();"></td>
            </tr>-->
        </table>
    </fieldset>
    </div>
</div>

{literal}
    <script type="text/javascript">
        
        $('#position_' + {/literal}{$userData.watermark_position}{literal}).addClass('active-position');
        
        function setStatusWM(){
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/tools/setstatuswm');{/php}{literal}', {
                wmstatus: $('#trk_user_watermarkusage').val()
            },function(json){
                if(json.result) {
                    $.getJSON('{/literal}{php}echo prep_url(base_url().'/tools/getwtimagelink');{/php}{literal}', null, function(json){
                        $('#wt-file').attr('src', json.link);    
                    })
                }
            })        
        }

        function setPhotoAction(){
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/tools/setphotoaction');{/php}{literal}', {
                photoaction: $('#trk_user_photoaction').val()
            })        
        }
        
        function upload(){
        
             $('#wtUploader').uploadifyUpload();
        }
        
        function setPosition(target, position) {
            
           $('td').removeClass('selected-position');
           $(target).addClass('selected-position');
            
           $.getJSON('{/literal}{php} echo base_url(); {/php}/tools/saveposition{literal}', {
                position: position
           });
            
        }
    </script>
{/literal}
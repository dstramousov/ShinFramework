{$cssincludes}
{$jsincludes}
{$jsdocready}
{$jsnondocready}

<div class="messages">
    {$jsMessages}
    {$jsErrors}
</div>

<br />

<div class="controls">
    <a href="" id="add-picture-button"></a>
</div>

<br />
{include file="proom/image/filter.tpl"}
<br />
    
<!-- init block of crud -->
{$crudData}
<!-- init block of crud -->

<table>
    <tr>
        <td valign="top">
            <fieldset>
                <legend>{$lng_label_gallery_img_list}</legend>
                {$ssstylemustbehere}
            </fieldset>
        </td>
    </tr>
</table>

{literal}
    <script type="text/javascript">
        
        var fileQuee;
        
        /**
        * this is collback of collecting additional data from
        * different libraries like: tinyMCE, Uploadify and others  
        */
        function collectPictureAdditionalData(){
            
            additionalData  =   {
                trk_photo_description: tinyMCE.activeEditor.getContent(),
            };
            
            return additionalData;
        }
        
        function beforeShowDialog(){
            fileQuee    =   new Array;    
        }
        
        /**
        *  callback for additional field - uploadify select event
        */
        function onSelectCallback(event, ID, fileObj){
            
            var queeSize = 0;
            
            // 1. push information about curret file
            fileQuee[fileObj.name] = {size: fileObj.size, id: ID}; 
            
            // 2. collect size of quee
            for(index in fileQuee){
                queeSize += fileQuee[index].size;     
            }
            
            $.getJSON('{/literal}{php} echo base_url(); {/php}/{literal}image/checklimitation', {
                'total-size':   queeSize,
                'current-size': fileObj.size   
            }, function(json){
                if(!json.result) {
                    alert(json.message);
                    
                    // 1. delete not allowed file from quee
                    delete fileQuee[fileObj.name];
                    
                    // 2. clear this not allowed file from Uploadify quee 
                    //$('#imgUploader').uploadifyCancel($('.uploadifyQueueItem').first().attr('id').replace('file_upload',''))
                }
            })
        }
        
        /**
        *  callback for additional field - uploadify cancel event
        */
        function onCancelCallback(){
            fileQuee    =   new Array;
        }
        
        /**
        * callback for uploading files befor saving data
        */
        function uploadCallback(){
            if(!$.isEmptyObject(fileQuee)) {
                $('#imgUploader').uploadifyUpload();
            
                return true;
            } else {
                return false;    
            }
        }
        
        function onComplete(event, ID, fileObj, response){
          
            // 1. collect general data
            $('#picture #picture-add-dialog, #picture-edit-dialog input,select:not(input)').each(function(){
                if($(this).attr('id') != '') {
                    data[$(this).attr('id')] = $(this).val();
                }    
            });
            
            // 2. merge standart data and additional data
            additionalData = collectPictureAdditionalData();
            data           = $.extend(data, additionalData, {'trk_photo_sysname': fileObj.name});
            
            $.ajax({
                    url:        '{/literal}{php} echo base_url(); {/php}/{literal}image/create',
                    dataType:   'json',
                    data:       data,
                    type:       'POST'
            })
        }
        
        function onAllComplete(){
            
            pictureDataList.fnDraw();
            
            setTimeout(function(){
                pictureCrudObj.params.general.dialogObj.close(pictureCrudObj.params.general.dialogObj.getDialogId());
            }, 1000);
         }
        
    </script>
{/literal}

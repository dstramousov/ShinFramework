{$cssincludes}
{$jsincludes}
{$jsdocready}
{$jsnondocready}

<div class="messages">
    {$jsMessages}
    {$jsErrors}
</div>

<br />
{include file="admin/image/filter.tpl"}
<br />

<!-- init block of crud -->
{$crudData}
<!-- init block of crud -->

<table>
    <tr>
        <td valign="top">
            <fieldset>
                <span style="color:red; font-weight:bold">{$lng_label_gallery_img_list}</span>
                {$ssstylemustbehere}
            </fieldset>
        </td>
    </tr>
</table>

{literal}
    <script type="text/javascript">
        function changeUser(target){
            var userId  =   $(target).val();
            
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/adminimage/setfilter');{/php}{literal}', {
                search: {userId:userId}
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }
            })    
        }
        
        function saveStatus(){
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/adminimage/setstatus');{/php}{literal}', {
                photoId: $('#trk_photo_idPhoto').val(),
                status:  $('#trk_photo_status').val()
            }, function(json) {
                if(json.result) {
                    pictureCrudObj.params.general.dialogObj.close("edit-dialog");
                    pictureDataList.fnDraw();
                }
            })    
        }
    </script>
{/literal}
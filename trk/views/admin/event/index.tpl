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
	<a href="" id="add_circuit_button"></a>
</div>


<!-- init block of crud -->
{$crudData}
<!-- init block of crud -->

<div id="sure-dialog">
    <center>{$lng_label_event_delete_sure}</center>
</div>

<table>
    <tr>
        <td valign="top">
            <fieldset>
                <span style="color:red; font-weight:bold">{$lng_label_gallery_circuit_list}</span>
                {$ssstylemustbehere}
            </fieldset>
        </td>
    </tr>
</table>

{literal}
    <script type="text/javascript">
        function changeCircuit(target){
            var userId  =   $(target).val();
            
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/adminimage/setfilter');{/php}{literal}', {
                userId: userId
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }
            })    
        }
        
        function beforeShowDelete() {
            var idCircuit   =   $('input[name=idCircuit]').val();
            
            $.getJSON('{/literal}{php}echo prep_url(base_url().'/admineventcontroller/getimgcount');{/php}{literal}', {
                idCircuit:  idCircuit    
            }, function(json) {
                if(json.result) {
                    $('#total-images').text(json.count);    
                }
            })
        }
    </script>
{/literal}
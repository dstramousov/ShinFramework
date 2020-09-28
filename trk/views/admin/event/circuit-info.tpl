<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td>{$trk_circuits_idCircuit_hidden}</td>
        </tr>     
        <tr>
            <th>{$lng_label_circuit_name}</th>
            <td>{$trk_circuits_circuit_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_circuit_type}</th>
            <td>{$trk_circuits_circuitType_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_circuit_country}</th>
            <td>{$trk_circuits_country_input}</td>
        </tr>
        <tr>
            <th>{$lng_label_lang_img_circuit}</th>
            <td>
                <div id="imgUploader"></div>
            </td>
        </tr>
    </table>
</form>
{literal}
    <script type="text/javascript">
        var file    =   '';

       	// i`m not understand for what this is need? 
//        $('#trk_circuits_country').bind('mousedown', false);
        
        function onSelectCallback(event, ID, fileObj){
            file    =   fileObj.name;
        }
        
        function onCancelCallback(){
            file    =   '';
        }
        
        /**
        * this is collback of collecting additional data from
        * different libraries like: tinyMCE, Uploadify and others  
        */
        function collectAdditionalData(){
            additionalData  =   {
                trk_circuits_association_image: file   
            };
            
            return additionalData;
        }
        
        /**
        * callback for uploading files befor saving data
        */
        function uploadCallback(){
            $('#imgUploader').uploadifyUpload();
        }
        
        function onComplete(){
            snptCircuitCrudObj.save(); onCancelCallback();
        }
    </script>
{/literal}

{$jsdocready}


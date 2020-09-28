<?php /* Smarty version 2.6.26, created on 2011-08-02 15:49:12
         compiled from admin/event/circuit-info.tpl */ ?>
<form action="" method="post" class="sys-area-edit-form sys-dialog" >
    <table>
        <tr>
            <th></th>
            <td><?php echo $this->_tpl_vars['trk_circuits_idCircuit_hidden']; ?>
</td>
        </tr>     
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_circuit_name']; ?>
</th>
            <td><?php echo $this->_tpl_vars['trk_circuits_circuit_input']; ?>
</td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_circuit_type']; ?>
</th>
            <td><?php echo $this->_tpl_vars['trk_circuits_circuitType_input']; ?>
</td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_circuit_country']; ?>
</th>
            <td><?php echo $this->_tpl_vars['trk_circuits_country_input']; ?>
</td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_lang_img_circuit']; ?>
</th>
            <td>
                <div id="imgUploader"></div>
            </td>
        </tr>
    </table>
</form>
<?php echo '
    <script type="text/javascript">
        var file    =   \'\';

       	// i`m not understand for what this is need? 
//        $(\'#trk_circuits_country\').bind(\'mousedown\', false);
        
        function onSelectCallback(event, ID, fileObj){
            file    =   fileObj.name;
        }
        
        function onCancelCallback(){
            file    =   \'\';
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
            $(\'#imgUploader\').uploadifyUpload();
        }
        
        function onComplete(){
            snptCircuitCrudObj.save(); onCancelCallback();
        }
    </script>
'; ?>


<?php echo $this->_tpl_vars['jsdocready']; ?>


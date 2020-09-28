<?php /* Smarty version 2.6.26, created on 2011-05-23 10:59:17
         compiled from admin/event/index.tpl */ ?>
<?php echo $this->_tpl_vars['cssincludes']; ?>

<?php echo $this->_tpl_vars['jsincludes']; ?>

<?php echo $this->_tpl_vars['jsdocready']; ?>

<?php echo $this->_tpl_vars['jsnondocready']; ?>


<div class="messages">
    <?php echo $this->_tpl_vars['jsMessages']; ?>

    <?php echo $this->_tpl_vars['jsErrors']; ?>

</div>

<br />

<div class="controls">
	<a href="" id="add_circuit_button"></a>
</div>


<!-- init block of crud -->
<?php echo $this->_tpl_vars['crudData']; ?>

<!-- init block of crud -->

<div id="sure-dialog">
    <center><?php echo $this->_tpl_vars['lng_label_event_delete_sure']; ?>
</center>
</div>

<table>
    <tr>
        <td valign="top">
            <fieldset>
                <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_gallery_circuit_list']; ?>
</span>
                <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

            </fieldset>
        </td>
    </tr>
</table>

<?php echo '
    <script type="text/javascript">
        function changeCircuit(target){
            var userId  =   $(target).val();
            
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/adminimage/setfilter'); ?><?php echo '\', {
                userId: userId
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }
            })    
        }
        
        function beforeShowDelete() {
            var idCircuit   =   $(\'input[name=idCircuit]\').val();
            
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/admineventcontroller/getimgcount'); ?><?php echo '\', {
                idCircuit:  idCircuit    
            }, function(json) {
                if(json.result) {
                    $(\'#total-images\').text(json.count);    
                }
            })
        }
    </script>
'; ?>
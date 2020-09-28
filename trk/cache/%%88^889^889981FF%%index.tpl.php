<?php /* Smarty version 2.6.26, created on 2011-05-16 10:23:22
         compiled from admin/image/index.tpl */ ?>
<?php echo $this->_tpl_vars['cssincludes']; ?>

<?php echo $this->_tpl_vars['jsincludes']; ?>

<?php echo $this->_tpl_vars['jsdocready']; ?>

<?php echo $this->_tpl_vars['jsnondocready']; ?>


<div class="messages">
    <?php echo $this->_tpl_vars['jsMessages']; ?>

    <?php echo $this->_tpl_vars['jsErrors']; ?>

</div>

<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/image/filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />

<!-- init block of crud -->
<?php echo $this->_tpl_vars['crudData']; ?>

<!-- init block of crud -->

<table>
    <tr>
        <td valign="top">
            <fieldset>
                <span style="color:red; font-weight:bold"><?php echo $this->_tpl_vars['lng_label_gallery_img_list']; ?>
</span>
                <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

            </fieldset>
        </td>
    </tr>
</table>

<?php echo '
    <script type="text/javascript">
        function changeUser(target){
            var userId  =   $(target).val();
            
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/adminimage/setfilter'); ?><?php echo '\', {
                search: {userId:userId}
            }, function(json) {
                if(json.result) {
                    pictureDataList.fnDraw();
                }
            })    
        }
        
        function saveStatus(){
            $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/adminimage/setstatus'); ?><?php echo '\', {
                photoId: $(\'#trk_photo_idPhoto\').val(),
                status:  $(\'#trk_photo_status\').val()
            }, function(json) {
                if(json.result) {
                    pictureCrudObj.params.general.dialogObj.close("edit-dialog");
                    pictureDataList.fnDraw();
                }
            })    
        }
    </script>
'; ?>
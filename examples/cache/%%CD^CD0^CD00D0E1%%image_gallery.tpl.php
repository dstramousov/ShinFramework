<?php /* Smarty version 2.6.26, created on 2011-05-20 11:42:35
         compiled from image_gallery.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Image gallery example</legend>
            
            <div class="gallery">
            
                <div style="float: left; width: 35%;">
                    <fieldset>
                        <legend>Upload Quee</legend>
                        <div class="upload-action" id="upload-action"></div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Preview</legend>
                        <div class="preview" id="preview" style="position: relative; width:346px; height:256px;"></div>
                    </fieldset>
                </div>
                <div style="float: left; width: 60%;">
                    <fieldset>
                        <legend>Images Gallery</legend>
                        
                            <div class="gallery-list">
                                <div class="actions">
                                    <div id="fileUploader1"></div>
                                </div>
                        
                                <?php if (! empty ( $this->_tpl_vars['galleryList'] )): ?>
                                <ul>
                                    <?php $_from = $this->_tpl_vars['galleryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['galleryKey'] => $this->_tpl_vars['galleryItem']):
?>
                                        <li>
                                            <?php echo $this->_tpl_vars['galleryItem']; ?>
<br />
                                            <a href="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
/<?php echo $this->_tpl_vars['galleryKey']; ?>
" target="_blank" >Open</a> | 
                                            <a href="javascript:void(0);" onclick="deleteFile('<?php echo $this->_tpl_vars['galleryKey']; ?>
')" >Delete</a>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <div style="clear: both;"></div>
                                </ul>
                                <?php else: ?>
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                <?php endif; ?>
                                
                                <div class="actions">
                                    <div id="fileUploader2"></div>
                                </div>
                            </div>
                    </fieldset>
                </div>
            </div>
            
            <form method="post" id="action-form">
                <input type="hidden" name="action" value="delete" />
                <input type="hidden" name="file" value="" id="file" />
            </form>
                               
        </fieldset>
        
        <?php echo '
            <script type="text/javascript">
                function deleteFile(fileName){
                    if(confirm(\'Are you shure?\')) {
                        $(\'#file\').val(fileName);
                        $(\'#action-form\').submit();
                    }
                }
                
                function reloadWindow(){
                    window.location = \''; ?>
<?php echo base_url(); ?><?php echo '/image_gallery.php\';
                }
            </script>
        '; ?>

        
        <?php echo '
            <style type="text/css">
                .actions{
                    clear: both;
                    text-align: center;
                }
                
                .upload-action{
                    float: left;
                } 
                
                .gallery-list{
                    float: right;
                    width: 100%;
                }
                
                ul {
                    list-style-type: none;
                }
                
                li{
                    display: block;
                    float: left;
                    padding: 5px;
                    text-align: center;
                    width: 100px;
                    height: 100px;
                }
                
                .no-files{
                    text-align: center;
                }   
            </style>
        '; ?>
    
    </body>
</html>
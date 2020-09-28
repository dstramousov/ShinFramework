<?php /* Smarty version 2.6.26, created on 2011-05-20 11:44:17
         compiled from image_uploader.tpl */ ?>
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
            <legend style="font-size: 30px; font-weight: bold;">Image uploader example</legend>
            
            <fieldset>
                <legend>Lead</legend>
                 <fieldset class="left">
                        <legend>Upload Quee</legend>
                        <div class="lead-quee" id="lead-quee"></div>
                 </fieldset>
                 
                 <fieldset class="right">
                        <legend>Image Gallery (Load files with next textensions: *.gif, *.bmp)</legend>
                         <div class="lead-list">
                            <div class="lead-gallery-list">
                                <?php if (! empty ( $this->_tpl_vars['leadGalleryList'] )): ?>
                                <ul>
                                    <?php $_from = $this->_tpl_vars['leadGalleryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['galleryKey'] => $this->_tpl_vars['galleryItem']):
?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['leadDir']; ?>
<?php echo $this->_tpl_vars['galleryItem']; ?>
" rel="gallery-img[lead]"><img src="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['leadThumbsDir']; ?>
/<?php echo $this->_tpl_vars['galleryItem']; ?>
" /></a> <br />
                                            <a href="javascript:void(0);" onclick="deleteFile('lead', '<?php echo $this->_tpl_vars['galleryItem']; ?>
')" >Delete</a>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <div style="clear: both;"></div>
                                </ul>
                                <?php else: ?>
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                <?php endif; ?>
                            </div>
                            <div class="uploader">
                                <div class="lead-uploader" id="leadUploader"></div>
                            </div>
                         </div>
                 </fieldset>
            </fieldset>
            
            <fieldset>
                <legend>Estimation</legend>
                <fieldset class="left">
                        <legend>Upload Quee</legend>
                        <div class="estimation-quee" id="estimation-quee"></div>
                </fieldset>
                
                 <fieldset class="right">
                        <legend>Image Gallery (Load files with next textensions: *.jpg)</legend>
                        <div class="estimation-list">
                            <div class="estimation-gallery-list">
                                <?php if (! empty ( $this->_tpl_vars['estimationGalleryList'] )): ?>
                                <ul>
                                    <?php $_from = $this->_tpl_vars['estimationGalleryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['galleryKey'] => $this->_tpl_vars['galleryItem']):
?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['estimationDir']; ?>
<?php echo $this->_tpl_vars['galleryItem']; ?>
" rel="gallery-img[estimation]"><img src="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['estimationThumbsDir']; ?>
/<?php echo $this->_tpl_vars['galleryItem']; ?>
" /><a/> <br />
                                            <a href="javascript:void(0);" onclick="deleteFile('estimation', '<?php echo $this->_tpl_vars['galleryItem']; ?>
')" >Delete</a>
                                        </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <div style="clear: both;"></div>
                                </ul>
                                <?php else: ?>
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                <?php endif; ?>
                            </div>
                            <div class="uploader">
                                <div class="estimation-uploader" id="estimation-uploader"></div>
                            </div>
                        </div>
                 </fieldset>
            </fieldset>
            
            <fieldset>
                <legend>Product</legend>
                <fieldset class="left">
                    <legend>Upload Quee</legend>
                    <div class="product-quee left" id="product-quee"></div>
                </fieldset>
                
                <fieldset class="right">
                    <legend>Image Gallery (Load files with next textensions: *.png, *.jpg)</legend>
                    <div class="product-list">
                        <div class="product-gallery-list">
                            <?php if (! empty ( $this->_tpl_vars['productGalleryList'] )): ?>
                            <ul>
                                <?php $_from = $this->_tpl_vars['productGalleryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['galleryKey'] => $this->_tpl_vars['galleryItem']):
?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['productDir']; ?>
/<?php echo $this->_tpl_vars['galleryItem']; ?>
" rel="gallery-img[product]"><img src="<?php echo base_url(); ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
<?php echo $this->_tpl_vars['productThumbsDir']; ?>
/<?php echo $this->_tpl_vars['galleryItem']; ?>
" /><a/> <br />
                                        <a href="javascript:void(0);" onclick="deleteFile('product', '<?php echo $this->_tpl_vars['galleryItem']; ?>
')" >Delete</a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                                <div style="clear: both;"></div>
                            </ul>
                            <?php else: ?>
                             <div class="no-files">You are haven't any files. Please upload an image.</div>
                            <?php endif; ?>
                        </div>
                        <div class="uploader">
                            <div class="product-uploader" id="product-uploader"></div>
                        </div> 
                    </div>
                </fieldset>
            </fieldset>
        </fieldset>
        
        <form method="post" id="action-form">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="file" value="" id="file" />
            <input type="hidden" name="section" value="" id="section" />
        </form>
        
        <?php echo '
            <script type="text/javascript">
                function reloadWindow(){
                    window.location = \''; ?>
<?php echo base_url(); ?><?php echo '/image_uploader.php\';
                }
                
                function deleteFile(sectionName, fileName){
                    if(confirm(\'Are you shure?\')) {
                        $(\'#file\').val(fileName);
                        $(\'#section\').val(sectionName);
                        $(\'#action-form\').submit();
                    }
                }
            </script>
        '; ?>

        
        <?php echo '
            <style type="text/css">
                .left{
                    float: left;
                    width: 35%;
                }
                
                .right{
                    float: right;
                    width: 60%;
                }
                
                .lead-gallery-list, .estimation-gallery-list, .product-gallery-list {
                    text-align: center;
                }
                
                .uploader {
                    text-align: center;
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
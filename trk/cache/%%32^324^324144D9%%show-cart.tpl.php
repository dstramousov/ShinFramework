<?php /* Smarty version 2.6.26, created on 2011-06-27 15:09:58
         compiled from web/cart/show-cart.tpl */ ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                <?php echo $this->_tpl_vars['proomblock']; ?>
<?php echo $this->_tpl_vars['toprightblock']; ?>

                <div class="clear"></div>
            </div>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header_rand_photo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .header block -->
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/search-form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <!-- .search form -->
                
                <!-- cart list -->
                <div class="cart-list">
                    <table align="center">
                        <tr>
                            <td align="left" colspan="3">
                                <a href="<?php  echo base_url();  ?>/main"><?php echo $this->_tpl_vars['lng_label_nav_main_page']; ?>
</a> -> <?php echo $this->_tpl_vars['lng_label_show_cart']; ?>

                                <br /><br />
                            </td>
                        </tr>
                    <?php $_from = $this->_tpl_vars['cartList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
                        <tr id="imgblock_<?php echo $this->_tpl_vars['photo']['idPhoto']; ?>
">
                            <td width="20%">
                                <img src="<?php echo SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/' ?><?php echo $this->_tpl_vars['photo']['userId']; ?>
/<?php echo $this->_tpl_vars['photo']['folder']; ?>
<?php echo '/' . SHIN_Core::$_config['store']['thumbnails_prefix']; ?><?php echo $this->_tpl_vars['photo']['sysname']; ?>
" alt="" title="" />
                            </td>
                            <td width="70%"> 
                                <?php echo $this->_tpl_vars['photo']['description']; ?>

                            </td>
                            <td width="10%" align="center">
                                <a href="javascript:deleteFromCart(<?php echo $this->_tpl_vars['photo']['idPhoto']; ?>
);"><img src="<?php echo SHIN_Core::$_config['core']['app_base_url'] . '/images/delete.png'; ?>" alt="Delete fom the Cart" title="Dlete from the cart" /></a>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                        <tr>
                            <td colspan="3" align="center">
                                <form action="<?php echo base_url() ?>/cart/sendcart" method="post">
                                    <input type="submit" class="send-picture" name="send-pictures" value="Send picture order" id="send-pictures" />
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- cart list -->
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <!-- .footer block -->
        </div>
        <?php echo '
        <script type="text/javascript">
            function deleteFromCart(idPhoto) {
                $.getJSON('; ?>
'<?php  echo base_url();  ?>/cart/deletefromcart'<?php echo ', {
                    idPhoto: idPhoto
                }, function(json) {
                    if(json.result) {
                        // 1. remove image block
                        $(\'#imgblock_\' + idPhoto).remove();
                        
                        // 2. update total count
                        $(\'.total-cart-items\').text(json.count);    
                    }    
                })   
            } 
        </script> 
    '; ?>

    </body>
</html>
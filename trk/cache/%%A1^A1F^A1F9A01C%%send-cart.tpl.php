<?php /* Smarty version 2.6.26, created on 2011-06-27 15:13:36
         compiled from web/cart/send-cart.tpl */ ?>
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
                <!-- cart send seccessfully -->
                <div class="cart-sended">
                    <span class="form-header-red-text"><?php echo $this->_tpl_vars['lng_label_send_cart_header']; ?>
</span><br /><br />
                    <span class="form-header-title"><?php echo $this->_tpl_vars['lng_label_rsend_cart_title']; ?>
</span>
                    <br />
                    <br />
                    <table align="center" class="cart-table">
                        <tr>
                            <th><?php echo $this->_tpl_vars['lng_label_owner_name']; ?>
</th>
                            <td><?php echo $this->_tpl_vars['lng_label_ordered_pictures']; ?>
</td>
                        </tr>
                        <?php $_from = $this->_tpl_vars['alreadySended']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nickname'] => $this->_tpl_vars['result']):
?>
                        <tr>
                            <td style="border-right: 1px solid #999999;">
                                <?php echo $this->_tpl_vars['nickname']; ?>
    
                            </td>
                            <td>
                                <?php echo $this->_tpl_vars['orderedPictures'][$this->_tpl_vars['nickname']]; ?>

                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
                <!-- cart list seccessfully -->
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
    </body>
</html>
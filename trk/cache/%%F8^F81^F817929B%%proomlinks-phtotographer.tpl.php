<?php /* Smarty version 2.6.26, created on 2011-05-04 08:13:20
         compiled from web/proom/proomlinks-phtotographer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'web/proom/proomlinks-phtotographer.tpl', 5, false),)), $this); ?>
<a href="<?php  echo base_url().'/logout';  ?>" class="logout-btn right"></a>
<a href="<?php  echo base_url().'/proom';  ?>" class="privat-room-btn right"></a>

<div class="cart left" style="<?php if (empty ( $this->_tpl_vars['cart'] )): ?>display:none;<?php endif; ?>">
    <?php echo $this->_tpl_vars['lng_label_you_have']; ?>
 <span class="total-cart-items"><?php if (empty ( $this->_tpl_vars['cart'] )): ?>0<?php else: ?><?php echo count($this->_tpl_vars['cart']); ?>
<?php endif; ?></span> <?php echo $this->_tpl_vars['lng_label_items_cart']; ?>
&nbsp; &nbsp;|&nbsp; &nbsp;
    <input type="submit" class="send-picture" name="send-picture-order" id="send-picture-order" value="Send picture order" onclick="window.location='<?php  echo base_url() . '/cart/showcart';  ?>'" />
</div>
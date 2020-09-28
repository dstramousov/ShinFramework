<?php /* Smarty version 2.6.26, created on 2011-05-03 10:23:22
         compiled from web/photographer/search-photo.tpl */ ?>
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
                <div class="search-list">
                    <div class="search-text"><?php echo $this->_tpl_vars['lng_label_search_text']; ?>
</div>
                    <!-- crumbs -->
                    <div class="bread-crumbs">
                        <a href="<?php  echo base_url();  ?>/main"><?php echo $this->_tpl_vars['lng_label_nav_main_page']; ?>
</a> -> <?php echo $this->_tpl_vars['lng_label_nav_search_page']; ?>
&nbsp;<?php echo $this->_tpl_vars['total_search_count']; ?>
&nbsp;<?php echo $this->_tpl_vars['lng_label_total_search_count']; ?>

                    </div>
                    <!-- crumbs -->
                    <!-- navigation box -->
                    <div class="page-navigation"><?php echo $this->_tpl_vars['nav_str_up']; ?>
</div>
                    <div class="clear"></div>
                    <!-- navigation box -->
                    <!--<div <!--style="z-index:-9;">-->
                    <div>
                    <?php if (! empty ( $this->_tpl_vars['trk_photo_idPhoto'] )): ?>
                        <ul>
                            <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['trk_photo_idPhoto']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
                               <li>
                                 <a href="<?php echo base_url().'/showphoto?photo='; ?><?php echo $this->_tpl_vars['trk_photo_sysname'][$this->_sections['id']['index']]; ?>
"><img src="<?php echo $this->_tpl_vars['trk_gallery_photo'][$this->_sections['id']['index']]; ?>
" /></a>
                               </li>
                            <?php endfor; endif; ?>
                    </ul>
                    <?php else: ?>
                        <div class="empty-search"><div><?php echo $this->_tpl_vars['lng_label_search_empty']; ?>
</div></div>
                    <?php endif; ?>
                    </div>
                    <!-- navigation box -->
                    <div class="page-navigation"><?php echo $this->_tpl_vars['nav_str_down']; ?>
</div>
                    <!-- navigation box -->
                    <div class="clear"></div>
                    
                </div>
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
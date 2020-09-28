<?php /* Smarty version 2.6.26, created on 2011-05-03 09:33:25
         compiled from web/index.tpl */ ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php echo '
        <script type="text/javascript">
            $(document).ready(function(){
            	var docMode = document.documentMode;
            	if(docMode == 7){alert("'; ?>
<?php echo $this->_tpl_vars['lng_label_compatibilitymode']; ?>
<?php echo '");}
            })    
        </script>    
        '; ?>


        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                <?php echo $this->_tpl_vars['proomblock']; ?>
<?php echo $this->_tpl_vars['toprightblock']; ?>

                <div class="clear"></div>
            </div>
            <div class="b-header">
                <div class="b-logo">
                    <a onfocus="blur();" href="<?php  echo base_url(); ?>"><img src="<?php  echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/site/Logone.png" alt="" title="" /></a>
                </div>
            </div>
            <!-- .header block -->
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/common/search-form.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
                <!-- .search form -->
                	
                	<img src="<?php echo SHIN_Core::$_config['core']['app_base_url'] ?>/mainphoto/image001.jpg" alt="" title="" />
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
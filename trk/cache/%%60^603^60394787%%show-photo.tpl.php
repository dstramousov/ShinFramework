<?php /* Smarty version 2.6.26, created on 2011-05-04 10:52:38
         compiled from web/photographer/show-photo.tpl */ ?>
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
                
                <div class="show-photo">
                    <!-- crumbs -->
                    <div class="bread-crumbs">
                        <a href="<?php  echo base_url();  ?>/main"><?php echo $this->_tpl_vars['lng_label_nav_main_page']; ?>
</a> -> <a href="<?php  echo base_url();  ?>/search?<?php if (! empty ( $this->_tpl_vars['currentPage'] )): ?>cur_page=<?php echo $this->_tpl_vars['currentPage']; ?>
<?php endif; ?>&<?php if (! empty ( $this->_tpl_vars['perPage'] )): ?>per_page=<?php echo $this->_tpl_vars['perPage']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['lng_label_nav_search_page']; ?>
</a> -> <?php echo $this->_tpl_vars['imgName']; ?>

                    </div>
                    <div class="clear"></div>
                    <!-- crumbs -->
                    <div class="photo-information">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'web/photographer/photo-info.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div class="search-photos">
                        <?php if (! empty ( $this->_tpl_vars['trk_photo_idPhoto'] )): ?>
                        <table align="center" class="image-gallery-list">
                            <tr>
                                <td valign="middle" class="b-left-arrow">
                                    <a href="javascript:loadImages('left');"><img src="<?php echo SHIN_Core::$_config['core']['app_base_url'] . '/images/arrow_left.png'; ?>" alt="Left" title="Left" id="left-arrow"/></a>
                                </td>
                                <td>
                                    <div id="six-img-list" class="all-photos-list"></div>
                                </td>
                                <td valign="middle" class="b-right-arrow">
                                    <a href="javascript:loadImages('right');"><img src="<?php echo SHIN_Core::$_config['core']['app_base_url'] . '/images/arrow_right.png'; ?>" alt="Right" title="Right" id="right-arrow" /></a>
                                </td>
                            </tr>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="clear"></div>
                
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
        
            $(\'#six-img-list img\').live(\'click\', function(){
                // 1. remove active class
                $(\'#six-img-list img\').removeClass(\'active-photo\');
                
                // 2. add active class to current img
                $(this).addClass(\'active-photo\');
                
                // 3. load photo
                $(\'.preview-photo-information\').load(\''; ?>
<?php  echo base_url();  ?>/photoinfo<?php echo '\', {
                    idPhoto: $(this).attr(\'id\')
                })
            })
            
            
            function loadPhotoInfo(idPhoto){
                $(\'.photo-information\').load('; ?>
'<?php  echo base_url();  ?>/photoinfo'<?php echo ', {
                    idPhoto: idPhoto    
                })    
            }
        
            function downloadPhoto(photoid){
                $.getJSON(\''; ?>
<?php echo prep_url(base_url().'/download'); ?><?php echo '\', {
                    photoid: photoid
                })
            }

            function loadImages(direction, mode){
            
                if(mode == \'first\') {
                    var firstId = '; ?>
<?php echo $this->_tpl_vars['photoData']['idPhoto']; ?>
<?php echo ';
                    var lastId = null, direction  = null; 
                } else {
                    var firstId = $(\'.photo-list:first\').attr(\'id\');
                    var lastId  = $(\'.photo-list:last\').attr(\'id\');    
                }
                
                // 2. send request
                $.getJSON('; ?>
'<?php  echo base_url();  ?>/getimages'<?php echo ', {
                    direction: direction,
                    firstId:    firstId,
                    lastId:     lastId  
                }, function(json) {
                    $(\'#six-img-list\').empty();
                    for(index in json.list) {
                        $(\'#six-img-list\').append(\'<img src="\' + json.list[index].imgSrc  + \'" title="\' + json.list[index].title  + \'" id="\' + json.list[index].idPhoto + \'" class="photo-list" onclick="loadPhotoInfo(\' + json.list[index].idPhoto + \');" />\')
                    }
                    $("#six-img-list").jqDock(\'destroy\');
                    $("#six-img-list").jqDock({active:-1, align:"bottom", coefficient:1.5, distance:72, duration:300, fadeIn:0, fadeLayer:"", flow:false, idle:0, inactivity:0, labels:false, loader:"", noBuffer:false, onReady:"", onSleep:"", onWake:"", setLabel:"", size:48, source:"", step:50});    
                
                    if(json.isLeft) {
                        $(\'#left-arrow\').hide();
                    } else {
                        $(\'#left-arrow\').show();
                    }
                    
                    if(json.isRight) {
                        $(\'#right-arrow\').hide();
                    } else {
                        $(\'#right-arrow\').show();    
                    }
                })        
            }
            
            function addToCart(idPhoto, target){
                // 2. send request
                $.getJSON('; ?>
'<?php  echo base_url();  ?>/cart/addtocart'<?php echo ', {  
                    idPhoto: idPhoto
                }, function(json) {
                    if(json.result) {
                        // show div with cart information
                        if($(\'.cart\').css(\'display\') == \'none\') {
                            $(\'.cart\').show();
                        }
                        // update total count
                        $(\'.total-cart-items\').text(json.count);
                        // disable button
                        $(target).hide();
                    }    
                })
            }
        </script> 
        '; ?>


        <?php echo '
        <script type="text/javascript">
            $(document).ready(function(){
                loadImages(\'right\', \'first\');    
            })    
        </script>    
        '; ?>
  
    </body>
</html>
<?php /* Smarty version 2.6.26, created on 2011-03-09 09:50:28
         compiled from lightbox.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>
    
    <?php echo '
    <style type="text/css">
        ul{
            list-style-type: none;
        }
        
        ul li{
            float: left;    
        }
        
    </style>
    '; ?>

    <div>
    <ul class="gallery clearfix">
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/1.jpg" rel="prettyPhoto[gallery1]" title="You can add caption to pictures. You can add caption to pictures. You can add caption to pictures."><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_1.jpg" width="60" height="60" alt="Red round shape" /></a></li>
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/2.jpg" rel="prettyPhoto[gallery1]"><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_2.jpg" width="60" height="60" alt="Nice building" /></a></li>
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/3.jpg" rel="prettyPhoto[gallery1]"><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_3.jpg" width="60" height="60" alt="Fire!" /></a></li>
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/4.jpg" rel="prettyPhoto[gallery1]"><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_4.jpg" width="60" height="60" alt="Rock climbing" /></a></li>
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/5.jpg" rel="prettyPhoto[gallery1]"><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_5.jpg" width="60" height="60" alt="Fly kite, fly!" /></a></li>
        <div style="clear:both"></div>
    </ul>
    </div>
    <br />
    <div>
    <h4>Flash</h4>
    <ul>
        <li><a href="http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&amp;height=294" rel="prettyPhoto[flash]" title="Flash 10 demo"><img src="http://images.apple.com/trailers/wb/images/terminatorsalvation_200903131052.jpg" alt="Flash 10 demo" /></a></li>
        <li><a href="http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&amp;height=294" rel="prettyPhoto[flash]" title="Flash 10 demo"><img src="http://images.apple.com/trailers/wb/images/terminatorsalvation_200903131052.jpg" alt="Flash 10 demo" /></a></li>
        <div style="clear:both"></div>
    </ul>
	</div>
    
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div>
    <h4>Mixed gallery</h4>
    <ul>
        <li> <a href="http://www.google.ca?iframe=true&amp;width=1000&amp;height=500" rel="prettyPhoto[mixed]">Google.ca</a> </li>
        <li><a href="http://movies.apple.com/movies/sony_pictures/angelsanddemons/angelsanddemons-video_h.480.mov?width=480&amp;height=260" rel="prettyPhoto[mixed]" title="Angels &amp; Demons sdg sdag sdagsdag sadg sadg sda gasg sdg asdgsdag sadgsdagsadg sdag sdgasdgsda"><img src="http://images.apple.com/trailers/sony_pictures/images/angelsdemons_200903261218.jpg" alt="Angels &amp; Demons" /></a></li>
        <li><a href="<?php echo prep_url(base_url()); ?>/uploads/lightbox/fullscreen/5.jpg" rel="prettyPhoto[mixed]"><img src="<?php echo prep_url(base_url()); ?>/uploads/lightbox/thumbnails/t_5.jpg" width="60" height="60" alt="" /></a></li>
        <li><a href="http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&amp;height=294" rel="prettyPhoto[mixed]" title="Flash 10 demo"><img src="http://images.apple.com/trailers/wb/images/terminatorsalvation_200903131052.jpg" alt="Flash 10 demo" /></a></li>
        <div style="clear:both"></div>
    </ul>
	</div>
</body>

</html>
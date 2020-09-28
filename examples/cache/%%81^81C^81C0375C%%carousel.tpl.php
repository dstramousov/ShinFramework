<?php /* Smarty version 2.6.26, created on 2011-05-10 14:17:44
         compiled from carousel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

    <fieldset>
        <legend>Basic Carousel</legend>
        <!-- This is the container for the carousel. -->
        <div id="carousel1" style="width:700px; height:500px; background:#000;overflow:scroll;">            
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/382px-Leonardo_self.jpg" rel='lightbox' title="Leonardo Da Vinci">
                <img class="cloudcarousel" src="<?php  echo prep_url(base_url()); ?>/uploads/carousel/test9.png" width="128" height="164" alt="Self-portrait in red chalk, circa 1512-1515." title="Leonardo Da Vinci" />
            </a>  
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/396px-Mona_Lisa.jpg" rel='lightbox' title="Mona Lisa">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test1.png" width="128" height="164" alt="Oil on cotton wood, circa 1503–1505." title="Mona Lisa" />
            </a>
            <a href='<?php echo prep_url(base_url()); ?>/uploads/carousel/439px-The_Lady_with_an_Ermine.jpg' rel='lightbox' title="Lady with an Ermine">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test2.png" width="128" height="164" alt="Oil on wood panel, 1485." title="Lady with an Ermine" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/Madonna_of_the_Yarnwinder.jpg" rel="lightbox" title="Madonna of the Yarnwinder">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test3.png" width="128" height="164" alt="Oil on canvas, circa 1501." title="Madonna of the Yarnwinder" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/390px-Bacchus_painting.jpg" rel="lightbox" title="Bacchus">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test5.png" width="128" height="164" alt="Oil on walnut panel transferred to canvas, circa 1510–1515." title="Bacchus" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/452px-Madonna_of_the_carnation_EUR.jpg" rel="lightbox" title="Madonna of the Carnation" >
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test6.png" width="128" height="164" alt="Oil on panel, circa 1478–1480." title="Madonna of the Carnation" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/454px-Leonardo_-_St._Anne_cartoon-alternative-downsampled.jpg" rel="lightbox" title="The Virgin and Child with St. Anne and St. John the Baptist">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test7.png" width="128" height="164" alt="Charcoal, black and white chalk on tinted paper, circa 1499–1500." title="The Virgin and Child with St. Anne and St. John the Baptist" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/FileLeonardo-da-Vinci-020.jpg" rel="lightbox" title="The Virgin and Child with St. Anne">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test8.png" width="128" height="164" alt="Oil on panel, circa 1510." title="The Virgin and Child with St. Anne" />
            </a>
          
         
        </div>
        
        <!-- Define left and right buttons. -->
        <input id="left-but"  type="button" value="Left" />
        <input id="right-but" type="button" value="Right" />
        
        <!-- Define elements to accept the alt and title text from the images. -->
        <p id="title-text"></p>
        <p id="alt-text"></p>
    </fieldset>
    
    <br />
    
    <fieldset>
        <legend>Carousel with auto-rotation</legend>
         <!-- This is the container for the carousel. -->
        <div id="carousel2" style="width:700px; height:500px; background:#000;overflow:scroll;">            
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/382px-Leonardo_self.jpg" rel='lightbox' title="Leonardo Da Vinci">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test9.png" width="128" height="164" alt="Self-portrait in red chalk, circa 1512-1515." title="Leonardo Da Vinci" />
            </a>  
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/396px-Mona_Lisa.jpg" rel='lightbox' title="Mona Lisa">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test1.png" width="128" height="164" alt="Oil on cotton wood, circa 1503–1505." title="Mona Lisa" />
            </a>
            <a href='<?php echo prep_url(base_url()); ?>/uploads/carousel/439px-The_Lady_with_an_Ermine.jpg' rel='lightbox' title="Lady with an Ermine">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test2.png" width="128" height="164" alt="Oil on wood panel, 1485." title="Lady with an Ermine" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/Madonna_of_the_Yarnwinder.jpg" rel="lightbox" title="Madonna of the Yarnwinder">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test3.png" width="128" height="164" alt="Oil on canvas, circa 1501." title="Madonna of the Yarnwinder" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/390px-Bacchus_painting.jpg" rel="lightbox" title="Bacchus">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test5.png" width="128" height="164" alt="Oil on walnut panel transferred to canvas, circa 1510–1515." title="Bacchus" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/452px-Madonna_of_the_carnation_EUR.jpg" rel="lightbox" title="Madonna of the Carnation" >
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test6.png" width="128" height="164" alt="Oil on panel, circa 1478–1480." title="Madonna of the Carnation" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/454px-Leonardo_-_St._Anne_cartoon-alternative-downsampled.jpg" rel="lightbox" title="The Virgin and Child with St. Anne and St. John the Baptist">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test7.png" width="128" height="164" alt="Charcoal, black and white chalk on tinted paper, circa 1499–1500." title="The Virgin and Child with St. Anne and St. John the Baptist" />
            </a>
            <a href="<?php echo prep_url(base_url()); ?>/uploads/carousel/FileLeonardo-da-Vinci-020.jpg" rel="lightbox" title="The Virgin and Child with St. Anne">
                <img class="cloudcarousel" src="<?php echo prep_url(base_url()); ?>/uploads/carousel/test8.png" width="128" height="164" alt="Oil on panel, circa 1510." title="The Virgin and Child with St. Anne" />
            </a>
          
         
        </div>
        
        <!-- Define left and right buttons. -->
        <input id="left-but2"  type="button" value="Left" />
        <input id="right-but2" type="button" value="Right" />
        
        <!-- Define elements to accept the alt and title text from the images. -->
        <p id="title-text2"></p>
        <p id="alt-text2"></p>
    </fieldset>

    
</body>

</html>
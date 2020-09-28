        {include file="web/header.tpl"}
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                {$proomblock}{$toprightblock}
                <div class="clear"></div>
            </div>
			{include file="web/header_rand_photo.tpl"}
            <!-- .header block -->
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    {include file="web/common/search-form.tpl"}
                </div>
                
                <div class="show-photo">
                    <!-- crumbs -->
                    <div class="bread-crumbs">
                        <a href="{php} echo base_url(); {/php}/main">{$lng_label_nav_main_page}</a> -> <a href="{php} echo base_url(); {/php}/search?{if !empty($currentPage)}cur_page={$currentPage}{/if}&{if !empty($perPage)}per_page={$perPage}{/if}">{$lng_label_nav_search_page}</a> -> {$imgName}
                    </div>
                    <div class="clear"></div>
                    <!-- crumbs -->
                    <div class="photo-information">
                        {include file='web/photographer/photo-info.tpl'}
                    </div>
                    <div class="search-photos">
                        {if !empty($trk_photo_idPhoto)}
                        <table align="center" class="image-gallery-list">
                            <tr>
                                <td valign="middle" class="b-left-arrow">
                                    <a href="javascript:loadImages('left');"><img src="{php}echo SHIN_Core::$_config['core']['app_base_url'] . '/images/arrow_left.png';{/php}" alt="Left" title="Left" id="left-arrow"/></a>
                                </td>
                                <td>
                                    <div id="six-img-list" class="all-photos-list"></div>
                                </td>
                                <td valign="middle" class="b-right-arrow">
                                    <a href="javascript:loadImages('right');"><img src="{php}echo SHIN_Core::$_config['core']['app_base_url'] . '/images/arrow_right.png';{/php}" alt="Right" title="Right" id="right-arrow" /></a>
                                </td>
                            </tr>
                        </table>
                        {/if}
                    </div>
                </div>
                
                <div class="clear"></div>
                
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
        {literal}
        <script type="text/javascript">
        
            $('#six-img-list img').live('click', function(){
                // 1. remove active class
                $('#six-img-list img').removeClass('active-photo');
                
                // 2. add active class to current img
                $(this).addClass('active-photo');
                
                // 3. load photo
                $('.preview-photo-information').load('{/literal}{php} echo base_url(); {/php}/photoinfo{literal}', {
                    idPhoto: $(this).attr('id')
                })
            })
            
            
            function loadPhotoInfo(idPhoto){
                $('.photo-information').load({/literal}'{php} echo base_url(); {/php}/photoinfo'{literal}, {
                    idPhoto: idPhoto    
                })    
            }
        
            function downloadPhoto(photoid){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/download');{/php}{literal}', {
                    photoid: photoid
                })
            }

            function loadImages(direction, mode){
            
                if(mode == 'first') {
                    var firstId = {/literal}{$photoData.idPhoto}{literal};
                    var lastId = null, direction  = null; 
                } else {
                    var firstId = $('.photo-list:first').attr('id');
                    var lastId  = $('.photo-list:last').attr('id');    
                }
                
                // 2. send request
                $.getJSON({/literal}'{php} echo base_url(); {/php}/getimages'{literal}, {
                    direction: direction,
                    firstId:    firstId,
                    lastId:     lastId  
                }, function(json) {
                    $('#six-img-list').empty();
                    for(index in json.list) {
                        $('#six-img-list').append('<img src="' + json.list[index].imgSrc  + '" title="' + json.list[index].title  + '" id="' + json.list[index].idPhoto + '" class="photo-list" onclick="loadPhotoInfo(' + json.list[index].idPhoto + ');" />')
                    }
                    $("#six-img-list").jqDock('destroy');
                    $("#six-img-list").jqDock({active:-1, align:"bottom", coefficient:1.5, distance:72, duration:300, fadeIn:0, fadeLayer:"", flow:false, idle:0, inactivity:0, labels:false, loader:"", noBuffer:false, onReady:"", onSleep:"", onWake:"", setLabel:"", size:48, source:"", step:50});    
                
                    if(json.isLeft) {
                        $('#left-arrow').hide();
                    } else {
                        $('#left-arrow').show();
                    }
                    
                    if(json.isRight) {
                        $('#right-arrow').hide();
                    } else {
                        $('#right-arrow').show();    
                    }
                })        
            }
            
            function addToCart(idPhoto, target){
                // 2. send request
                $.getJSON({/literal}'{php} echo base_url(); {/php}/cart/addtocart'{literal}, {  
                    idPhoto: idPhoto
                }, function(json) {
                    if(json.result) {
                        // show div with cart information
                        if($('.cart').css('display') == 'none') {
                            $('.cart').show();
                        }
                        // update total count
                        $('.total-cart-items').text(json.count);
                        // disable button
                        $(target).hide();
                    }    
                })
            }
        </script> 
        {/literal}

        {literal}
        <script type="text/javascript">
            $(document).ready(function(){
                loadImages('right', 'first');    
            })    
        </script>    
        {/literal}  
    </body>
</html>

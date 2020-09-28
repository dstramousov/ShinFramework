{include file="header.tpl"}
    
    <body id="page">

	{include file="back_url.tpl"}

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
                                {if !empty($leadGalleryList)}
                                <ul>
                                    {foreach from=$leadGalleryList item=galleryItem key=galleryKey}
                                        <li>
                                            <a href="{php}echo base_url();{/php}/{$baseDir}{$leadDir}{$galleryItem}" rel="gallery-img[lead]"><img src="{php}echo base_url();{/php}/{$baseDir}{$leadThumbsDir}/{$galleryItem}" /></a> <br />
                                            <a href="javascript:void(0);" onclick="deleteFile('lead', '{$galleryItem}')" >Delete</a>
                                        </li>
                                    {/foreach}
                                    <div style="clear: both;"></div>
                                </ul>
                                {else}
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                {/if}
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
                                {if !empty($estimationGalleryList)}
                                <ul>
                                    {foreach from=$estimationGalleryList item=galleryItem key=galleryKey}
                                        <li>
                                            <a href="{php}echo base_url();{/php}/{$baseDir}{$estimationDir}{$galleryItem}" rel="gallery-img[estimation]"><img src="{php}echo base_url();{/php}/{$baseDir}{$estimationThumbsDir}/{$galleryItem}" /><a/> <br />
                                            <a href="javascript:void(0);" onclick="deleteFile('estimation', '{$galleryItem}')" >Delete</a>
                                        </li>
                                    {/foreach}
                                    <div style="clear: both;"></div>
                                </ul>
                                {else}
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                {/if}
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
                            {if !empty($productGalleryList)}
                            <ul>
                                {foreach from=$productGalleryList item=galleryItem key=galleryKey}
                                    <li>
                                        <a href="{php}echo base_url();{/php}/{$baseDir}{$productDir}/{$galleryItem}" rel="gallery-img[product]"><img src="{php}echo base_url();{/php}/{$baseDir}{$productThumbsDir}/{$galleryItem}" /><a/> <br />
                                        <a href="javascript:void(0);" onclick="deleteFile('product', '{$galleryItem}')" >Delete</a>
                                    </li>
                                {/foreach}
                                <div style="clear: both;"></div>
                            </ul>
                            {else}
                             <div class="no-files">You are haven't any files. Please upload an image.</div>
                            {/if}
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
        
        {literal}
            <script type="text/javascript">
                function reloadWindow(){
                    window.location = '{/literal}{php}echo base_url();{/php}{literal}/image_uploader.php';
                }
                
                function deleteFile(sectionName, fileName){
                    if(confirm('Are you shure?')) {
                        $('#file').val(fileName);
                        $('#section').val(sectionName);
                        $('#action-form').submit();
                    }
                }
            </script>
        {/literal}
        
        {literal}
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
        {/literal}
     </body>
</html>
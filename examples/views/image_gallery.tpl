{include file="header.tpl"}
    
    <body id="page">

	{include file="back_url.tpl"}

        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Image gallery example</legend>
            
            <div class="gallery">
            
                <div style="float: left; width: 35%;">
                    <fieldset>
                        <legend>Upload Quee</legend>
                        <div class="upload-action" id="upload-action"></div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Preview</legend>
                        <div class="preview" id="preview" style="position: relative; width:346px; height:256px;"></div>
                    </fieldset>
                </div>
                <div style="float: left; width: 60%;">
                    <fieldset>
                        <legend>Images Gallery</legend>
                        
                            <div class="gallery-list">
                                <div class="actions">
                                    <div id="fileUploader1"></div>
                                </div>
                        
                                {if !empty($galleryList)}
                                <ul>
                                    {foreach from=$galleryList item=galleryItem key=galleryKey}
                                        <li>
                                            {$galleryItem}<br />
                                            <a href="{php}echo base_url();{/php}/{$baseDir}/{$galleryKey}" target="_blank" >Open</a> | 
                                            <a href="javascript:void(0);" onclick="deleteFile('{$galleryKey}')" >Delete</a>
                                        </li>
                                    {/foreach}
                                    <div style="clear: both;"></div>
                                </ul>
                                {else}
                                 <div class="no-files">You are haven't any files. Please upload an image.</div>
                                {/if}
                                
                                <div class="actions">
                                    <div id="fileUploader2"></div>
                                </div>
                            </div>
                    </fieldset>
                </div>
            </div>
            
            <form method="post" id="action-form">
                <input type="hidden" name="action" value="delete" />
                <input type="hidden" name="file" value="" id="file" />
            </form>
                               
        </fieldset>
        
        {literal}
            <script type="text/javascript">
                function deleteFile(fileName){
                    if(confirm('Are you shure?')) {
                        $('#file').val(fileName);
                        $('#action-form').submit();
                    }
                }
                
                function reloadWindow(){
                    window.location = '{/literal}{php}echo base_url();{/php}{literal}/image_gallery.php';
                }
            </script>
        {/literal}
        
        {literal}
            <style type="text/css">
                .actions{
                    clear: both;
                    text-align: center;
                }
                
                .upload-action{
                    float: left;
                } 
                
                .gallery-list{
                    float: right;
                    width: 100%;
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
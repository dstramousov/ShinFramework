<?php /* Smarty version 2.6.26, created on 2011-03-07 12:46:33
         compiled from web/index2.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/fr_header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <a href="<?php  echo prep_url(shinfw_base_url().'/main');  ?>">Back to Main page</a>
    <br><br>

    <table width="778" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
        <tr>
            <td valign="top" background="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/back.jpg">
                <table width="778" height="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="20">&nbsp;</td>
                        <td width="470" valign="top">
                            <table width="470" height="100%" border="0" cellpadding="0" cellspacing="0" class="partners-table">
                                <tr>
                                    <td height="36">
                                        <table width="470" height="36" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="36"><img src="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/icon.jpg" width="36" height="36" alt="" /></td>
                                                <td><font size="3" face="Arial, Helvetica, sans-serif" color="#163C47"><strong>Our partners</strong></font></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                          <td width="288" valign="top">
                            <table width="288" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="47" valign="bottom" background="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/leftop.jpg" style="background-repeat: no-repeat;">
                                        <div align="right">
                                            <table width="225" height="37" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="left">
                                                        <font color="#163C47" size="3" face="Arial, Helvetica, sans-serif"><strong>Our news</strong></font>
                                                    </td>
                                                </tr>                     
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="news-table" valign="top">
                                    
                                    </td>
                                </tr>
                            </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="98" valign="bottom" background="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/down.jpg">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/fr_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
</table>


<!-- line delimiter begin -->
<div style="display: none;" id="partner-block">
    <tr>
        <td height="15">
            <img src="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/line1.jpg" width="451" height="3" style="margin-left:3px;" alt="" />
        </td>
    </tr>
    <!-- line delimiter end -->
    <!-- one partner block begin -->
    <tr>
        <td height="120" valign="top">
            <div align="justify">
                <table width="460" height="120" border="0" cellpadding="0" cellspacing="0" id="partner-id">
                      <tr>
                        <td valign="middle">
                            <div align="justify">
                                <!-- name -->
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                    <b id="partner-name"></b>
                                </font>
                                <!-- end name-->
                                <br/>
                                <!-- type -->
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                    <i id="partner-type"></i>
                                </font>
                                <!-- type name-->
                                <br/>
                                <!-- link -->
                                <font color="#666666" size="1" face="Arial, Helvetica, sans-serif" id="partner-link"></font>
                                <br/>
                                <br/>
                                <!-- end link -->
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                    <font color="#000000" id="partner-description"></font>
                                </font>
                            </div>
                        </td>
                        <img src="" alt="" title="" id="partner-img" />
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</div>
<!-- one partner block end -->

<div style="display: none;" id="news-block">
    <!-- begin of news block -->
    <tr>
        <td valign="top">
            <div align="justify">
            <table width="271" height="100%" border="0" cellpadding="0" cellspacing="10" id="news-id">
                <tr>
                    <td valign="top">
                        <div align="center">
                            <p align="justify">
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                    <b id="news-title"></b>
                                </font>
                                <br/>
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif" id="new-body-long"></font>
                                <br/>
                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif" id="news-link"></font>
                                <br/>
                                <img src="" alt="" title="" id="news-img" />
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
    <tr>
        <td height="3">
            <img src="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/line2.jpg" width="230" height="3" hspace="3" style="margin-left:26px;" alt="">
        </td>
    </tr>
    <!-- end of news block -->
</div>


<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
        
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/getpartners'); ?><?php echo '\',
                dataType:   \'jsonp\',
                data:       {count: 3},
                success:    function(json){
                    var partnersHeader = $(\'.partners-table\').html();
                                         $(\'.partners-table\').empty();
                    for(index in json.data) {
                      
                        $(\'#partner-block #partner-id\').attr(\'onclick\', \'itemClick("partner", \' + json.data[index].idPartner + \')\')
                        $(\'#partner-block #partner-name\').text(json.data[index].name); 
                        $(\'#partner-block #partner-type\').text(json.data[index].partnerType); 
                        $(\'#partner-block #partner-link\').text(json.data[index].link); 
                        $(\'#partner-block #partner-description\').text(json.data[index].description);
                        $(\'#partner-block #partner-img\').attr(\'src\', json.data[index].thumb);
                        $(\'.partners-table\').append($(\'#partner-block\').clone().html());
                    }
                    
                    $(\'.partners-table\').prepend(partnersHeader);    
                }        
            })
            
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/getnews'); ?><?php echo '\',
                dataType:   \'jsonp\',
                data:       {count: 4, type: \'news\'},
                success:    function(json){
                    var newsHeader = $(\'.news-table\').html();
                                     $(\'.news-table\').empty();
                    for(index in json.data) {
                        $(\'#news-block #news-id\').attr(\'onclick\', \'itemClick("news", \' + json.data[index].idNews + \')\')
                        $(\'#news-block #news-title\').text(json.data[index].title); 
                        $(\'#news-block #new-body-long\').text(json.data[index].bodyLong); 
                        $(\'#news-block #news-link\').text(json.data[index].link); 
                        $(\'#news-block #news-img\').attr(\'src\', json.data[index].thumb);
                        $(\'.news-table\').append($(\'#news-block\').clone().html());
                    }
                    
                    $(\'.news-table\').prepend(newsHeader);    
                }    
            })
        })
        
        function itemClick(type, itemId){
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/webapi-json/click'); ?><?php echo '\',
                data:       {type: type, id: itemId},
                dataType:   \'jsonp\'        
            })
        }
    </script>
'; ?>


</body>
</html>
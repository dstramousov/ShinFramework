<?php /* Smarty version 2.6.26, created on 2011-03-07 12:46:27
         compiled from web/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "web/fr_header.tpl", 'smarty_include_vars' => array()));
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
                            <table width="470" height="100%" border="0" cellpadding="0" cellspacing="0" id="partners-list">
                                
                            </table>
                        </td>
                          <td width="288" valign="top">
                            <table width="288" height="100%" border="0" cellpadding="0" cellspacing="0" id="news-list"> 
                            
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
<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/webapi-html/getpartners'); ?><?php echo '\',
                data:       {count: 3},
                dataType:   \'jsonp\',
                success:    function(json){
                    $(\'#partners-list\').append(json.data);    
                }        
            })
            
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/webapi-html/getnews'); ?><?php echo '\',
                data:       {count: 4, type: \'news\'},
                dataType:   \'jsonp\',
                success:    function(json){
                    $(\'#news-list\').append(json.data);    
                }    
            })
        })
        
        function itemClick(type, itemId){
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url() . '/webapi-html/click'); ?><?php echo '\',
                data:       {type: type, id: itemId},
                dataType:   \'jsonp\'        
            })
        }
    </script>
'; ?>


</body>
</html>
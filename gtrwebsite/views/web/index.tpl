{include file="web/fr_header.tpl"}
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <a href="{php} echo prep_url(shinfw_base_url().'/main'); {/php}">Back to Main page</a>
    <br><br>
    <table width="778" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="white">
        <tr>
            <td valign="top" background="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/images/web/back.jpg">
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
        <td height="98" valign="bottom" background="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/images/web/down.jpg">
            {include file="web/fr_footer.tpl"}
        </td>
    </tr>
</table>
{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url:        '{/literal}{php}echo prep_url(base_url() . '/webapi-html/getpartners');{/php}{literal}',
                data:       {count: 3},
                dataType:   'jsonp',
                success:    function(json){
                    $('#partners-list').append(json.data);    
                }        
            })
            
            $.ajax({
                url:        '{/literal}{php}echo prep_url(base_url() . '/webapi-html/getnews');{/php}{literal}',
                data:       {count: 4, type: 'news'},
                dataType:   'jsonp',
                success:    function(json){
                    $('#news-list').append(json.data);    
                }    
            })
        })
        
        function itemClick(type, itemId){
            $.ajax({
                url:        '{/literal}{php}echo prep_url(base_url() . '/webapi-html/click');{/php}{literal}',
                data:       {type: type, id: itemId},
                dataType:   'jsonp'        
            })
        }
    </script>
{/literal}

</body>
</html>

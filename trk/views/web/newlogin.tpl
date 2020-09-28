<a class="login-btn right" onclick="showLoginForm();"></a>
<a href="{php} echo base_url().'/joinus'; {/php}" class="registrati-btn right"></a>
<!-- login form -->
<form action="{php} echo base_url().'/trylogin'; {/php}" method="post" id="login-form"></form>
<div class="login-form">
    <table class="login-table" align="center">
        <tr>
            <td>
                <span style="color:red">{$login_errors}</span>
            </td>
        </tr>
        <tr>
            <td align="left">
                <label for="username">{$lng_label_sys_user_username}</label><br />
                <input type="text" tabindex="1" name="user_login" id="user_login" />
            </td>
        </tr>
        <tr>
            <td align="left">
                <label for="password">{$lng_label_sys_user_pass}</label><br />
                <input type="password" tabindex="2" name="user_password" id="user_password" />
            </td>
        </tr>
        <tr>
            <td align="right">
                <input type="button" tabindex="5" value="Login" name="login" onclick="sendLogin();" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="{php}echo base_url();{/php}/joinus">{$lng_label_join_us}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="{php}echo base_url();{/php}/forgotpass">{$lng_label_forgotpassword}</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
   </table>
</div>
<!-- .login form -->

{literal}
<script type="text/javascript">

    /**
    * function show or hide login form
    */
    function showLoginForm(){
        if($('.login-form').css('display') == 'none') {
            $('.login-form').show();
        } else {
            $('.login-form').hide();    
        }
    }
    
    function sendLogin(){
        $('#login-form').append('<input type="hidden" value="' + $('#user_login').val() + '" name="user_login" />');    
        $('#login-form').append('<input type="hidden" value="' + $('#user_password').val() + '" name="user_password" />');
        $('#login-form').submit();    
    }    
</script>
{/literal}
                
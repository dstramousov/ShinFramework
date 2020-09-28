<?php /* Smarty version 2.6.26, created on 2011-05-03 09:33:25
         compiled from web/newlogin.tpl */ ?>
<a class="login-btn right" onclick="showLoginForm();"></a>
<a href="<?php  echo base_url().'/joinus';  ?>" class="registrati-btn right"></a>
<!-- login form -->
<form action="<?php  echo base_url().'/trylogin';  ?>" method="post" id="login-form"></form>
<div class="login-form">
    <table class="login-table" align="center">
        <tr>
            <td>
                <span style="color:red"><?php echo $this->_tpl_vars['login_errors']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td align="left">
                <label for="username"><?php echo $this->_tpl_vars['lng_label_sys_user_username']; ?>
</label><br />
                <input type="text" tabindex="1" name="user_login" id="user_login" />
            </td>
        </tr>
        <tr>
            <td align="left">
                <label for="password"><?php echo $this->_tpl_vars['lng_label_sys_user_pass']; ?>
</label><br />
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
                <a href="<?php echo base_url(); ?>/joinus"><?php echo $this->_tpl_vars['lng_label_join_us']; ?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo base_url(); ?>/forgotpass"><?php echo $this->_tpl_vars['lng_label_forgotpassword']; ?>
</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
   </table>
</div>
<!-- .login form -->

<?php echo '
<script type="text/javascript">

    /**
    * function show or hide login form
    */
    function showLoginForm(){
        if($(\'.login-form\').css(\'display\') == \'none\') {
            $(\'.login-form\').show();
        } else {
            $(\'.login-form\').hide();    
        }
    }
    
    function sendLogin(){
        $(\'#login-form\').append(\'<input type="hidden" value="\' + $(\'#user_login\').val() + \'" name="user_login" />\');    
        $(\'#login-form\').append(\'<input type="hidden" value="\' + $(\'#user_password\').val() + \'" name="user_password" />\');
        $(\'#login-form\').submit();    
    }    
</script>
'; ?>

                
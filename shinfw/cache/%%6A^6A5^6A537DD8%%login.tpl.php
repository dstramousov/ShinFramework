<?php /* Smarty version 2.6.26, created on 2011-03-02 21:07:47
         compiled from login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login page</title>

    <?php echo $this->_tpl_vars['cssincludes']; ?>

    <?php echo $this->_tpl_vars['jsincludes']; ?>


<body>
    <form action="<?php  echo base_url().'/trylogin';  ?>" method="post">
        <div style="padding:130px; text-align: center;">
            <table class="login-table" align="center">
                <tbody>
                    <tr>
                        <td align="center">
                            Shin PHP Framework<br />
                            <a href="http://www.shinsoftware.it" target="_blank">www.shinsoftware.it</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->_tpl_vars['errors']; ?>

                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="username">User:</label><br />
                            <input type="text" tabindex="1" name="user_login" id="username">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="password">Password:</label><br />
                            <input type="password" tabindex="2" name="user_password" id="password">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <input type="submit" tabindex="5" value="Login" name="login">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    
    <?php echo '
        <style type="text/css">
            a{
                color: #e4e4e4;
            }
            
            .login-table{
                width: 300px;
                background-color: #9d9894;
                border: 1px solid #767676;
                margin-left: auto;
                margin-right: auto;
                margin-top: 5em;
                padding: 1em;
                color: #FFFFFF;
                border-collapse: separate;    
            }
            
            .login-table input[type=text], .login-table input[type=password] {
                width: 270px !important;
                border: 1px solid #767676;
                font-size: 18px; 
            }
            
            .ui-state-error {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
            
            
        </style>
    '; ?>

    
    <?php echo '
        <script type="text/javascript">
            $(document).ready(function(){
                $(\'#username\').focus();    
            })
        </script>
    '; ?>

</body>
</html>

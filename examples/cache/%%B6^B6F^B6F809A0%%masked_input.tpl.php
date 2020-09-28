<?php /* Smarty version 2.6.26, created on 2011-05-05 14:15:57
         compiled from masked_input.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Masked Input example</legend>
        <table border="0">
            <tbody>
                <tr>
                    <td>Date</td>
                    <td><input type="text" tabindex="1" id="date"></td>
                    <td>99/99/9999</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" tabindex="3" id="phone"></td>
                    <td>(999) 999-9999</td>
                </tr>
                <tr>
                    <td>Phone + Ext</td>
                    <td><input type="text" tabindex="4" id="phoneext"></td>
                    <td>(999) 999-9999? x99999</td>
                </tr>
                <tr>
                    <td>Tax ID</td>
                    <td><input type="text" tabindex="5" id="tin"></td>
                    <td>99-9999999</td>
                </tr>
                <tr>
                    <td>SSN</td>
                    <td><input type="text" tabindex="6" id="ssn"></td>
                    <td>999-99-9999</td>
                </tr>
                <tr>
                    <td>Product Key</td>
                    <td><input type="text" tabindex="7" id="product"></td>
                    <td>a*-999-a999</td>
                </tr>
                <tr>
                    <td>Eye Script</td>
                    <td><input type="text" tabindex="8" id="eyescript"></td>
                    <td>~9.99 ~9.99 999</td>
                </tr>
                <tr>
                    <td>With complete function</td>
                    <td><input type="text" tabindex="8" id="date2"></td>
                    <td>99/99/9999</td>
                </tr>
            </tbody>
        </table>
    </fieldset>    
    
    
</body>

</html>
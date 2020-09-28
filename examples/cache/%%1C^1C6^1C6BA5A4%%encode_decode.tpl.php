<?php /* Smarty version 2.6.26, created on 2011-05-10 14:19:46
         compiled from encode_decode.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Encode Decode example</legend>
        <form action="" method="post" name="data">
            <table>
                <tr>
                    <td>Data to encode:</td>
                    <td><input type="text" name="data_to_encode" id="data_to_encode" value="<?php echo $this->_tpl_vars['data_to_encode']; ?>
"></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="action" value="Encode" /></td>
                </tr>
                <tr>
                    <td>Encoded data:</td>
                    <td><input type="text" name="encoded_data" id="encoded_data" value="<?php echo $this->_tpl_vars['encoded_data']; ?>
"></td>
                </tr>
                <tr>
                    <td>Decoded data:</td>
                    <td><input type="text" name="decoded_data" id="decoded_data" value="<?php echo $this->_tpl_vars['decoded_data']; ?>
"></td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="action" value="Decode" /></td>
                </tr>
            </table>
        </form>
        
        
    </fieldset>
    
</body>

</html>
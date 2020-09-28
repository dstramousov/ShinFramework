<?php /* Smarty version 2.6.26, created on 2010-12-17 09:13:44
         compiled from texteditor.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'/index.php/main');  ?>">Back to Main page</a>
    <br><br>

    <table>
        <tr>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Simple editor example</legend>

                    <textarea cols="50" rows="15" id="simple-text-editor"></textarea>
                </fieldset>
            </td>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Advanced editor example</legend>

                    <textarea cols="80" rows="15" id="advanced-text-editor">readonly text</textarea>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Simple readonly editor example</legend>

                    <textarea cols="80" rows="15" id="simple-text-editor-readonly">readonly text</textarea>
                </fieldset>
            </td>
            <td valign="top">
                <fieldset>
                    <legend style="font-size: 30px; font-weight: bold;">Image and File manager</legend>

                    <textarea cols="80" rows="15" id="file-image-managers">some text</textarea>
                </fieldset>    
            </td>
        </tr>
    </table>
    
</body>

</html>
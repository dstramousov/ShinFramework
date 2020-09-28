<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-30 10:52:21
         compiled from "D:\Work\web\shinframework\ppfm/views/dialogs/entry_dialog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26354ca441b5e3b5e9-43847040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ac1ce9a850b29d14365d60816db0279da29d4fc' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/dialogs/entry_dialog.tpl',
      1 => 1284730410,
    ),
  ),
  'nocache_hash' => '26354ca441b5e3b5e9-43847040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
    <?php echo $_smarty_tpl->getVariable('datepickerJsCode')->value;?>

</script>

<table>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_idUser_hidden')->value;?>

        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_type')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_type_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_holder_id')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_idHolder_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_category_id')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_idCat_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_text')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_text_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_account_id')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_idAccount_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_amount')->value;?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('currencySymbol')->value;?>
</td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_amount_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_entry_date')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_entry_date_input')->value;?>

            <div class="shin-error1"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $_smarty_tpl->getVariable('ppfm_entry_idEntry_hidden')->value;?>
</td>
    </tr>
</table>


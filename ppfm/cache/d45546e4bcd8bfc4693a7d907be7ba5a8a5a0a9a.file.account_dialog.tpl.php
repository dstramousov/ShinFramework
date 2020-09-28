<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-14 13:36:32
         compiled from "D:\Work\web\shinframework\ppfm/views/dialogs/account_dialog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1824c8f5030361b01-60321230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd45546e4bcd8bfc4693a7d907be7ba5a8a5a0a9a' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/dialogs/account_dialog.tpl',
      1 => 1284453911,
    ),
  ),
  'nocache_hash' => '1824c8f5030361b01-60321230',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
    <?php echo $_smarty_tpl->getVariable('datepickerJsCode2')->value;?>

</script>


<table>
    <tr>
        <td colspan="2">
        <div id="dialog-errors">
            <div class="b-messages"><?php echo $_smarty_tpl->getVariable('jsMessages')->value;?>
</div>
            <div class="b-errors"><?php echo $_smarty_tpl->getVariable('jsErrors')->value;?>
</div>
        </div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_account_account')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_account_account_input')->value;?>

            <div class="error"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_account_amount')->value;?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('currencySymbol')->value;?>
</td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_account_curAmount_input')->value;?>

            <div class="error"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_account_last_update')->value;?>
</td>
        <td></td>
        <td>
            <?php echo $_smarty_tpl->getVariable('ppfm_account_lastUpdate_input')->value;?>

            <div class="error"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $_smarty_tpl->getVariable('ppfm_account_idAccount_hidden')->value;?>
</td>
    </tr>
</table>
 
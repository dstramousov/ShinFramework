<?php /* Smarty version 2.6.26, created on 2011-01-17 11:30:31
         compiled from sys_manage/list/sys-log-info.tpl */ ?>
<?php $_from = $this->_tpl_vars['appInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
    <div class="info-block">
        <table>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_app_path']; ?>
</th>
                <td style="width: 100px;"><?php echo $this->_tpl_vars['app']['path']; ?>
</td>
                <th><?php echo $this->_tpl_vars['lng_label_sys_app_size']; ?>
</th>
                <td style="width:80px;"><?php echo $this->_tpl_vars['app']['size']; ?>
</td>
                <th><?php echo $this->_tpl_vars['lng_label_sys_app_files_count']; ?>
</th>
                <td style="width:50px;"><?php echo $this->_tpl_vars['app']['count']; ?>
</td>
                <th><?php echo $this->_tpl_vars['lng_label_sys_app_dirs_count']; ?>
</th>
                <td style="width:50px;"><?php echo $this->_tpl_vars['app']['dircount']; ?>
</td>
            </tr>
        </table>
    </div>
<?php endforeach; endif; unset($_from); ?>
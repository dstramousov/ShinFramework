<?php /* Smarty version 2.6.26, created on 2010-07-05 15:26:12
         compiled from add_entry.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

<h1>Project Personal Finance Manager.</h1>
<h3>ver. <?php  echo SHIN_Core::version();  ?> </h3><br/>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br/>

<h3><?php echo $this->_tpl_vars['lng_label_new_entry']; ?>
</h3>
<p><font color="orangered" size="+1"><tt><b>*</b></tt></font>&nbsp;<?php echo $this->_tpl_vars['lng_label_require']; ?>
</p>
<?php 
	echo form_open('index.php/registration/saveEntry');
 ?>	

<table border="0" cellpadding="0" cellspacing="5">  
   <tr>
       <td align="right">
           <?php echo $this->_tpl_vars['lng_label_entry_type']; ?>

       </td>
       <td>
          <!-- <input name="user_type" type="text"  size="25" />-->
			<?php 
				$options = array(
                  'd' => 'Debit',
                  'c' => 'Credit'
				);

				echo form_dropdown('entry_type', $options, 'd');
			 ?>	
		   
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>
       </td>
   </tr>
   <tr>  
       <td align="right">  
           <?php echo $this->_tpl_vars['lng_label_entry_holder']; ?>

       </td>  
       <td>  
			<?php 
				// Generate and print holder names
				$holderModel = SHIN_Core::$_libs['holder_model'];
				$holdersArray = $holderModel->getHolders();
				
				echo form_dropdown('entry_holder_id', $holdersArray);
			 ?>
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr valign="top">  
       <td align="right">  
           <?php echo $this->_tpl_vars['lng_label_entry_category']; ?>

       </td>  
       <td>
			<?php 
				// Generate and print categories
				$categoryModel = SHIN_Core::$_libs['category_model'];
				$categoryArray = $categoryModel->getCategory(SHIN_Core::$_current_lang);
				
				echo form_dropdown('entry_cat_id', $categoryArray);
			 ?>
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>
   <tr valign="top">  
       <td align="right">  
           <?php echo $this->_tpl_vars['lng_label_entry_account']; ?>

       </td>  
       <td>
			<?php 
				// Generate and print account names
				$accountModel = SHIN_Core::$_libs['account_model'];
				$accountArray = $accountModel->getAccounts();
				
				echo form_dropdown('entry_account_id', $accountArray);
			 ?>
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>
   <tr>  
       <td align="right">  
           <?php echo $this->_tpl_vars['lng_label_entry_amount']; ?>

       </td>  
       <td>  
			<?php 
				$data = array(
					'name'        => 'entry_ammount',
					'id'          => 'entry_ammount_id',
					'value'       => '',
					'maxlength'   => '100',
					'size'        => '50',
				);			
			
				echo form_input($data);	   
			 ?>
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <?php echo $this->_tpl_vars['lng_label_entry_date']; ?>

       </td>  
       <td>  
			<?php 			
				$data = array(
					'name'        => 'entry_date',
					'id'          => 'entry_date_id',
					'value'       => '',
					'maxlength'   => '100',
					'size'        => '50',
				);			
			
				echo form_input($data);
			 ?>
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr valign="top">  
       <td align="right">  
          <?php echo $this->_tpl_vars['lng_label_entry_description']; ?>

       </td>  
       <td>  
			<?php 			
				$data = array(
					'name'        => 'entry_text',
					'id'          => 'entry_text_id',
					'value'       => '',
					'rows'			=> '5',
					'cols'			=> '43',
				);			
			
				echo form_textarea($data);	   
			 ?>
       </td>  
   </tr>
   <tr>  
       <td align="right" colspan="2">  
           <hr noshade="noshade" />  
           <input type="reset" value="<?php echo $this->_tpl_vars['lng_label_reset_form']; ?>
" />  
           <input type="submit" name="submitok" value="<?php echo $this->_tpl_vars['lng_label_send_form']; ?>
" />  
       </td>  
   </tr>  
</table>  
<?php echo form_close(); ?>

</body>

</html>
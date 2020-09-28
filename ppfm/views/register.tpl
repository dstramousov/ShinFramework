{include file="header.tpl"}

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
	{include file="main_menu.tpl"}

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b>{$lng_label_tools_ppfm_menu}</b>&nbsp;&nbsp;</legend>
	{include file="ppfm_menu.tpl"}

</fieldset>

<br/>

<h3>{$lng_label_new_user_reg}</h3>
<p><font color="orangered" size="+1"><tt><b>*</b></tt></font>&nbsp;{$lng_label_require}</p>
<form method="post" action="{php} echo base_url().'/index.php/registration/saveUser'; {/php}">  
<table border="0" cellpadding="0" cellspacing="5">  
   <tr>  
       <td align="right">  
           <p>{$lng_label_lang}</p>  
       </td>  
       <td>  
           <input name="user_lang" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_type}</p>  
       </td>  
       <td>  
           <input name="user_type" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_name}</p>  
       </td>  
       <td>  
           <input name="user_name" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_lastname}</p>  
       </td>  
       <td>  
           <input name="user_lastname" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_email}</p>  
       </td>  
       <td>  
           <input name="user_email" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_username}</p>  
       </td>  
       <td>  
           <input name="user_name" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_pwd}</p>  
       </td>  
       <td>  
           <input name="user_password" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr>  
       <td align="right">  
           <p>{$lng_label_pwd_repeat}</p>  
       </td>  
       <td>  
           <input name="user_rep_password" type="text"  size="25" />  
           <font color="orangered" size="+1"><tt><b>*</b></tt></font>  
       </td>  
   </tr>  
   <tr valign="top">  
       <td align="right">  
           <p>{$lng_label_notes}</p>  
       </td>  
       <td>  
           <textarea name="user_notes" rows="5" cols="30"></textarea>  
       </td>  
   </tr>  
   <tr>  
       <td align="right" colspan="2">  
           <hr noshade="noshade" />  
           <input type="reset" value="{$lng_label_reset_form}" />  
           <input type="submit" name="submitok" value="{$lng_label_send_form}" />  
       </td>  
   </tr>  
</table>  
</form>

{include file='tech_info.tpl'}

</body>

</html>
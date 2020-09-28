<?php /* Smarty version 2.6.26, created on 2011-03-23 10:28:52
         compiled from form.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

	<h1>"Form" helper demo:</h1>
	<h4>Full version of this part you can see there:
		<a href="http://codeigniter.com/user_guide/helpers/form_helper.html" target="_blank">http://codeigniter.com/user_guide/helpers/form_helper.html</a>
	</h4>

	<div id="content">

		<!-- sample 1. -->
		<?php 	
			echo form_open_multipart('stefano/dimas');	
		 ?>
		<?php echo form_close(); ?>
		<code>
			echo form_open_multipart('email/send');
			<br/><br/>
			&lt;form action="http://mywork/shinframework/email/send" method="post" enctype="multipart/form-data" /&qt;
		</code>


		<!-- sample 2. -->
		<?php 
			$attributes = array('class' => 'FFFFF', 'id' => 'DIMAS');	
			echo  form_open('email/send', $attributes);
		 ?>	
		<?php echo form_close(); ?>
		<code>
			$attributes = array('class' => 'email', 'id' => 'myform');	
			<br/>
			echo form_open_multipart('email/send', $attributes);
			<br/><br/>
			&lt;form action="http://mywork/shinframework/email/send" method="post" enctype="multipart/form-data" class="email" id="myform" /&gt;
		</code>

		<!-- sample 3. -->
		<?php 
			$attributes = array('class' => 'email', 'id' => 'myform');
			$hidden = array('username' => 'JHSGJHGDJSHGDJHDGSJH', 'member_id' => '6767676');
			echo form_open('email/send', $attributes, $hidden);
		 ?>
		<?php echo form_close(); ?>
		<code>
			$attributes = array('class' => 'email', 'id' => 'myform');	
			<br/>
			$hidden = array('username' => 'Alexandr', 'member_id' => '234');
			<br/>
			echo form_open_multipart('email/send', $attributes, $hidden);
			<br/><br/>
			&lt;form action="http://mywork/shinframework/email/send" method="post" enctype="multipart/form-data" class="email" id="myform" /&gt;<br/>
			&lt;input type="hidden" name="username" value="Alexandr" /&gt;<br/>
			&lt;input type="hidden" name="member_id" value="234" /&gt;
		</code>


		<!-- sample 4. -->
		<?php 
			$data = array(
        	      'name'  => 'Alexandr',
            	  'email' => 'alexander@example.com',
              	'url'   => 'http://www.example.com'
	            );
			echo form_open('email/send');
			echo form_hidden($data);
		 ?>	
		<?php echo form_close(); ?>


		<!-- sample 5. -->
		<?php 
			$data = array(
        	      'name'        => 'username',
	              'id'          => 'username',
   		           'value'       => 'Alexandr',
	              'maxlength'   => '100',	
	              'size'        => '50',	
	              'style'       => 'width:50%',
	            );

//			echo form_open('email/send');
//			echo form_input($data);
		 ?>
		<?php echo form_close(); ?>

	</div>

</body>

</html>
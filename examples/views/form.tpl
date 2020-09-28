{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}

	<h1>"Form" helper demo:</h1>
	<h4>Full version of this part you can see there:
		<a href="http://codeigniter.com/user_guide/helpers/form_helper.html" target="_blank">http://codeigniter.com/user_guide/helpers/form_helper.html</a>
	</h4>

	<div id="content">

		<!-- sample 1. -->
		{php}	
			echo form_open_multipart('stefano/dimas');	
		{/php}
		{php}echo form_close();{/php}
		<code>
			echo form_open_multipart('email/send');
			<br/><br/>
			&lt;form action="http://mywork/shinframework/email/send" method="post" enctype="multipart/form-data" /&qt;
		</code>


		<!-- sample 2. -->
		{php}
			$attributes = array('class' => 'FFFFF', 'id' => 'DIMAS');	
			echo  form_open('email/send', $attributes);
		{/php}	
		{php}echo form_close();{/php}
		<code>
			$attributes = array('class' => 'email', 'id' => 'myform');	
			<br/>
			echo form_open_multipart('email/send', $attributes);
			<br/><br/>
			&lt;form action="http://mywork/shinframework/email/send" method="post" enctype="multipart/form-data" class="email" id="myform" /&gt;
		</code>

		<!-- sample 3. -->
		{php}
			$attributes = array('class' => 'email', 'id' => 'myform');
			$hidden = array('username' => 'JHSGJHGDJSHGDJHDGSJH', 'member_id' => '6767676');
			echo form_open('email/send', $attributes, $hidden);
		{/php}
		{php}echo form_close();{/php}
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
		{php}
			$data = array(
        	      'name'  => 'Alexandr',
            	  'email' => 'alexander@example.com',
              	'url'   => 'http://www.example.com'
	            );
			echo form_open('email/send');
			echo form_hidden($data);
		{/php}	
		{php}echo form_close();{/php}


		<!-- sample 5. -->
		{php}
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
		{/php}
		{php}echo form_close();{/php}

	</div>

</body>

</html>
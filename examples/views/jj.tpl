{include file="header.tpl"}

<body id="page">

	<!-- think about integration with JS_manager: ready, Need talk with Stefano about using without SHIN_JS_manager -->
	{php} 
//		dump(SHIN_Core::$_libs['javascript']->compile());
	{/php}
	<!-- end injection -->

	{include file="back_url.tpl"}
	
	<div id="process_text">
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	</div>
	
	<br/>
	
	<div id="process_img">
		<img src="{php}echo SHIN_Core::$_config['core']['app_base_path'].'images/owl.jpg'{/php}" border="0" alt=""/>
	</div>
	<br/>
	
	<p>
	<textarea rows="10" cols="45" name="text" id="text">
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
	</textarea></p>
	<br/><br/>

			
	<!-- effects table -->
	<h4>List of effects/example:</h4>	
	<table cellspacing="5", cellpadding="5" border="1">
		<tr>
			<td>
				<h4>Sample ANIMATE:</h4>
				<a href="#" id="animate_triger" name="animate_triger">Test animate</a>
			</td>
			<td>
				<h4>Sample FADEIN:</h4>
				<a href="#" id="fadein_triger" name="fadein_triger">Test fadeIn</a>
			</td>
			<td>
				<h4>Sample FADEOUT:</h4>
				<a href="#" id="fadeout_triger" name="fadeout_triger">Test fadeOut</a>
			</td>
			<td>
				<h4>Sample SLIDEUP:</h4>
				<a href="#" id="slideup_triger" name="slideup_triger">Test slideUp</a>
			</td>
			<td>
				<h4>Sample SLIDEDOWN:</h4>
				<a href="#" id="slidedown_triger" name="slidedown_triger">Test slideDown</a>
			</td>
			<td>
				<h4>Sample SLIDETOGGLE:</h4>
				<a href="#" id="slidetoggle_triger" name="slidetoggle_triger">Test slideToggle</a>
			</td>
			
			
		</tr>
		<tr>
			<td>
				<h4>Sample DBL Click:</h4>
				<a href="#" id="slidetoggle_dbltriger" name="slidetoggle_dbltriger">Test DBL Click</a>
			</td>
			<td>
				<h4>Sample keydown:</h4>
				<a href="#" id="kd_triger" name="kd_triger">Test KEYDOWN</a>
			</td>
			<td>
				<h4>Sample keyup:</h4>
				<a href="#" id="ku_triger" name="ku_triger">Test KEYUP</a>
			</td>
			<td>
				<h4>Sample hide:</h4>
				<a href="#" id="hide_triger" name="hide_triger">Test Hide</a>
			</td>
			<td>
				<h4>Sample :</h4>
				<a href="#" id="_triger" name="_triger">Test </a>
			</td>
			<td>
				<h4>Sample :</h4>
				<a href="#" id="_triger" name="_triger">Test </a>
			</td>
		</tr>
	</table>
	
</body>

</html>
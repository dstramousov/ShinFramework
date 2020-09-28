<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>SetupController Rruntime - Error</title>
	</head>

{literal}
<style type="text/css">

body {
background:#0000aa;
color:#ffffff;
font-family:courier;
font-size:12pt;
text-align:center;
margin-top: 100px;
}

#wrapper {
width: 900px; 
height: auto; 
margin: 0 auto;  
}

.error {
background:#fff;
color:#0000aa;
padding:2px 8px;
font-weight:bold;
}

p {
margin:30px 100px;
text-align:left;
}

a,a:hover {
color:inherit;
font:inherit;
}

a:hover {
color: #fff000;
}

.links {
text-align:center;
margin-top:30px;
}

</style>{/literal}

<body>
<span class="error">!! RUNTIME ERROR !!</span>
<div id="wrapper">
<p>
Wooah! You have tried to access a SetupController with SHIN_Prifiler is TRUE.<br />
This is wrong. <u>For fix this you can make follow</u>: <br />
Set $config['core']['profiler_information'] = <b>FALSE</b>;  <br />in file shinfw/config/config.php <br />
</p>
</div>
Press F5 to refresh the page.
<div class="links">
<a href="index.html">Home</a> 
<a href="contact.html">Contact Me</a> 
</div>
</body>

</html>
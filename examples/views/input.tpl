<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Input</title>
</head>
<body>    

	{include file="back_url.tpl"}

    <form action ="input.php" method="post">
    a = <input type="text" name="a" value="javascript:alert('1')"><br/>
    b = <input type="text" name="b" value="2"><br/>
    <br/>
    <input type="submit" value="Send">
    <input type="submit" name="xss" value="Send(clean xss)"><br/>
    </form>
    <br/>Recived:
    <br/>
    a = {$a}
    <br/>
    b = {$b}
    <br/>
    <br/>
</body>
</html>
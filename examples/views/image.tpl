<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Image</title>
</head>
<body>    

	{include file="back_url.tpl"}
    
    <form action="image.php" enctype="multipart/form-data" method="POST">
        <input type="file" name="myimg" /><br/>
        <br/>
        <input type="submit" name="do" value="Upload&resize"><br/>
    </form>    
</body>
</html>

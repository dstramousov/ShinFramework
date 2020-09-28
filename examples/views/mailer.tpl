<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <title>Mailer</title>
    </head>
    <body>

	{include file="back_url.tpl"}

        <form action ="./mailer.php" method="post">
        To &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="to" value=""><br/>
        Body <input type="text" name="body" value="Test body"><br/>
        <br/>
        <input type="submit" name="sendemail" value="Send">
        </form><br/><br/>
        {if $error}
            Result: {$error}
        {/if}
    </body>
</html>

<?php /* Smarty version 2.6.26, created on 2011-05-10 14:23:08
         compiled from input.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Input</title>
</head>
<body>    

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

    <form action ="input.php" method="post">
    a = <input type="text" name="a" value="javascript:alert('1')"><br/>
    b = <input type="text" name="b" value="2"><br/>
    <br/>
    <input type="submit" value="Send">
    <input type="submit" name="xss" value="Send(clean xss)"><br/>
    </form>
    <br/>Recived:
    <br/>
    a = <?php echo $this->_tpl_vars['a']; ?>

    <br/>
    b = <?php echo $this->_tpl_vars['b']; ?>

    <br/>
    <br/>
</body>
</html>
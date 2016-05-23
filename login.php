<?php
    session_start();
?>

<?php
/*
$db = mysqli_connect("localhost", "root", "") or die("Error connect!");
mysqli_select_db($db,"lang_db") or die("Error Select db!"); 
mysqli_query("SET NAMES 'UTF8'");
*/
include('language/define_lang.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/login_style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
      
    <div class="login">
        <a href="language/switch_lang.php?lang=1">Amharic</a> | <a href="language/switch_lang.php?lang=2">English</a><hr/>
      <h1><?php echo _t_header;?></h1>
      <form method="post" action="login_auth.php">
        <p><input type="text" name="user_name" value="" placeholder="<?php echo _t_username;?>" required = "true"></p>
        <p><input type="password" name="password" value="" placeholder="<?php echo _t_password;?>" required="true"></p>
        <span style="color:red;" id="error"></span>
        <p class="submit"><input type="submit" name="login" value="<?php echo _t_login;?>"></p>
      </form>
    </div>

    <!--<div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>-->
  </section>

  <section class="about">
   
    <p class="about-author">
      &copy; 2016 <a href="http://biniletblog.wordpress.com" target="_blank">how2ranO</a> -
     <!-- <a href="http://www.cssflow.com/mit-license" target="_blank">MIT License</a><br>
      Original PSD by <a href="http://www.premiumpixels.com/freebies/clean-simple-login-form-psd/" target="_blank">Orman Clark</a>-->
  </section>
</body>
</html>

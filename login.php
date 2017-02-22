<?php
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login2.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <title></title>
  </head>
  <body>


<div class="popuplogin2">
<div class="popuplogin_left2">
  <div class="login_headetext2">LOGIN
    <div class="line_02"></div>

      <form action="register_login.php" method="post">
        <input type="text" name="email_login" placeholder="email" required>
        <input type="password" name="password_login" placeholder="password" required>
        <input type="submit" name="login" value="GET STARTED">
        <a href="index.php"><div class="Create">Create Account</div></a>
<div class="Help">Need Help?</div>

      </div><!-- popuplogin_left -->

      </div><!-- popuplogin -->
</div><!-- wrap_login -->
      </form>


  </body>
</html>

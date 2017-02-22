<?php
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <title></title>
  </head>
  <body>


    <div id="wrap_login">
        <div class="popuplogin">
        <div class="popuplogin_left">
          <div class="login_headetext">CREATE ACCOUNT
            <div class="line_01"></div>

          </div>

                <form action="register_login.php" method="post" enctype = "multipart/form-data">
                  <input type="text" name="email_register" placeholder="email" id="email_register" required>
                  <input type="password" name="password_register" placeholder="password" required>
                  <input type="text" name="fname_register" placeholder="first name" required>
                  <input type="text" name="lname_register" placeholder="lastname" required>

                  
                  <input type="text" name="tel_register" placeholder="tel" required>
                  <input type="submit" name="register" value="REGISTER" onclick="check()">

                  <a href="login.php"><div class="Create">  Login</div></a>


        </div><!-- popuplogin_left -->
        <div class="popuplogin_right">
            <div class="section_img_profile">
              <input type="file" name="img_profile" onchange="readURL(this)" required>
              ADD<br>PHOTO
            </div>
        </div>
        </form>
        <script type="text/javascript">
				$('.section_img_profile').css('background', 'transparent url(img/bgaddphoto2.png) center top / cover');
		       	function readURL(input) {
		            if (input.files && input.files[0]) {
		                var reader = new FileReader();
		                reader.onload = function (e) {
		                    $('.section_img_profile').css('background', 'transparent url('+e.target.result +') center top / cover');
		                };
		                reader.readAsDataURL(input.files[0]);
		            }

		        }
		    </script>

        </div><!-- popuplogin -->
</div><!-- wrap_login -->

    <script type="text/javascript">
    function check(){
      var emailFilter=/^.+@.+\..{2,3}$/;
      var str=document.getElementById('email_register').value;
      if(!(emailFilter.test(str)))
      {
        alert('ท่านใส่อีเมล์ไม่ถูกต้อง');
        return false;
      }
    }
    </script>

  </body>
</html>

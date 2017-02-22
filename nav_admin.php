<?php
session_start();
if(isset($_SESSION['member_id'])){
  $member_id = $_SESSION['member_id'];
}
else if(isset($_SESSION['member_id_login'])){
  $member_id = $_SESSION['member_id_login'];
}
?>

<div class="Nev">


        <?php
          if(isset($member_id)){
            $member_id."<br>";

            require "./connect.php";
            $mysqli -> query("set names utf8");
            if (mysqli_connect_errno()) {
                echo "Mysqli Connect was not estabished".mysqli_connect_errno();
            }
            $getimg_profiles = $mysqli -> query("SELECT member_img FROM member WHERE member_id='$member_id'");
            if (is_array($getimg_profiles) || is_object($getimg_profiles))
            {
              foreach ($getimg_profiles as $getimg_profile) {
                $profile_register = $getimg_profile['member_img'];
              }
            }

          ?>
            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn header__moreButton"></button>
              <div id="myDropdown" class="dropdown-content">
                <a href="logout.php">log out</a>
              </div>
            </div>
            <div id="section_small_profile">
              <div id="small_profile"></div>
            </div>
            <script>
              $('#small_profile').css('background', 'transparent url(img_profile/<?=$profile_register?>) center top / cover');
            </script>
          <?php
          }
          else{
          ?>
            <a href="index.php"><div id="login"> Sign in / Create account</div></a>
          <?php
          }
        ?>

        <div class ="header__moreButton2"></div>
        <div class ="header__moreButton2"></div>
        <div class ="header__moreButton2"></div>
        <div class ="header__moreButton2"></div>


        <a href="form.php">

        </a>
        <a href="homepage.php"><div class="logo"><img src="img/bg_button.png"width="139px"height="46px">
        </div></a>


<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</div><!--Nev-->

<div id ="Nevleft">
        <div class="wrap_menu">
            <div class="small_logo01"><img src="img/logo00.png"></div>
            <div class="text_menu">ORDER</div>
        </div><!--  wrap_menu -->
        <div class="wrap_menu">
            <div class="small_logo02"><img src="img/logo01.png"></div>
            <div class="text_menu">รายการเช่า</div>
        </div><!--  wrap_menu -->

        <div class="wrap_menu">
            <div class="small_logo03"><img src="img/logo02.png"></div>
            <div class="text_menu">รายการคืน</div>
        </div><!--  wrap_menu -->

        <div class="wrap_menu">
            <div class="small_logo03"><img src="img/logo03.png"></div>
            <div class="text_menu">Dashboard</div>
        </div><!--  wrap_menu -->
        <div class="wrap_menu">
            <div class="small_logo03"><img src="img/logo04.png"></div>
            <div class="text_menu">ชุดแดนเซอร์</div>
        </div><!--  wrap_menu -->
        <div class="wrap_menu">
            <div class="small_logo03"><img src="img/logo05.png"></div>
            <div class="text_menu">Create Order</div>
        </div> <!--  wrap_menu -->

</div><!--Nevleft ///////////////////////-->

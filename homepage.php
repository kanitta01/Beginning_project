<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/homepage01.css">
    <script type="text/javascript" src="js/jquery.js"></script>
  </head>

  <body>
  <div id ="wrapper">

    <?php
      include('nav.php');
    ?>

    <div id="banner">

      <div class="bigbag">
            <!-- <div class="content_banner1">  <img src="img/iPhone.png"  style="width:336px;height:600px; "></div>-->
            <div class="content_banner2"> Welcome to .. Krusa Show<br><span>Tel.+66870220005</span>
              <p>THAI DRESS FOR RENT
                <br>RENT 6 GET 100 DISCOUNT </p>
            </div>



      </div><!-- bigbag -->

<div class="Button_plus01">
  <div class="eclipse-container pulse"><a href="#">SHOP NOW</a></div>
</div>

<div class="content_banner5">
      <div class="text1 ">THAI DRESS </div>
      <div class="text ">ชุดไทยทั้งหมด <div class="line"></div></div>
      <div class="text ">ชุดไทยภาคกลาง <div class="line"></div></div>
      <div class="text">ชุดไทยเพื่อนเจ้าสาว<div class="line"></div></div>
      <div class="text">ชุดไทยอีสาน <div class="line"></div></div>
      <div class="text">ชุดไทยล้านนา<div class="line"></div></div>
      <div class="text">ชุดไทยภาคใต้ <div class="line"></div></div>

</div>

<div id="New_workshop">
  <?php
    require "./connect.php";
    $mysqli -> query("set names utf8");
    if (mysqli_connect_errno()) {
        echo "Mysqli Connect was not estabished".mysqli_connect_errno();
    }

    $get_loop_workshops = $mysqli -> query("SELECT workshop_id, workshop_img, workshop_name, workshop_start_date, workshop_end_date, workshop_location, workshop_price FROM workshop");
    if (is_array($get_loop_workshops) || is_object($get_loop_workshops))
    {
      foreach ($get_loop_workshops as $get_loop_workshop) {
        $workshop_id = $get_loop_workshop['workshop_id'];
        $workshop_img = $get_loop_workshop['workshop_img'];
        $workshop_name = $get_loop_workshop['workshop_name'];
        $workshop_start_date = $get_loop_workshop['workshop_start_date'];
        $workshop_end_date = $get_loop_workshop['workshop_end_date'];
        $workshop_location = $get_loop_workshop['workshop_location'];
        $workshop_price = $get_loop_workshop['workshop_price'];

  ?>
<a href="detaildress.php?workshop_id=<?=$workshop_id?>">
  <div class="ar">
        <img src="img_workshop/1471180258_4739.png"width="300px"height="300px">
        <div class="box_time">IN STOCK</div>
             <div class="detailsmall_workshop ">
                  <div class="text_box0">
                        SIRAPON SET No.05
                        <div class="text_box01">ID 238040</div>
                  </div>

                  <div class="text_box">
                  SET 1,500 ฿ <br>
                  <p>6 Day  Deposit 500 ฿</p>
                  </div>

            </div>



<div class="button_detailsmall">ADD TO CART </div>


</div><!-- ar -->
</a>
<?php
  }
}
?>

  </div>




    </div><!--banner-->

    <div class="footter">ADD TO CART </div></div>
  </div>  <!--wrapper..............-->

  </body>
</html>

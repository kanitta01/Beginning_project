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
            <div class="content_banner2">WORKSHOP <br>NEEDs
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                <br>Maecenas fermentum dictum urna, non convallis velit faucibus
                a. Lorem ipsum dolor sit amet,Maecenasfermentum dictum urna, non convallis velit faucibus
                a. Lorem ipsum dolor sit amet,</p>
            </div>
            <div class="content_banner3">
              <img class="picbanner"src ="img/banner_pic.png" >
              <img class="picbanner"src="img/banner_pic2.png" >
              <img class="picbanner"src="img/banner_pic3.png" >

            </div>


      </div><!-- bigbag -->

<div class="Button_plus">
  <div class="eclipse-container pulse"><a href="#">+</a></div>
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
<a href="detail.php?workshop_id=<?=$workshop_id?>"><div class="ar">
  <img src="img_workshop/<?=$workshop_img?>"width="300px"height="300px">
  <div class="box_time">30DAY<br><span>LEFT</span></div>
       <div class="detailsmall_workshop ">
       <div class="text_box0">
           <?=$workshop_name?>
       </div>
        <div class="text_box">
            <img class="icon"src ="img/icon1.png"
            style="float:left;width:13px;height:13px; ">
        <font color=#fd2149><?=$workshop_start_date?> - <?=$workshop_end_date?></font><br>
            <img class="icon"src ="img/icon2.png"
            style="float:left;width:12px;height:13px; ">
        <?=$workshop_location?><br>
            <img class="icon"src ="img/icon3.png"
            style="float:left;width:13px;height:12px; ">
        เหลืออีก 200 ที่นั่ง &nbsp &nbsp
            <img class="icon4"src ="img/icon4.png"
            style="width:13px;height:13px; "><?=$workshop_price?>!
        </div>

        <div class="text_box2">
          <img class="icon5"src ="img/icon5.png"
          style="float:left;width:18px;height:18px; ">
      by <font color=#2c1bff>Craft</font>

      <p>Art,Design,Illustrator</p><br>
        </div>



</div>

<div class="button_detailsmall">JOIN WORKSHOP</div>


</div><!-- ar -->
</a>
<?php
  }
}
?>

  </div>




    </div><!--banner-->


  </div>  <!--wrapper..............-->

  </body>
</html>

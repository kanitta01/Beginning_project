<?php
session_start();
if(isset($_SESSION['member_id'])){
  $member_id = $_SESSION['member_id'];
}
else if(isset($_SESSION['member_id_login'])){
  $member_id = $_SESSION['member_id_login'];
}
?>

<meta charset="utf-8">
<?php
  $categ = $_POST['categ'];
  $name_workshop = $_POST['name_workshop'];
  $name_agency = $_POST['name_agency'];
  $location = $_POST['location'];
  $count_people = $_POST['count_people'];
  $price = $_POST['price'];
  $tel = $_POST['tel'];
  $link = $_POST['link'];
  $time = $_POST['time'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];
  $date_end_for_join = $_POST['date_end_for_join'];
  $detail1 = $_POST['detail1'];
  $detail2 = $_POST['detail2'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  echo $categ."<br>";
  echo $name_workshop."<br>";
  echo $name_agency."<br>";
  echo $location."<br>";
  echo $count_people."<br>";
  echo $price."<br>";
  echo $tel."<br>";
  echo $link."<br>";
  echo $time."<br>";
  echo $date_start."<br>";
  echo $date_end."<br>";
  echo $date_end_for_join."<br>";
  echo $detail1."<br>";
  echo $detail2."<br>";

  if(isset($_FILES['img_workshop'])){
      ini_set('upload_max_filesize', '2M');
      if($_FILES["img_workshop"]["error"]>0)
      {
        "Error : ".$_FILES["img_workshop"]["error"]."<br>";
      }
      else
      {
        "Upload : ".$_FILES['img_workshop']['name']."<br>";
        "Type : ".$_FILES['img_workshop']['type']."<br>";
        "Tmp : ".$_FILES['img_workshop']['tmp_name']."<br>";
        "Size : ".($_FILES['img_workshop']['size'])."KB"."<br>";
      }

      $filename_workshop = $_FILES['img_workshop']['name'];
      $filetype_workshop = $_FILES['img_workshop']['type'];
      $filetemp_workshop = $_FILES['img_workshop']['tmp_name'];
      $filesize_workshop = ($_FILES['img_workshop']['size']);
      $newfilename_workshop = time()."_".rand(1,9999);
      echo $newfile_workshop="$newfilename_workshop.jpg";
      if($filetype_workshop=="image/jpeg"&&$filesize_workshop<=2000000)
      {
          "File name : ".$newfilename_workshop.".jpg";
          copy($filetemp_workshop,"img_workshop/".$newfile_workshop);
      }
  }

  require "connect.php";
	$mysqli -> query("set names utf8");
  if (mysqli_connect_errno()) {
	  echo "Mysqli Connect was not estabished".mysqli_connect_errno();
	}
	$insert_workshop = $mysqli -> query("INSERT INTO workshop(workshop_id,workshop_category,workshop_name,workshop_name_agency,workshop_location,workshop_count_people,workshop_price,workshop_tel,workshop_link,workshop_time,workshop_start_date,workshop_end_date,workshop_end_timeout,workshop_detail1,workshop_detail2,workshop_img,workshop_latitude,workshop_longtitude, member_id
  ) VALUES('','$categ','$name_workshop','$name_agency','$location','$count_people','$price','$tel','$link','$time','$date_start','$date_end','$date_end_for_join','$detail1','$detail2','$newfile_workshop','$latitude','$longitude','$member_id')");

  $get_id_workshops = $mysqli -> query("SELECT workshop_id FROM workshop WHERE workshop_name = '$name_workshop' AND workshop_detail1 = '$detail1'" );
  if (is_array($get_id_workshops) || is_object($get_id_workshops))
  {
    foreach ($get_id_workshops as $get_id_workshop) {
      $workshop_id = $get_id_workshop['workshop_id'];
    }
  }
  header('location:detail.php?workshop_id='.$workshop_id);
	?>

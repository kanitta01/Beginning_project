<?php
  session_start();//ต้องประกาศ เพราะเราจะใช้ session ในหน้านีิ้
  if(isset($_POST['register'])){
    $Email = $_POST['email_register'];
    $Pw = $_POST['password_register'];
    $fname_register = $_POST['fname_register'];
    $lname_register = $_POST['lname_register'];

  
    $tel_register = $_POST['tel_register'];

    echo $Email."<br>";
    echo $Pw."<br>";
    echo $fname_register."<br>";
    echo $lname_register."<br>";


    echo $tel_register."<br>";
    if(isset($_FILES['img_profile'])){
      ini_set('upload_max_filesize', '2M');
      if($_FILES["img_profile"]["error"]>0)
      {
        "Error : ".$_FILES["img_profile"]["error"]."<br>";
      }
      else
      {
        "Upload : ".$_FILES['img_profile']['name']."<br>";
        "Type : ".$_FILES['img_profile']['type']."<br>";
        "Tmp : ".$_FILES['img_profile']['tmp_name']."<br>";
        "Size : ".($_FILES['img_profile']['size'])."KB"."<br>";
      }

      $filename_profile = $_FILES['img_profile']['name'];
      $filetype_profile = $_FILES['img_profile']['type'];
      $filetemp_profile = $_FILES['img_profile']['tmp_name'];
      $filesize_profile = ($_FILES['img_profile']['size']);
      $newfilename_profile = time()."_".rand(1,9999);
      echo $newfile_profile="$newfilename_profile.jpg";
      if($filetype_profile=="image/jpeg"&&$filesize_profile<=2000000)
      {
          "File name : ".$newfilename_profile.".jpg";
          copy($filetemp_profile,"img_profile/".$newfile_profile);
      }
    }

    require "./connect.php";
    $mysqli -> query("set names utf8");
    if (mysqli_connect_errno()) {
        echo "Mysqli Connect was not estabished".mysqli_connect_errno();
    }

    $registers = $mysqli -> query("INSERT INTO member(member_id, member_email, member_password, member_type, member_fname, member_lname, member_birthday, member_gender, member_tel, member_img) VALUES ('', '$Email', '$Pw', '0', '$fname_register', '$lname_register', '$birthday_register', '$gender_register', '$tel_register', '$newfile_profile')");
    header('location:homepage.php');

    $getID_registers = $mysqli -> query("SELECT member_img, member_id FROM member WHERE member_email='$Email' AND member_password='$Pw'");
    if (is_array($getID_registers) || is_object($getID_registers))
    {
      foreach ($getID_registers as $getID_register) {
        $member_id_register = $getID_register['member_id'];
        $profile_register = $getID_register['member_img'];
        $_SESSION['member_id'] = $member_id_register;
        $_SESSION['profile_register'] = $profile_register;
      }
    }
  }

  if(isset($_POST['login']))
    {
        require "./connect.php";
        $mysqli -> query("set names utf8");
        if (mysqli_connect_errno()) {
            echo "Mysqli Connect was not estabished".mysqli_connect_errno();
        }

        if (isset($_POST["email_login"])) {
          $email = $_POST['email_login'];
          $pw = $_POST['password_login'];

          echo $email;
          echo $pw;
          $sel_user = "SELECT member_email ,member_password FROM member WHERE member_email = '$email' AND member_password = '$pw'";
          $run_user = mysqli_query($mysqli,$sel_user);
          $check_user = mysqli_num_rows($run_user);
          $findnames = $mysqli -> query("SELECT member_id , member_type , member_email , member_password FROM member WHERE member_email='$email' AND member_password = '$pw'");

        if (is_array($findnames) || is_object($findnames))
        {
            foreach ($findnames as $findname) {
                $member_id = $findname['member_id'];
                $email = $findname['member_email'];
                $password_login = $findname['member_password'];
                $type_id = $findname['member_type'];
                    echo $member_id."<br>";
                    echo $email."<br>";
                    echo $type_id."<br>";
            }
        }
            if($check_user > 0) {
                $_SESSION['member_id_login'] = $member_id;
                $_SESSION['email_login'] = $email;
                $_SESSION['type_id_login'] = $type_id;
                if($type_id == 0){
                    header('location:homepage.php');
                }
                else if($type_id == 1){
                    header('location:homepage.php');
                }
            }
            else{
                $login_error=0;
                $_SESSION['login_error'] = $login_error;
                header('location:login.php');
            }
        }
      }
?>

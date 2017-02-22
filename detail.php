<?php
	if(isset($_GET['workshop_id'])){
		$workshop_id = $_GET['workshop_id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet" type="text/css" href="css/homepage01.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<meta charset="utf-8">
<body>
	<?php
		include('nav.php');
		require "./connect.php";
    $mysqli -> query("set names utf8");
    if (mysqli_connect_errno()) {
        echo "Mysqli Connect was not estabished".mysqli_connect_errno();
    }
	  $get_loop_workshops = $mysqli -> query("SELECT workshop.workshop_id, workshop.workshop_name_agency, workshop.workshop_end_timeout, workshop.workshop_detail1, workshop.workshop_detail2, workshop.workshop_tel, workshop.workshop_count_people, workshop.workshop_time, workshop.workshop_img, workshop.workshop_name, workshop.workshop_start_date, workshop.workshop_end_date, workshop.workshop_location, workshop.workshop_price, member.member_fname, member.member_lname FROM workshop INNER JOIN member ON workshop.member_id = member.member_id WHERE workshop_id = '$workshop_id'");
	  if (is_array($get_loop_workshops) || is_object($get_loop_workshops))
	  {
	    foreach ($get_loop_workshops as $get_loop_workshop) {
				$member_fname = $get_loop_workshop['member_fname'];
				$workshop_end_timeout = $get_loop_workshop['workshop_end_timeout'];
				$workshop_count_people = $get_loop_workshop['workshop_count_people'];
				$workshop_tel = $get_loop_workshop['workshop_tel'];
				$workshop_time = $get_loop_workshop['workshop_time'];
				$workshop_name_agency = $get_loop_workshop['workshop_name_agency'];
				$member_lname = $get_loop_workshop['member_lname'];
	    	$workshop_id = $get_loop_workshop['workshop_id'];
	      $workshop_img = $get_loop_workshop['workshop_img'];
	      $workshop_name = $get_loop_workshop['workshop_name'];
	      $workshop_start_date = $get_loop_workshop['workshop_start_date'];
	      $workshop_end_date = $get_loop_workshop['workshop_end_date'];
	      $workshop_location = $get_loop_workshop['workshop_location'];
	      $workshop_price = $get_loop_workshop['workshop_price'];
				$workshop_detail1 = $get_loop_workshop['workshop_detail1'];
				$workshop_detail2 = $get_loop_workshop['workshop_detail2'];
			}
		}
	?>
	<div id="section_top_detail">
		<p><?=$workshop_name?></p>
		by <span><?=$member_fname?> <?=$member_lname?></span> <?=$workshop_start_date?>
	</div><!-- section_top_detail -->
	<div id="section_detail1">
		<div id="section_img_workshop">
			<script>
				$('#section_img_workshop').css('background', 'transparent url(img_workshop/<?=$workshop_img?>) center top / cover');
			</script>
		</div><!-- section_img_workshop -->
		<div id="detail_workshop_box">
			<div class="list_menu" id="list_menu1"><?=$workshop_name_agency?></div>
			<div class="list_menu" id="list_menu2"><?=$workshop_time?></div>
			<div class="list_menu" id="list_menu3"><?=$workshop_start_date?> - <?=$workshop_end_date?></div>
			<div class="list_menu" id="list_menu4"><?=$workshop_location?></div>
			<div class="list_menu" id="list_menu5">รับ <?=$workshop_count_people?> ที่นั่ง เหลืออีก 20 ที่นั่ง</div>
			<div class="list_menu" id="list_menu6"><?=$workshop_price?> !</div>
			<div class="list_menu" id="list_menu7"><?=$workshop_tel ?></div>
			<a href="#"><div class="list_menu" id="list_menu8">Add to project</div></a>
			<div id="button_buy_ticket1">BUY TICKET</div>
		</div><!-- detail_workshop_box -->
	</div><!-- section_detail1 -->
	<div id="section_detail2">
		<div id="section_detail2_left">
			<p class="head_section_detail2_left">WORKSHOP<br><span>DETAIL</span></p>
			<div class="border_head"></div>
			<p class="subhead_section_detail2_left">
				<?=$workshop_detail1?>
			<a href="#"><div id="button_read_more">READMORE</div></a>
		</div><!-- section_detail2_left -->
		<div id="section_detail2_right">
			<?=$workshop_detail2?>
		</div><!-- section_detail2_right -->
	</div><!-- section_detail2 -->
	<div id="section_topic_buy_ticket">
			<p class="head_section_detail2_left">SELECT <span>TICKET</span></p>
			<div class="border_head"></div>
	</div><!-- section_buy_ticket -->
	<div id="section_buy_ticket">
		<div id="bg_blue"></div>
		<div id="img_buy_ticket">
			<script>
				$('#img_buy_ticket').css('background', 'transparent url(img_workshop/<?=$workshop_img?>) center top / cover');
			</script>
		</div><!-- img_buy_ticket -->
		<div id="section_right_buy_ticket">
			<div id="section_right_top_buy_ticket">
				<p><?=$workshop_name?></p>
				Sales until <?=$workshop_end_timeout?>
				<div id="section_select_ticket">
					FREE &nbsp;&nbsp;&nbsp;x
					<select id="select_count_person">
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
				</div>
			</div>
			<div id="section_right_total_price">
				<p class="total">TOTAL</p>
				<p class="price">0.00 บาท</p>
			</div>
			<div id="button_like"></div>
			<div id="button_buy_ticket">BUY TICKET</div>
		</div><!-- section_right_buy_ticket -->
	</div><!-- section_buy_ticket -->
</body>
</html>

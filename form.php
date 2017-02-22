<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/homepage01.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<div id="wrapper">
		<?php
			include('nav.php');
		?>
		<div id="section_top">
			<p>ADD NEW WORKSHOP/SERMINAR</p>
			<span>ใส่รายละเอียดกิจกรรมให้ครบถ้วน</span>
		</div><!-- section_top -->
		<form action="keep_workshop.php" method="POST" enctype="multipart/form-data">
		<div id="content">
			<div id="section_left">
				<div id="topic">
					<div class="n1">01</div> INPUT <font color=#59A3E8>DETAIL</font>
				</div>
				<div id="section_form_left">
					<p>หมวดหมู่*</p>

					<!-- <select name="category">
						<option value="typenone">------</option>
					  <option value="TCDC">TCDC</option>
					  <option value="CRAFT">CRAFT</option>
					  <option value="DESIGN">DESIGN</option>
					  <option value="BISINESS">BISINESS</option>
						<option value="EDUCATION">EDUCATION</option>
					</select> -->
					<select id="sc" name="categ">
				    <<option value="typenone">กรุณาเลือกประเภท workshop</option>
					  <option value="TCDC">TCDC</option>
					  <option value="CRAFT">CRAFT</option>
					  <option value="DESIGN">DESIGN</option>
					  <option value="BISINESS">BISINESS</option>
						<option value="EDUCATION">EDUCATION</option>
					</select>

					<p>ชื่อกิจกรรม*</p>
					<input type="text" name="name_workshop" required>
					<p>ชื่อองค์กร,หน่วยงาน*</p>
					<input type="text" name="name_agency" required>
					<p>สถานที่จัดงาน*</p>
					<input type="text" name="location" required>
					<p>จำนวนที่รับ*</p>
					<input type="number" name="count_people" required>
					<p>ค่าใช้จ่าย*</p>
					<input type="number" name="price" required>
					<p>เบอร์ติดต่อ*</p>
					<input type="text" name="tel" required>
					<p>ลิงค์เพิ่มเติม</p>
					<input type="text" name="link" required>
					<p>เวลา*</p>
					<input type="time" name="time" required>
					<p>วันเริ่มกิจกรรม*</p>
					<input type="date" name="date_start" required>
					<p>วันสิ้นสุดกิจกรรม*</p>
					<input type="date" name="date_end" required>
					<p>วันสิ้นสุดการสมัคร*</p>
					<input type="datetime-local" name="date_end_for_join" required>



				</div>
			</div>
			<div id="section_right">
				<p>อัพโหลดรูปภาพประกอบ workshop</p>
				<div id="img_workshop">
					<div class="button_add_image">
						<input type="file" name="img_workshop" id="button_file_image" onchange="readURL(this)" required>
					</div>

				</div>
				<p>รายละเอียดประกอบกิจกกรม</p>
				<textarea name="detail1" required></textarea>
				<p>กำหนดการ/ข้อมูลการติดต่อเพิ่มเติม</p>
				<textarea name="detail2" required></textarea>
				<div id="map"></div>
				<input type="text" id="latitude" name="latitude" value="13.752457">
				<input type="text" id="longitude" name="longitude" value="100.492984">
				<input type="submit" value="ส่งข้อมูล" name="submit">
			</div>
		</div>
	</div><!-- wrapper -->
</form>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 8,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(13.752457, 100.492984), // New York
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                };
                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(13.752457, 100.492984),
                    map: map,
                    title: 'พิกัดร้านตัดผม'
                });
                var marker;
				function placeMarker(location) {
				  if ( marker ) {
				    marker.setPosition(location);
				  } else {
				    marker = new google.maps.Marker({
				      position: location,
				      map: map
				    });
				  }
				}
				google.maps.event.addListener(map, 'click', function(event) {
				  placeMarker(event.latLng);
				  //alert("Latitude: " + event.latLng.lat() + "Longitude: " + event.latLng.lng());
				  $('#latitude').val(event.latLng.lat());
				  $('#longitude').val(event.latLng.lng());
				});
            }
        </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApoB2oEAyyeriVXjm3TPkZBsiIB2mbLDI&callback=initMap"
    async defer></script>

				<script type="text/javascript">
				$('#img_workshop').css('background', 'transparent url(img/bgaddphoto.jpg) center top / cover');
		       	function readURL(input) {
		            if (input.files && input.files[0]) {
		                var reader = new FileReader();
		                reader.onload = function (e) {
		                    $('#img_workshop').css('background', 'transparent url('+e.target.result +') center top / cover');
		                };
		                reader.readAsDataURL(input.files[0]);
		            }

		        }
		    </script>

</body>
</html>

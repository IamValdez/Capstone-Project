<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>View Department</title>

	<link rel="icon" href="images/logo.jpg">
	
<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
 	 <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script> 
	<link rel="stylesheet" href="./assets/css/calendarMod.css">
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/department.css">

 
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->


 <?php include_once('includes/student-header.php');?>

<?php include_once('includes/student-sidebar.php');?>



<!-- APP MAIN ==========-->
<main id="app-main" class="app-main" style = "background-color: white;">
  <div class="wrap">




  <div class="grid-container">
          <div class="title-grid-wrap">

            <h1 class="title-department">COLLEGE PROGRAM</h1>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/CRIM.jpg" alt="Department 1">
            </a>
            <div class="grid-item-content">
              <h5>CRIMINOLOGY</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="itDepartment.php">
              <img src="../images/gallery/IT.jpg" alt="Department 2">
            </a>
            <div class="grid-item-content">
              <h5>INFORMATION TECHNOLOGY</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/TOURISM.jpg" alt="Department 3">
            </a>
            <div class="grid-item-content">
              <h5>TOURISM MANAGEMENT</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/BSA.jpg" alt="Department 4">
            </a>
            <div class="grid-item-content">
              <h5>ACCOUNTANCY</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/HM.png" alt="Department 5">
            </a>
            <div class="grid-item-content">
              <h5>HOSPITALITY MANAGEMENT</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/BSED.png" alt="Department 6">
            </a>
            <div class="grid-item-content">
              <h5>EDUCATION</h5>
            </div>
          </div>
          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/psychology.png" alt="Department 7" class="pschology-logo">
            </a>
            <div class="grid-item-content">
              <h5>PSYCHOLOGY</h5>
            </div>
          </div>

          <div class="grid-item">
            <a href="#">
              <img src="../images/gallery/BSBA.png" alt="Department 8">
            </a>
            <div class="grid-item-content">
              <h5>BUSINESS ADMINISTRATION</h5>
            </div>
          </div>
      </div>


      <style>


      </style>















		
		
	</section><!-- #dash-content -->
</div><!-- .wrap -->

  <!-- APP FOOTER -->
 <?php include_once('includes/footer.php');?>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

<?php include_once('includes/customizer.php');?>
	
	

	<!-- build:js assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>

	<!-- build:js assets/js/app.min.js -->
<script src="libs/bower/jquery/dist/jquery.js"></script>
<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="libs/bower/moment/moment.js"></script>
<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- endbuild -->
<script src="assets/js/core.js"></script>
<script src="assets/js/app.js"></script>



</body>
</html>

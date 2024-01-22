<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (!isset($_SESSION['famsid'])) {
 
    header("Location: login.php");
    exit();
}


if (isset($_GET['logout'])) {
    
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Student Account</title>

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
	<link rel="stylesheet" href="style.css">
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
<main id="app-main" class="app-main">
  <div class="wrap">
<section class="app-content">
		<div class="row">
			
		<script>
// Disable back button
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>

			<div class="col-md-4 col-sm-3">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">

						<?php 
						 $facid=$_SESSION['famsid'];;
$sql ="SELECT * from  tblappointment where Status='Approved' && Faculty=:facid ";
$query=$dbh->prepare($sql);
$query-> bindParam(':facid', $facid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totappapt=$query->rowCount();

?>

						<div class="pull-left">
							<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totappapt);?></span></h3>
							<small class="text-color">Total Approved</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-success">
						<a href="approved-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>




			
			<div class="col-md-4 col-sm-3">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<?php 
						 $facid=$_SESSION['famsid'];;
$sql ="SELECT * from  tblappointment where Status='Cancelled' && Faculty=:facid ";
$query=$dbh->prepare($sql);
$query-> bindParam(':facid', $facid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totncanapt=$query->rowCount();
?>
							<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totncanapt);?></span></h3>
							<small class="text-color">Cancelled Appointment</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<a href="cancelled-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">

						<div class="pull-left">
							<?php 
						 $facid=$_SESSION['famsid'];;
$sql ="SELECT * from  tblappointment where Faculty=:facid ";
$query=$dbh->prepare($sql);
$query-> bindParam(':facid', $facid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totapt=$query->rowCount();



?>



							<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totapt);?></span></h3>
							<small class="text-color">Total Appointment</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
					</div>


					
					<footer class="widget-footer bg-primary">
						<a href="all-appointment.php"><small> View Detail</small></a>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

		

			<div class="col-md-8">
        <div class="widget">
            <div class="widget-header text-center">
                <h3><i class="fa fa-"></i> My Appointments</h3>
            </div>
            <div class="widget-bodsy">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
			


	<div class="col-md-4 col-sm-4">
	<div class="widget stats-widget" style = "   position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 1fr;
  grid-gap: 30px;
  min-height: 250px;"><h4 style = "text-align: center;">Reminders</h4>



  
        <canvas id="myChart"></canvas>
		
      </div>
	  </div>
	  </div>
	  
	  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="my_chart.js"></script>
		
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


<script>
$(document).ready(function() {

    // Initializes the FullCalendar plugin with options and configurations
    $('#calendar').fullCalendar({

        // Defines the header section of the calendar, including navigation buttons and current view title
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },

        // Sets the default date of the calendar to the current date
        defaultDate: '<?php echo date("Y-m-d"); ?>',

        // Disables the ability to edit events on the calendar
        editable: false,

        // Defines the events to be displayed on the calendar using data from a database query
        events: [
            <?php foreach($results as $result) { ?>
            // Defines each event as an object with a title, start date/time, end date/time, and all-day status
            {
                title: '<?php echo date('g:i A', strtotime($result->AppointmentTime)); ?>',
                start: '<?php  echo $result->AppointmentDate; ?>T<?php echo $result->AppointmentTime?>',
                end: '<?php echo $result->AppointmentDate; ?>T<?php echo date('g:i A',strtotime('+1 hour',strtotime($result->AppointmentTime))); ?>',
                allDay: true,
                description: '<?php echo $result->FullName; ?>' // Display full name at bottom of event
            },
            <?php } ?>

        ],
        eventRender: function(event, element) {
            // Concatenates the full name to the end of the event title
            element.find('.fc-title').append('<br>' + event.description);
        }
    });
});
</script>



</body>
</html>

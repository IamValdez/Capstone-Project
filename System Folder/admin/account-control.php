<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Admin Account</title>

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
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->


 <?php include_once('includes/admin-header.php');?>

<?php include_once('includes/admin-sidebar.php');?>



<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">


  <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-11 col-11 mx-auto">
                            <div class="booking-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Search Department | Faculties</h2>
                            
                                <form role="form" method="post">
                                    <div class="row">
                                        <div class="col-lg-9 col-12">
                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Department No.">
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                            <button type="submit" class=" bg-primary form-control" name="search" id="submit-button">Check</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                    
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th class = "bg-primary text-center">S.No</th>
                                        <th class = "bg-primary text-center">Full Name</th>
                                        <th class = "bg-primary text-center">Mobile Number</th>
                                        <th class = "bg-primary text-center">Email</th>
                                        <th class = "bg-primary text-center">Department No.</th>                                    
                                    </tr>
                                </thead>
                            
                                <tbody>
                  <?php
             
             $sql = "SELECT * FROM tblfaculty WHERE Specialization LIKE :sdata OR Email LIKE :sdata";
             $query = $dbh->prepare($sql);
             $query->bindParam(':sdata', $sdata);
             $query->execute();
             $results = $query->fetchAll(PDO::FETCH_OBJ);
             
             

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <tr>
                                        <td class = "bg-white text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class = "bg-white text-center"><?php  echo htmlentities($row->FullName);?></td>
                                        <td class = "bg-white text-center"><?php  echo htmlentities($row->MobileNumber);?></td>
                                        <td class = "bg-white text-center"><?php  echo htmlentities($row->Email);?></td>
                                        <td class = "bg-white text-center"><?php  echo htmlentities($row->Specialization);?></td>
                                    </tr>
                                
    
                                </tbody>
             
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                            </table>
                        </div>

                    </div>
                </div>

		
		
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

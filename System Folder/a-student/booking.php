<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


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
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>

<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        section {
            padding: 60px 0;
        }

        .container {
            max-width: 100%;
            margin-left: 5%;
            margin-top: 2%;
  
        }

        .booking-form {
            width: 900px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
     
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->


 <?php include_once('includes/student-header.php');?>

<?php include_once('includes/student-sidebar.php');?>



<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">




    <!-- BOOKING FORM  -->
    <section class="section-padding" id="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="booking-form">
                        <h2 class="text-center mb-lg-3 mb-2">Set an Appointment</h2>
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="Fname" id="name" class="form-control" placeholder="Surname" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address (optional)" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="STid" id="schoolID" class="form-control" placeholder="Student ID" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="11">
                                </div>


                                <div class="col-lg-6 col-12">
                                    <select onChange="getfacultys(this.value);"  name="specialization" id="specialization" class="form-control" required>
                                        <option value="" hidden> - Select Program -</option>
                                        <!--- Fetching States--->
                                        <?php
                                        $sql="SELECT * FROM tblspecialization";
                                        $stmt=$dbh->query($sql);
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        while($row =$stmt->fetch()) { 
                                        ?>
                                            <option value="<?php echo $row['ID'];?>"><?php echo $row['Specialization'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <select name="facultylist" id="facultylist" class="form-control">
                                        <option value="" hidden>Select Faculty</option>
                                        <option value="Faculty">Maam Shiela</option>
                                        <option value="Faculty">Sir Sabao</option>
                                        <option value="Faculty">Sir Fagela</option>
                                        <option value="Faculty">Sir Lim</option>
                                        <option value="Faculty">Sir Boski</option>
                                    </select>
                                </div>


                                <div class="col-lg-6 col-12">
                                    <input type="date" name="date" id="date" value="" class="form-control">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="time" name="time" id="time" value="" class="form-control" placeholder="Enter start time">
                                </div>
                              
                              <!-- ... your existing HTML code ... -->

                              <div class="col-12">
    <select name="facultylist1" id="facultylist1" class="form-control" onchange="showInputField()">
        <option value="" hidden> - Types of appointment - </option>
        <option value="Thesis Consultation">Thesis Consultation</option>
        <option value="School Events">School Events</option>
        <option value="Clearance">Clearance</option>
        <option value="Completion Form">Completion Form</option>
        <option value="Incomplete Grades">Incomplete Grades</option>
        <option value="Activities">Activities</option>
        <option value="Subject">Subject</option>
        <option value="Others">Others</option>
    </select>
</div>

<!-- Container for the second dropdown -->
<div class="col-12" id="subjectDropdownContainer" style="display: none;">
    <select name="subjectList" id="subjectList" class="form-control">
        <option value="" hidden> - Major Subject - </option>
        <option value="Data Structure">Data Structure</option>
        <option value="Networking">Networking</option>
        <option value="Programming">Programming</option>
        <option value="Database">Database</option>
        <option value="Multimedia">Multimedia</option>
        <option value="Capstone">Capstone</option>
        <option value="Engineering">Software Engineering</option>
    </select>
</div>

<div id="othersInput" class="col-12" style="display: none; height: 60px;">
    <input type="text" name="otherAppointment" id="otherAppointment" class="form-control" placeholder="Enter custom appointment type">
</div>

<script>
    function showInputField() {
        var selectedValue = document.getElementById("facultylist1").value;
        var subjectDropdownContainer = document.getElementById("subjectDropdownContainer");
        var othersInputDiv = document.getElementById("othersInput");

        // Reset and hide both additional input fields
        subjectDropdownContainer.style.display = "none";
        othersInputDiv.style.display = "none";

        if (selectedValue === "Subject") {
            subjectDropdownContainer.style.display = "block";
        } else if (selectedValue === "Others") {
            othersInputDiv.style.display = "block";
        }
    }
</script>
                    <div style=" display: flex; justify-content: center;">
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <a href="dashboard.php">
                                        <button type="cancel" class="form-control btn-blue ml-20" name="Cancel" id="cancel-button">Cancel</button>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-3 mx-auto" style ="margin-left: 20px;";>
                                        <button type="submit" class="form-control btn-primary" name="submit" id="submit-button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

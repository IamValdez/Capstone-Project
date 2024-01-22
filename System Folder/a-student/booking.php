<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';

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

// ERROR DISPLAY
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function AppointMentMailer($aptNumber, $aptEmail, $aptName, $aptDate, $aptTime , $facultyList)
{

    try {
        $mail = new PHPMailer(true);

// Server settings
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cjvaldez151@gmail.com';
        $mail->Password = 'dnhweufoarawpkxt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
// Recipients
        $mail->setFrom('cjvaldez151@gmail.com', 'SVCC APPOINTMENT');
        $mail->addAddress($aptEmail, $aptName); // Add a recipient

// Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'PHP MAILER TEST';
        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            line-height: 1.2;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        p {
            margin-bottom: 10px;
        }

        .appointment-number {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Appointment Confirmation</h2>
        <p>Dear ' . $aptName . ',</p>
        <p>Your appointment has been submitted. Below is your appointment details:</p>
        <p><strong>Control Number:</strong> <span class="appointment-number">' . $aptNumber . '</span></p>
        <p><strong>Faculty: </strong>' . $facultyList . '</p>
        <p><strong>Appointment: </strong> Thesis Consulatation </p>
        <p><strong>Date: </strong>' . $aptDate . '</p>
        <p><strong>Time: </strong>' . $aptTime . '</p>
     
        <p><strong>Location:</strong> SVCC Complex Mamatid, City of Cabuyao, Laguna</p>

        <div class="footer">
            <p>Thank you for choosing our system. If you have any questions, feel free to contact us at github.com/IamValdez .</p>
        </div>
        <div class="footer">
        <p>BSIT 4A2 | Capstone - Group 12</p>
    </div>
    </div>
</body>

</html>
 ';
        $mail->send();

        return true;
    } catch (Exception $e) {
        echo '<script>alert("ERROR while sending email.")</script>';

        return false;
    }

}

if (isset($_POST['submit'])) {
    $Fname = $_POST['Fname'];
    $STid = $_POST['STid'];
    $mobnum = $_POST['phone'];
    $email = $_POST['email'];
    $appdate = $_POST['date'];
    $aaptime = $_POST['time'];
    $specialization = $_POST['specialization'];
    $facultylist = $_POST['facultylist'];
    // $message = $_POST['message'];
    $message = "HELLO";
    $aptnumber = mt_rand(100000000, 999999999);
    $cdate = date('Y-m-d');

    if ($appdate <= $cdate) {
        echo '<script>
    Swal.fire({
        icon: "error",
        title: "Error!",
        text: "Appointment date must be greater than today\'s date",
    });
</script>'; 
    } else {

        $sql = "insert into tblappointment(AppointmentNumber,Name,MobileNumber,Email,AppointmentDate,AppointmentTime,Specialization,Faculty,Message)values(:aptnumber, :Fname,:mobnum,:email,:appdate,:aaptime,:specialization,:facultylist,:message)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
        $query->bindParam(':Fname', $Fname, PDO::PARAM_STR);
        // $query->bindParam(':STid', $STid, PDO::PARAM_STR);
        $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
        $query->bindParam(':aaptime', $aaptime, PDO::PARAM_STR);
        $query->bindParam(':specialization', $specialization, PDO::PARAM_STR);
        $query->bindParam(':facultylist', $facultylist, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);

        $query->execute();
        $LastInsertId = $dbh->lastInsertId();

      
                
        if (isset($_POST['submit'])) {
            AppointMentMailer($aptnumber, $email, $Fname, $appdate, $aaptime, $facultylist);
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo 'Swal.fire({
                       
                        title: "Success!",
                        text: "' . $aptnumber . ' Your appointment number.",
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                        customClass: {
                            container: "custom-sweetalert-container",
                            popup: "custom-sweetalert-popup",
                            title: "custom-sweetalert-title",
                            text: "custom-sweetalert-text",
                            
                            confirmButton: "custom-sweetalert-confirm-button"
                        }
                    })';
            echo '});';
            echo '</script>';
        }
        

       else {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Something Went Wrong. Please try again",
                });
            </script>';
        }
        
    }

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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>

  
	<script>
		Breakpoints();
	</script>
<style>
    .custom-sweetalert-container {
        font-family: 'Arial', sans-serif;
    }

    .custom-sweetalert-popup {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 50%;
        max-width: 400px; /* Set a maximum width for responsiveness */
        margin: 0 auto; /* Center the alert */
    }

    .custom-sweetalert-title {
        color: #007bff;
        font-size: 15px;
        margin-right: 10px;
    }

    .custom-sweetalert-text {
        font-size: 12px;
    }

    .custom-sweetalert-confirm-button {
        background-color: #3085d6;
        color: #fff;
        width: 25%;
    }
</style>

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


 <?php include_once 'includes/student-header.php';?>

<?php include_once 'includes/student-sidebar.php';?>



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
                                    <input type="text" name="Fname" id="name" class="form-control" placeholder="Fullname" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address (optional)" required='true'>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <div class="col-lg-6 col-12">
                                    
                                    <input type="text" name="STid" id="schoolID" class="form-control" placeholder="Student ID" required='true'>
                                </div>

                                
<script>
  $(document).ready(function() {
    $('#schoolID').on('input', function() {
      
        var enteredValue = $(this).val();

      if (!isNaN(enteredValue)) {
        $(this).val("AY2024 - 0000" + enteredValue.slice(0, 5));
      }
    
    });
  });
</script>
                                <div class="col-lg-6 col-12">
                                    <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="11">
                                </div>


                                <div class="col-lg-6 col-12">
<select onChange="getfacultys(this.value);"  name="specialization" id="specialization" class="form-control" required>
<option value=""> - Select Department -</option>

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
<option value="">Select Faculty</option>
</select>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function getfacultys(val) {

      $.ajax({

        type: "POST",
        url: "../get_facultys.php",
        data: 'sp_id=' + val,
        success: function(data) {
          $("#facultylist").html(data);
        }
      });
    }
  </script>

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
 <?php include_once 'includes/footer.php';?>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

<?php include_once 'includes/customizer.php';?>



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

<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/scrollspy.min.js"></script>
  <script src="js/custom.js"></script>



</body>
</html>

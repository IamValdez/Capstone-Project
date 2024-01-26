<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');






// ERROR DISPLAY
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function AppointMentMailer($emaill, $fnamee, $subidd, $sidd, $userIDD)
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
        $mail->setFrom('cjvaldez151@gmail.com', 'USER ACCOUNT CONFIRMATION');
        $mail->addAddress($emaill, $fnamee); // Add a recipient

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
        <h2>Student Account</h2>
        <p>Dear ' . $fnamee . ',</p>
        <p>Your account has been created. Below are your account details:</p>

        <p><strong>Registered Email: </strong>' . $emaill . '</p>
        <p><strong>Username: </strong>' . $userIDD . '</p>
        <p><strong>Password:  </strong> svcc2024 </p>

        <p><strong>Location:</strong> SVCC Complex Mamatid, City of Cabuyao, Laguna</p>

        <div class="footer">
            <p>You can change your password in the system. If you have any questions, feel free to contact us at github.com/IamValdez .</p>
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
    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mobno = $_POST['mobno'];
    $email = $_POST['email'];
    $yearLev = $_POST['yearLev'];
    $sems = $_POST['sems'];
    $studentSts = $_POST['studentSts'];
    $sid = $_POST['specializationid'];
    $password = md5($_POST['password']);
    $role = 3; // THIS IS AN STUDENT


    $ret = "select Email from tblfaculty where Email=:email";
    $retUserId = "select Email from tblfaculty where user_ID=:userID";
    $query = $dbh->prepare($ret);
    $userIdquery = $dbh->prepare($retUserId);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $userIdquery->bindParam(':userID', $userID, PDO::PARAM_STR);
    $query->execute();
    $userIdquery->execute();

    $results = $query->fetchAll(PDO::FETCH_OBJ);


    // Check if user Id is already exist
    if ($userIdquery->rowCount() > 0) {
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'Swal.fire({
                   
                    title: "Error!",
                    text: " Your Student ID provided is already exist. ",
                    icon: "error",
                    confirmButtonColor: "#9a3b3b",
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
    } elseif ($query->rowCount() > 0) {
        // check if the email is already exist
        
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo 'Swal.fire({
                   
                    title: "Error!",
                    text: " Your Email Address provided is already exist. ",
                    icon: "error",
                    confirmButtonColor: "#9a3b3b",
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

    } else {

        $sql = "Insert Into tblfaculty(user_ID,FullName,MobileNumber,Email,yearLevel,Specialization,Password,role,Sem,Student_Status)Values(:userID,:fname,:mobno,:email,:yearLev,:sid,:password,:role,:sems,:studentSts)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':userID', $userID, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
          $query->bindParam(':mobno', $mobno, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':yearLev', $yearLev, PDO::PARAM_STR);
        $query->bindParam(':sems', $sems, PDO::PARAM_STR);
        $query->bindParam(':studentSts', $studentSts, PDO::PARAM_STR);
        $query->bindParam(':sid', $sid, PDO::PARAM_INT);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_INT);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

     
        if (isset($_POST['submit'])) {
            AppointMentMailer($email, $fname, $subid, $sid, $userID);
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo 'Swal.fire({
                       
                        title: "Success!",
                        text: " User created Sucessfully.",
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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


    <?php include_once('includes/admin-header.php'); ?>

    <?php include_once('includes/admin-sidebar.php'); ?>



    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <!-- BREAD CRUMBS -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/FAMS/fams/admin/signup.php">Account Control</a></li>
                <li class="breadcrumb-item"><a href="/FAMS/fams/admin/signup.php">Add New User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student</li>
            </ol>
        </nav>
        <div class="wraps">
        <div class="simple-page-form animated sflipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Create Student Account</h4>
            <form action="" method="post">
                <div class="form-groups">
                    <div class="control-container">
                        <input id="userID" type="text" class="control" name="userID" required="true" placeholder=" ">
                        <label class="placeholder">Student ID</label>
                    </div>

                    <div class="control-container">
                        <input id="fname" type="text" class="control" name="fname" required="true" placeholder=" ">
                        <label class="placeholder">Full Name</label>
                    </div>
                </div>

                <div class="form-groups">
                    <div class="control-container">
                        <input id="email" type="email" class="control" name="email" required="true" placeholder=" ">
                        <label class="placeholder">Email</label>
                    </div>

                    <div class="control-container">
                        <input id="mobno" type="text" class="control" name="mobno" maxlength="10" pattern="[0-9]+" required="true" placeholder=" ">
                        <label class="placeholder">Mobile</label>
                    </div>
                </div>

                <div class="form-groups" style = "width: 90%;" >
                    <select class="control" id="yearLev" name="yearLev" >
                        <option value="" hidden>Year Level</option>
                        <option value="1st Year">First Year</option>
                        <option value="2nd Year">Second Year</option>
                        <option value="3rd Year">Third Year</option>
                        <option value="4th Year">Fourth Year</option>
                    </select>

                    <select class="control" id="sems" name="sems" style = " margin-left: 5%;">
                        <option value="" hidden>Semester</option>
                        <option value="1st Semester">First Semester</option>
                        <option value="2nd Semester">Second Semester</option>
                    </select>

                    <select class="control" id="studentSts" name="studentSts" style = " margin-left: 5%;">
                        <option value=""hidden>Student Status</option>
                        <option value="Regular">Regular Student</option>
                        <option value="Irregular">Irregular Student</option>
                    </select>
                </div>

                <div class="form-groups">
                    <select class="control" name="specializationid" style = " width: 80%;">
                        <option value="">Choose Specialization</option>
                        <?php
                        $sql1 = "SELECT * from tblspecialization";
                        $query1 = $dbh->prepare($sql1);
                        $query1->execute();
                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query1->rowCount() > 0) {
                            foreach ($results1 as $row1) { ?>
                                <option value="<?php echo htmlentities($row1->ID); ?>"><?php echo htmlentities($row1->Specialization); ?></option>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>
                    </select>

                    <div class="control-container" >
                        <input id="password" type="password"  class="control" name="password" required="true" placeholder=" " >
                        <label class="placeholder">Password</label>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Register" name="submit">

            </form>
        </div><!-- #login-form -->
    </div><!-- .wrap -->


    
    <style>
    .wraps {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        width: 80%;
        margin-left: 10%;
    }

    .simple-page-form {
        padding: 20px;
    }

    .form-title {
        color: #333;
    }

    .form-groups {
        display: flex;
        width: 100%;
        margin-bottom: 20px;
    }

    .control-container {
        position: relative;
        width: 100%;
    }

    .control {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        position: relative;
    }

    .control:focus {
        outline: none;
        border-color: #4CAF50;
    }

    .placeholder {
        position: absolute;
        bottom: 12px;
        left: 10px;
        color: #aaa;
        pointer-events: none;
        transition: 0.3s ease-out;
        transform-origin: 0 0;
    }

    .control:focus + .placeholder,
    .control:not(:placeholder-shown) + .placeholder {
        transform: translate(0, -70%) scale(0.8);
        color: #9a3b3b;
        font-weight: bold;
        font-size: 17px;
    }

    /* Remove lines over the placeholder when focused */
    .control:focus + .placeholder::before,
    .control:focus + .placeholder::after {
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: none;
    }


    .form-groups {
    display: flex;


}

/* Add margin to create space between the input fields */
.control-container {
    margin-right: 10px;

}
</style>


      


        <!-- APP FOOTER -->
        <?php include_once('includes/footer.php'); ?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <?php include_once('includes/customizer.php'); ?>

    <!-- Breadcrums -->
    <script>

    </script>

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
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mobno = $_POST['mobno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = 1; // THIS IS AN ADMIN

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
                    text: " Your Admin ID provided is already exist. ",
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

        $sql = "Insert Into tblfaculty(user_ID,FullName,MobileNumber,Email,Password,role)Values(:userID,:fname,:mobno,:email,:password,:role)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':userID', $userID, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mobno', $mobno, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_INT);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {

            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo 'Swal.fire({
                       
                        title: "Success!",
                        text: " A admin account has been successfully created. ",
                        icon: "success",
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

            echo "<script>alert('Something went wrong.Please try again');</script>";
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
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>


</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->
    <td class="text-center">
    <a href="#" class="btn btn-danger" onclick="showDeleteConfirmation(<?php echo htmlentities($row->ID); ?>)">Delete</a>
</td>

<script>
function showDeleteConfirmation(userId) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to the delete URL or perform the delete action
      window.location.href = "?deleteid=" + userId;
    }
  });
}
</script>

    <?php include_once('includes/admin-header.php'); ?>

    <?php include_once('includes/admin-sidebar.php'); ?>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">

 

     
    <div class="wraps">
        <div class="simple-page-form animated sflipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Create Admin Account</h4>
            <form action="" method="post">
                <div class="form-groups">
                    <div class="control-container">
                        <input id="userID" type="text" class="control" name="userID" required="true" placeholder=" ">
                        <label class="placeholder">Admin ID</label>
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
                        <label class="placeholder">Mobile Number</label>
                    </div>
                </div>


                <div class="form-groups">

                    <div class="control-container">
                        <input id="password" type="password" class="control" name="password" required="true" placeholder=" ">
                      
                        <label class="placeholder">Password</label>

                        <span class="password-toggle-icon" onclick="togglePassword()"><i class="fa fa-eye-slash"></i></span>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Register" name="submit">

            </form>
        </div><!-- #login-form -->
    </div><!-- .wrap -->
    <style>
        

.password-toggle-icon {
  position: absolute;
  top: 50%;
  right: 25px;
  transform: translateY(-50%);
  cursor: pointer;
}
    </style>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var passwordToggleIcon = document.querySelector(".password-toggle-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleIcon.innerHTML = '<i class="fa fa-eye"></i>';
        } else {
            passwordInput.type = "password";
            passwordToggleIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
        }
    }
</script>
    
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
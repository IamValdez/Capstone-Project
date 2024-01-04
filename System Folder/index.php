<?php
session_start();
//error_reporting(0);
include('faculty/includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $Fname = $_POST['Fname'];
  $STid = $_POST['STid'];
  $mobnum = $_POST['phone'];
  $email = $_POST['email'];
  $appdate = $_POST['date'];
  $aaptime = $_POST['time'];
  $specialization = $_POST['specialization'];
  $facultylist = $_POST['facultylist'];
  $message = $_POST['message'];
  $aptnumber = mt_rand(100000000, 999999999);
  $cdate = date('Y-m-d');

  if ($appdate <= $cdate) {
    echo '<script>alert("Appointment date must be greater than todays date")</script>';
  } else {
    $sql = "insert into tblappointment(AppointmentNumber,StudentID,FullName,MobileNumber,Email,AppointmentDate,AppointmentTime,Specialization,Faculty,Message)values(:aptnumber,:STid, :Fname,:mobnum,:email,:appdate,:aaptime,:specialization,:facultylist,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
    $query->bindParam(':Fname', $Fname, PDO::PARAM_STR);
    $query->bindParam(':STid', $STid, PDO::PARAM_STR);
    $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
    $query->bindParam(':aaptime', $aaptime, PDO::PARAM_STR);
    $query->bindParam(':specialization', $specialization, PDO::PARAM_STR);
    $query->bindParam(':facultylist', $facultylist, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);

    $query->execute();
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {

      // echo "<script>alert($aptnumber)</script>";
      echo "<script>alert('{$aptnumber} Your appointment number.')</script>";
      echo "<script>window.location.href ='index.php'</script>";
    } else {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>
    Faculty AMS
  </title>
  <link rel="icon" href="images/title/U-Logo.png">


  <!-- CSS FILES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="css/student-enhance.css">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <head>
    <!-- Add this line to include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link href="css/bootstrap-icons.css" rel="stylesheet">

  <link href="css/owl.carousel.min.css" rel="stylesheet">

  <link href="css/owl.theme.default.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/templatemo-medic-care.css">

  <link rel="stylesheet" href="css/chatbox.css">



  <script>
    function getfacultys(val) {
      //  alert(val);
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
</head>

<body id="top">

  <main>

    <?php include_once('includes/header.php'); ?>

    <section class="hero" id="hero">
      <div class="container">
        <div class="row">

          <div class="col-12">
            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/slider/background.jpg" class="img-fluid" alt="">
                </div>

                <div class="carousel-item">
                  <img src="images/slider/Slider-picture3.jpg" class="img-fluid" alt="">
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>

    <section class="section-padding" id="about">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-12">
            <?php
            $sql = "SELECT * from tblpage where PageType='aboutus'";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $row) {               ?>
                <h2 class="mb-lg-3 mb-3"><?php echo htmlentities($row->PageTitle); ?></h2>

                <p><?php echo ($row->PageDescription); ?>.</p>

            <?php $cnt = $cnt + 1;
              }
            } ?>
          </div>

          <div class="col-lg 2 col-md-5 col-10 mx-auto">
            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center max-width-100%">
              <img src="images/title/U-Logo.png" alt="Years of Experience" class="featured-image" style="max-width: 100%; max-height: 100%; margin-top: 12%;">
            </div>
          </div>



        </div>
      </div>
    </section>




    <!-- ETO YUNG COLLEGE DEPARTMENT LOGO
            VIEW ONLY LANG YAN SA PARA SA STUDENT. 
      -->


    <div class="grid-container">
      <div class="title-grid-wrap">

        <H2 class="title-department">COLLEGE PROGRAM</H2>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/CRIM.jpg" alt="Department 1">
        </a>
        <div class="grid-item-content">
          <h5>CRIMINOLOGY</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="itDepartment.php">
          <img src="images/gallery/IT.jpg" alt="Department 2">
        </a>
        <div class="grid-item-content">
          <h5>INFORMATION TECHNOLOGY</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/TOURISM.jpg" alt="Department 3">
        </a>
        <div class="grid-item-content">
          <h5>TOURISM MANAGEMENT</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/BSA.jpg" alt="Department 4">
        </a>
        <div class="grid-item-content">
          <h5>ACCOUNTANCY</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/HM.png" alt="Department 5">
        </a>
        <div class="grid-item-content">
          <h5>HOSPITALITY MANAGEMENT</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/BSED.png" alt="Department 6">
        </a>
        <div class="grid-item-content">
          <h5>EDUCATION</h5>
        </div>
      </div>
      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/psychology.png" alt="Department 7" class="pschology-logo">
        </a>
        <div class="grid-item-content">
          <h5>PSYCHOLOGY</h5>
        </div>
      </div>

      <div class="grid-item">
        <a href="#">
          <img src="images/gallery/BSBA.png" alt="Department 8">
        </a>
        <div class="grid-item-content">
          <h5>BUSINESS ADMINISTRATION</h5>
        </div>
      </div>
    </div>


<div class="chat-icon" onclick="toggleMessageBox()">
    <img src="images/title/chat-icon3.png" alt="Chat Icon">
    <div class="online-indicator"></div>
</div>

    <div class="message-box" id="messageBox">
        <button class="close-btn" onclick="toggleMessageBox()">Close</button>
        <div class="chat-content" id="chatContent">
        </div>

        <div class="form-group chat-group">
            <input type="text" class="form-control chat-input" placeholder="Type your message..." onkeypress="sendMessage(event)">
            <span class="send-icon" onclick="sendMessage()"><i class="fa fa-paper-plane"></i></span>
        </div>
    </div>

</div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </main>




  <?php include_once('includes/footer.php'); ?>
  <!-- JAVASCRIPT FILES -->
  <script src="js/chatbox.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/scrollspy.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
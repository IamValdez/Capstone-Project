<?php
session_start();
//error_reporting(0);
include('faculty/includes/dbconnection.php');

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Faculty AMS</title>
        <link rel="icon" href="images/title/logo.jpg">
        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">
        <link rel="stylesheet" href="css/department.css">
        <script>
function getfacultys(val) {
     alert(val);
$.ajax({

type: "POST",
url: "get_facultys.php",
data:'sp_id='+val,
success: function(data){
$("#facultylist").html(data);
}
});
}
</script>
    </head>

    
    
    <body id="top">
    
        <main>

            <?php include_once('includes/header.php');?>
   
   <h2>COLLEGE OF INFORMATION TECHNOLOGY</h2>

    <!--Parent of the Container-->
   <div class = "picture-container"> 
    

   <a href="bisnar-profile.php">
      <div class="grid-item1">
        <img src="images/title/bisnas.jpg" alt="Image 1">
          <div class="grid-item-content">
          <h2>DEPARTMENT HEAD</h2>
          <p>Engr. Bisnar</p>
         </div>
    </div>
    </a>

    <div class="grid-item1">
        <img src="images/title/llanes.jpg" alt="Image 1">
          <div class="grid-item-content">
          <h2>COLLEGE</h2>
          <h2>DEAN</h2>
          <p>Llanes, Ed. D</p>
         </div>
    </div>
  </div>

    

  <div class= "head-text">
    <h3 class ="faculties-headers">LIST OF FACULTIES</h3>
  </div>

  
      
<div class="grid-container">

  <!--Child of the Parent-->

  <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 1">
    <div class="grid-item-content">
      <h2>Data Structures</h2>
      <p>Engr. Dimaranan</p>
    </div>

    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

    <!--Child of the Parent-->

    <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 2">
    <div class="grid-item-content">
      <h2>Robotics</h2>
      <p>Engr. Fagela</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

    <!--Child of the Parent-->

    <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 3">
    <div class="grid-item-content">
      <h2>Programming</h2>
      <p>Engr. Sabao</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

  <!--Child of the Parent-->

  <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 4">
    <div class="grid-item-content">
      <h2>System Administration</h2>
      <p>Engr. Mohan</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

  <!--Child of the Parent-->

  <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 5">
    <div class="grid-item-content">
      <h2>Networking</h2>
      <p>Engr. Morano</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

    <!--Child of the Parent-->

    <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 5">
    <div class="grid-item-content">
      <h2>Database Management</h2>
      <p>Engr. Faculty</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

    <!--Child of the Parent-->

    <div class="grid-item">
    <img src="images/title/icon2.jpg" alt="Image 5">
    <div class="grid-item-content">
      <h2>Multimedia</h2>
      <p>Engr. Faculty</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

    <!--Child of the Parent-->

    <div class="grid-item">
    <img src="images/title/icon.jpg" alt="Image 5">
    <div class="grid-item-content">
      <h2>User Design Experience</h2>
      <p>Engr. Bisnar</p>
    </div>
    
    <div class="availability-form">
      <form>
      <label>   Availability</label>
        <label for="monday">Wednesday:</label>
        <input type="text" id="monday" value="5:00-6:00" readonly>
        <br>
      </form>
    </div>
  </div>

        </main>
                <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>













        
    </body>
</html>
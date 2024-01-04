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

            <div class="grid-container">
  <div class="grid-item">
    <img src="images/title/bisnas.jpg" alt="Image 1">
    <div class="grid-item-content">
      <h2>Software Engineering</h2>
      <p>Mrs. Bisnar</p>
    </div>
  </div>
  <div class="grid-item">
    <img src="images/title/dimaranan.jpg" alt="Image 2">
    <div class="grid-item-content">
      <h2>Capstone Adviser</h2>
      <p>Mr. Dimaranan</p>
    </div>
  </div>
  <div class="grid-item">
    <img src="images/title/fagela.jpg" alt="Image 4">
    <div class="grid-item-content">
      <h2>Robotics</h2>
      <p>Engr. Fagela </p>
    </div>
  </div>
  <div class="grid-item">
    <img src="images/title/rissa.jpg" alt="Image 3">
    <div class="grid-item-content">
      <h2>Department Head</h2>
      <p>Mrs. Morano</p>
    </div>
  </div>
  <div class="grid-item">
    <img src="images/title/mohan.jpg" alt="Image 4">
    <div class="grid-item-content">
      <h2>System Administration</h2>
      <p>Mr. Mohan</p>
    </div>
  </div>
  <div class="grid-item">
    <img src="images/title/sabao.jpg" alt="Image 4">
    <div class="grid-item-content">
      <h2>Programming</h2>
      <p>Mr. Sabao</p>
    </div>
  </div>
</div>


<style>

/* Global styles */
:root {
  --primary-color: #2e86de;
  --secondary-color: #f2f2f2;
  --font-family: 'Open Sans', sans-serif;
}

body {
  margin: 0;
  padding: 0;
  font-family: var(--font-family);
}

/* Grid layout */
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 50px;
  padding: 50px;
  justify-content: center;
}

.grid-item {
  background-color: var(--secondary-color);
  border-radius: 5px;
  overflow: hidden;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease-in-out;
}

.grid-item:hover {
  transform: translateY(-5px);
}

.grid-item img {
  margin: 50px auto 0;
  display: block;
  width: 50%;
  height: auto;
  border-radius: 50%;
  object-fit: cover;
  object-position: center center;
  transition: transform 0.2s ease-in-out;
}

.grid-item:hover img {
  transform: scale(1.1);
}

.grid-item-content {
  padding: 20px;
  text-align: center;
}

.grid-item h2 {
  margin: 0;
  font-size: 1.5rem;
  font-weight: bold;
  color: var(--primary-color);
}

.grid-item p {
  margin: 0;
  font-size: 1.
}

</style>



        </main>
                <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>













        
    </body>
</html>
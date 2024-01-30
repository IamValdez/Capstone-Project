<?php
session_start();
//error_reporting(0);
include('faculty/includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<body id="top">
  <main>



<!--
    <div class="main-banner" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 align-self-center">
                <div class="owl-carousel owl-banner">
                  <div class="item header-text">
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

-->
    
    
    
    

    <section class="hero" id="hero">
      <div class="container">
        <div class="row">

          <div class="col-12">
            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/slider/background.jpg" class="img-fluid" alt="">
                </div>
                <!--
                  <div class="carousel-item">
                    <img src="images/slider/Slider-picture3.jpg" class="img-fluid" alt="">
                  </div>
                -->
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


<!--
    <section class="gallery">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-6 ps-0">
                            <img src="images/slider/Slider-picture1.jpg" class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                        </div>

                        <div class="col-lg-6 col-6 pe-0">
                            <img src="images/slider/Slider-picture3.jpg" class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                        </div>

                    </div>
                </div>
            </section>

            -->



    <!-- ETO YUNG COLLEGE DEPARTMENT LOGO
            VIEW ONLY LANG YAN SA PARA SA STUDENT. 
      -->
<!--

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
          -->



<section class="hero-sectiosn">
        <div class="container" >
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="text-center mb-5 pb-2">
                <h1 style="color: #9a3b3b">College Program</h1>
              </div>
              <div class="owl-carousel owl-theme">

                     <!--IT SLIDE-->
                <div class="owl-carousel-info-wrap item">
               <a href="https://www.facebook.com/bsitsvcc" target ="_blank"><img
                    src="images/gallery/IT1.png"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />
                  </a>

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">
                      IT
                    </h4>

                    <span class="badge">Programmer</span>

                    <span class="badge">IT Technician</span>
                    
                  </div>

                
                </div>

                       <!--PSYCHOLOGY SLIDE-->

                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery//psychology1.png"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">
                      Tourism
                    </h4>

                    <span class="badge">Travel Industry</span>
                    <span class="badge">Tour Guide</span>

                    
                  </div>

                
                </div>

                 <!--EDUCATION SLIDE-->

                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/EDUCATION1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">
                      Education
                     
                    </h4>

                    <span class="badge">Teacher</span>

                    <span class="badge">Professor</span>
                    <span class="badge">Tutor</span>
                  </div>

                </div>

              <!--HM SLIDE-->
                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/HM1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">
                      HM
                    
                    </h4>

                    <span class="badge">Hotel Management</span>

                    <span class="badge">Chef</span>
                  </div>
                </div>

               <!--CRIM SLIDE-->
                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/CRIM1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">Criminology</h4>

                    <span class="badge">Police</span>

                    <span class="badge">Army</span>

                    <span class="badge">Officer</span>
                  </div>

                </div>

                
                <!--TOURISM SLIDE-->
                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/TOURISM1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">Psychology</h4>

                 
                    <span class="badge">Psychiatrist</span>
                    <span class="badge">psychologist</span>
                  </div>

                
                </div>

                <!--BSBA SLIDE-->

                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/BSBA1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">
                      BSBA
                  
                    </h4>

                    <span class="badge">Marketing</span>
               
                    <span class="badge">Advertising</span>
                  </div>
                </div>

                <!--BSA SLIDE-->

                <div class="owl-carousel-info-wrap item">
                  <img
                    src="images/gallery/BSA1.jpg"
                    class="owl-carousel-image img-fluid"
                    alt=""
                  />

                  <div class="owl-carousel-info">
                    <h4 class="mb-2">Accountancy</h4>

                    <span class="badge">Accounting</span>
                    <span class="badge">Financing</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


            <section class="section-padding pb-0" id="timeline">
                <div class="container">
                    <div class="row">

                        <h2 class="text-center mb-lg-5 mb-4">SYSTEM INFORMATION</h2>
                        
                        <div class="timeline">
                            <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                    <h3 class=" text-light">About Appointment</h3>

                                    <p>This system is designed to streamline the process of seeking guidance, advice, or assistance on academic, administrative, or personal matters.</p>
                                </div>

                                <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                                    <i class="bi-patch-check-fill timeline-icon"></i>
                                </div>

                                <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                  
                                </div>
                            </div>

                            <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes my-lg-5 my-4">
                                <div class="col-9 col-md-5 ms-md-4 ms-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                    <h3 class=" text-light">Registered User</h3>

                                    <p>The students and faculty are legitimate users of this system. User registration is not allowed for anyone other than the administrator, who is responsible for creating accounts to ensure privacy and security.</p>
                                </div>

                                <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                                    <i class="bi-book timeline-icon"></i>
                                </div>

                                <div class="col-9 col-md-5 pe-md-3 pe-lg-0 order-1 order-md-3 py-4 timeline-date">
                                  
                                </div>
                            </div>

                            <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                    <h3 class=" text-light">Email Based</h3>

                                    <p>This system supports email for all user transactions to enhance the effectiveness of the appointment system.</p>
                                </div>

                                <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                                    <i class="bi-file-medical timeline-icon"></i>
                                </div>

                                <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                   
                                </div>
                            </div>

                            <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes my-lg-5 my-4">
                                <div class="col-9 col-md-5 ms-md-4 ms-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                    <h3 class=" text-light">Responsive System</h3>

                                    <p class="mb-0 pb-0">Appointment system refers to a software or web application design approach that aims to provide an optimal user experience across various devices and screen sizes.</p>
                                    
                                    <p>The term is often used in the context of web development, but it can apply to software applications as well. A responsive system dynamically adapts its layout and functionality to accommodate the characteristics of the devices.</p>
                                </div>

                                <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center">
                                    <i class="bi-globe timeline-icon"></i>
                                </div>

                                <div class="col-9 col-md-5 pe-md-3 pe-lg-0 order-1 order-md-3 py-4 timeline-date">
                                  
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            
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
            
<br><br><br>


  </main>

  
<?php include_once('includes/footer.php'); ?>
<?php include_once('includes/link.php'); ?>
<?php include_once('includes/header.php'); ?>




  <!-- JAVASCRIPT FILES -->
  <script src="js/chatbox.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/scrollspy.min.js"></script>
  <script src="js/custom.js"></script>


    <!-- JAVASCRIPT FILES -->
    <script src="jss/1jquery.min.js"></script>
    <script src="jss/1bootstrap.bundle.min.js"></script>
    <script src="jss/1owl.carousel.min.js"></script>
    <script src="jss/1custom.js"></script>


</body>

</html>
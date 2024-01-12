<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Appointment Detail</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once 'includes/student-header.php';?>
    <?php include_once 'includes/student-sidebar.php';?>

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <div class="col-lg-3 col-10">
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search Student Appointment...">
                                </div>
                            </header>
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Faculty ID</th>
                                                <th class="text-center">Appointment Number</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Appointment Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $facid = $_SESSION['famsid'];
                                            $emailToFilter = 'cjvaldez152@gmail.com'; // Set the email to filter
                                            $sql = "SELECT * FROM tblappointment WHERE Email = :email";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':email', $emailToFilter, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);


                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {?>
                                                    <tr>
                                                        <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($row->Faculty); ?></td>
                                                        <td class="text-center"><?php echo htmlentities($row->AppointmentNumber); ?></td>
                                                        <td><?php echo htmlentities($row->Email); ?></td> 
                                                        <td class="text-center"><?php echo htmlentities($row->AppointmentDate); ?></td>
                                                        <?php if ($row->Status == "") {?>
                                                            <td class="text-center"><?php echo "Not Updated"; ?></td>
                                                        <?php } else {?>
                                                            <td><?php echo htmlentities($row->Status); ?></td>
                                                        <?php }?>
                                                        <td class="text-center">
                                                            <a href="#?editid=<?php echo htmlentities($row->ID); ?>&&aptid=<?php echo htmlentities($row->AppointmentNumber); ?>" class="btn btn-primary">Edit</a>
                                                        </td>
                                                    </tr>
                                                    <?php $cnt = $cnt + 1;
                                                }
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include_once 'includes/footer.php';?>
    </main>

    <?php include_once 'includes/customizer.php';?>

    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>

    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
</body>
</html>

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_GET['deleteid']) && !empty($_GET['deleteid'])) {
    $userIdToDelete = $_GET['deleteid'];

    $sql = "DELETE FROM tblfaculty WHERE ID = :userId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':userId', $userIdToDelete, PDO::PARAM_INT);

    if ($query->execute()) {
        echo '<script>window.location.href = "all-user.php";</script>';
    } else {
        echo 'Error deleting user.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Appointment Detail</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="assets/css/all-user.css">
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once('includes/admin-header.php'); ?>
    <?php include_once('includes/admin-sidebar.php'); ?>

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <div class="col-lg-3 col-12">
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search User..." style="border-radius: 20px;">
                                </div>

                                <div class="col-lg-2 col-9">
                                    <div class="dropdown">
                                        <button class="dropdown-btn">Select Role</button>
                                        <ul class="dropdown-content">
                                            <li><a href="#" data-role="all">All</a></li>
                                            <li><a href="#" data-role="student">Student</a></li>
                                            <li><a href="#" data-role="faculty">Faculty</a></li>
                                            <li><a href="#" data-role="admin">Admin</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </header>

                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                        <thead>
                                            <tr>
                                                <th class="text-center">S.No</th>
                                                <th class="text-center">Full Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Creation Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $facid = $_SESSION['famsid'];
                                            $sql = "SELECT * from  tblfaculty";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {
                                                    $statusIndicator = $row->Status == "" ? '<span class="active-circle"></span>' : '';
                                                    $statusText = $row->Status == "" ? "" : htmlentities($row->Status);

                                                    $roleText = '';
                                                    switch ($row->role) {
                                                        case 1:
                                                            $roleText = 'Admin';
                                                            break;
                                                        case 2:
                                                            $roleText = 'Faculty';
                                                            break;
                                                        case 3:
                                                            $roleText = 'Student';
                                                            break;
                                                        default:
                                                            $roleText = 'Unknown';
                                                    }
                                            ?>
                                                    <tr class="user-row">
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td class="user-full-name"><?php echo htmlentities($row->FullName); ?></td>
                                                        <td class="text-center"><?php echo htmlentities($roleText); ?></td>
                                                        <td><?php echo htmlentities($row->Email); ?></td>
                                                        <td class="text-center"><?php echo htmlentities($row->CreationDate); ?></td>
                                                        <td class="text-center"><?php echo $statusIndicator . $statusText; ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-primary" onclick="showDeleteConfirmation(<?php echo htmlentities($row->ID); ?>)">Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
                                                } // end foreach
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include_once('includes/footer.php'); ?>

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
        <script src="assets/js/all-user.js"></script>
    </body>
</html>

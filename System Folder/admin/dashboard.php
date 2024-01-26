<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  


// Fetch user role counts from the database
$sql = "SELECT role, COUNT(*) as count FROM tblfaculty GROUP BY role";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Initialize role count array with default values
$roleCounts = [
    'Admin' => 0,
    'Faculty' => 0,
    'Student' => 0,
];

// Update role count array with actual values from the database
foreach ($results as $result) {
    switch ($result['role']) {
        case 1:
            $roleCounts['Admin'] = $result['count'];
            break;
        case 2:
            $roleCounts['Faculty'] = $result['count'];
            break;
        case 3:
            $roleCounts['Student'] = $result['count'];
            break;
    }
}


$sqlAppointments = "SELECT AppointmentDate, COUNT(*) as count FROM tblappointment GROUP BY AppointmentDate";
$queryAppointments = $dbh->prepare($sqlAppointments);
$queryAppointments->execute();
$appointmentsData = $queryAppointments->fetchAll(PDO::FETCH_ASSOC);

// Retrieves the faculty ID from the session
$facid = $_SESSION['famsid'];

// Constructs a database query to select all approved appointments for the current faculty member
$sql = "SELECT * FROM tblappointment WHERE Status='Approved' AND Faculty=:facid";
$query = $dbh->prepare($sql);
$query->bindParam(':facid', $facid, PDO::PARAM_STR);
$query->execute();

// Fetches the query results as an array of objects
$results = $query->fetchAll(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

    <?php include_once('includes/admin-header.php'); ?>

    <?php include_once('includes/admin-sidebar.php'); ?>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">


                <!-- Display total number of Admin -->
            <div class="col-md-4 col-sm-4">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title" style="color: #9a3b3b;">
                                <span class="counter" data-plugin="counterUp">
                                    <?php echo htmlentities($roleCounts['Admin']);?>
                                </span>
                            </h3>
                            <small class="text-color"> Admin</small>
                        </div>
                        <span class="pull-right big-icon watermark" style="color: #9a3b3b;">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <footer class="widget-footer bg-primary">
                     
                    </footer>
                </div><!-- .widget -->
            </div>

            <!-- Display total number of Faculty -->
            <div class="col-md-4 col-sm-4">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title" style="color: #FFA500;">
                                <span class="counter" data-plugin="counterUp"><?php echo htmlentities($roleCounts['Faculty']);?></span>
                            </h3>
                            <small class="text-color"> Faculty</small>
                        </div>
                        <!-- Total Faculty -->
                        <span class="pull-right big-icon watermark" style="color: #FFA500;">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                    <footer class="widget-footer bg-warning">
                    
                    </footer>
                </div><!-- .widget -->
            </div>

                    <!-- Display total number of Student -->
            <div class="col-md-4 col-sm-4">
                <div class="widget stats-widget">
                    <div class="widget-body clearfix">
                        <div class="pull-left">
                            <h3 class="widget-title" style="color: #28a745;"> 
                                <span class="counter" data-plugin="counterUp"><?php echo htmlentities($roleCounts['Student']);?></span>
                            </h3>
                            <small class="text-color"> Student</small>
                        </div>
                        <!-- Total Student -->
                        <span class="pull-right big-icon watermark" style="color: #28a745;">
                            <i class="fa fa-graduation-cap"></i>
                        </span>
                    </div>
                    <footer class="widget-footer bg-success">
         
                    </footer>
                </div><!-- .widget -->
            </div>


            <div class="graphBox">
                <div class="box">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="box">
                    <canvas id="earning"></canvas>
                </div>
            </div>

             
<!-- CALENDAR -->


 <div class="col justify-content-center"> 
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header text-center">
                <h3><i class="fa fa-calendar"></i> Approved Appointments</h3>
            </div>
            <div class="widget-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
<!-- </div> -->

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Event details will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
            
       
        </div>
    </main>
    <!--========== END app main -->

    <?php include_once('includes/footer.php'); ?>

    <?php include_once('includes/customizer.php'); ?>

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

    <!-- jQuery -->
<script src="libs/bower/jquery/dist/jquery.js"></script>

<!-- Bootstrap JS -->
<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>

<!-- Your Custom Scripts -->
<script src="assets/js/library.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/app.js"></script>

<!-- FullCalendar -->
<script src="libs/bower/moment/moment.js"></script>
<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>

            <script src="my_chasrt.js"></script>

            <script>
        var ctx = document.getElementById("myChart").getContext("2d");

        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["Admin", "Faculty", "Student"],
                datasets: [{
                    label: "# of Appointments",
                    data: [<?php echo $roleCounts['Admin']; ?>, <?php echo $roleCounts['Faculty']; ?>, <?php echo $roleCounts['Student']; ?>],
                    backgroundColor: [
                        "rgba(154, 59, 59)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(16, 196, 105)",
                    ],
                }, ],
            },
            options: {
                responsive: true,
            },
        });
    </script>

    <script>

var earningCanvas = document.getElementById("earning");
var earning = earningCanvas.getContext("2d");

// Extract months and count the number of appointments per month
var monthlyCounts = {};
<?php foreach ($appointmentsData as $appointment) { ?>
    var month = "<?php echo date('M', strtotime($appointment['AppointmentDate'])); ?>";
    if (!monthlyCounts[month]) {
        monthlyCounts[month] = 0;
    }
    monthlyCounts[month] += <?php echo $appointment['count']; ?>;
<?php } ?>

var monthlyData = Object.values(monthlyCounts);

var earningChart = new Chart(earning, {
    type: "bar",
    data: {
        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "June",
            "Aug",
            "Sept",
            "Nov",
            "Dec",
        ],
        datasets: [
            {
                label: "Total of Monthly Appointments",
                data: monthlyData,
                borderColor: "rgb(154, 59, 59, 1)",
                backgroundColor: ["rgba(154, 59, 59, 1)", "rgba(255, 206, 86, 1)"],
            },
        ],
    },
    options: {
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                    },
                },
            ],
        },
    },
});

    </script>

    
<?php
// ... (your existing code) ...

// Constructs a database query to select all approved appointments
$sqlAppointments = "SELECT AppointmentDate, COUNT(*) as count FROM tblappointment WHERE Status='Approved' GROUP BY AppointmentDate";
$queryAppointments = $dbh->prepare($sqlAppointments);
$queryAppointments->execute();
$appointmentsData = $queryAppointments->fetchAll(PDO::FETCH_ASSOC);

// Retrieves the faculty ID from the session
$facid = $_SESSION['famsid'];

// Constructs a database query to select all approved appointments for the current faculty member
$sql = "SELECT * FROM tblappointment WHERE Status='Approved' AND Faculty=:facid";
$query = $dbh->prepare($sql);
$query->bindParam(':facid', $facid, PDO::PARAM_STR);
$query->execute();

// Fetches the query results as an array of objects
$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<script>
    $(document).ready(function () {
        // Initializes the FullCalendar plugin with options and configurations
        $('#calendar').fullCalendar({
            // ... (your existing FullCalendar options) ...
            events: [
                <?php foreach ($appointmentsData as $appointment) { ?>
                    // Defines each event as an object with a title (faculty name), start date, and all-day status
                    {
                        title: '<?php echo $appointment['count']; ?> Faculty',
                        start: '<?php echo $appointment['AppointmentDate']; ?>',
                        allDay: true,
                    },
                <?php } ?>

                <?php foreach ($results as $result) { ?>
                    // Additional events for the current faculty member
                    {
        title: '<?php echo $result['FullName']; ?>',
        start: '<?php echo $result['AppointmentDate']; ?>T<?php echo $result['AppointmentTime']?>',
        end: '<?php echo $result['AppointmentDate']; ?>T<?php echo date('g:i A',strtotime('+1 hour',strtotime($result['AppointmentTime']))); ?>',
        allDay: true,
        description: '<?php echo $result['Remark']; ?>'
    },
                <?php } ?>
            ],
            eventRender: function (event, element) {
                // Concatenates the appointment count or the full name to the end of the event title
                element.find('.fc-title').append('<br>' + event.title || event.description);
            },
            eventClick: function (calEvent, jsEvent, view) {
    console.log('Event Details:', calEvent);
    // Open a modal with the event information
    $('#eventModal .modal-title').html(calEvent.title);
    $('#eventModal .modal-body').html('Date: ' + calEvent.start.format('MMMM Do YYYY, h:mm a') +
        '<br>' + 'Remark: ' + (calEvent.description || 'No remark available'));
        
    $('#eventModal').modal();
}
        });
    });
</script>

</body>

</html>

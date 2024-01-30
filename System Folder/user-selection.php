<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Selection</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="faculty/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="faculty/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="faculty/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="faculty/assets/css/bootstrap.css">
    <link rel="stylesheet" href="faculty/assets/css/core.css">
    <link rel="stylesheet" href="faculty/assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <link rel="stylesheet" href="./css/user.selection.css">
</head>

<body class="simple-page">
    <div id="back-to-home">
        <a href="./index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
    </div>

    <div class="user-selection">
        <h1>Select Your User Type</h1>
        <div class="user-icons">
            <div class="user-icon" data-type="Student">
                <img src="images/title/student.png" alt="Student">
                <p>Student</p>
            </div>
            <div class="user-icon" data-type="Teacher">
                <img src="images/title/teacher.png" alt="Teacher">
                <p>Faculty</p>
            </div>
            <div class="user-icon" data-type="Admin">
                <img src="images/title/admin.png" alt="Admin">
                <p>Admin</p>
            </div>
        </div>
        <button class="next-button" disabled>Next</button>
    </div>

    <script src="./js/user.selection.js"></script>
</body>

</html>

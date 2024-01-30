

<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>
<body>
    <h2>Send an Email</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <input type="submit" value="Send Email">
    </form>

    
<button onclick="showAlert()">Show Alert</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function showAlert() {
        Swal.fire({
            position: "top-end",
            title: 'Appointment Number',
            text: '2293287837432',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    }
</script>
</body>
</html>




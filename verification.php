<?php session_start() ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="icon" href="https://accesscomputerlearningcenter.com/img/aclclogo.png" type="image/png">

    <title>Verification</title>

    <style>
    .navbar.navbar-light.navbar-laravel {
        background-color: #020747 !important;
    }

    body, html {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }
    
    .login-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh; /* Set height to 100% of viewport height */
    }

    .card-header{
    font-size: 16px; /* Change font size to 16px */
    /*text-align: center; /* Center align the text */       
    }

    .navbar-nav .nav-item .nav-link:hover {
    color: #87CEEB !important; /* Change to light blue color when hovered */   
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <div style="display: flex; align-items: center;">
            <img src="https://aclcbukidnon.com/logo.png" alt="aclclogo" height="20" style="margin-right: 10px;">
            <a class="navbar-brand" href="#" style="color: white;">Verify Account</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: white;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style= "color: white">Register</a>
                </li>
    </ul>
</div>
    </div>
</nav>

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >Verify Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" class="btn btn-primary btn-block btn-flat" name="verify">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<?php
include('includes/conn.php');

if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp'];
    $email = $_SESSION['email'];
    $otp_code = $_POST['otp_code'];

    if ($otp != $otp_code) {
        echo "<script>alert('Invalid OTP code');</script>";
    } else {
        $password_hash = $_SESSION['password_hash'];
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $photo = $_SESSION['photo'];

        // Generate voters ID
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $voter_id = substr(str_shuffle($set), 0, 15);

        // Insert data into the database
        $query = "INSERT INTO voters (voters_id, email, password, firstname, lastname, photo, status) 
                  VALUES ('$voter_id', '$email', '$password_hash', '$firstname', '$lastname', '$photo', 1)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                    alert('Verify account done, you may sign in now');
                    window.location.replace('index.php');
                  </script>";
        } else {
            echo "<script>alert('Error inserting into database');</script>";
        }
    }
}
?>

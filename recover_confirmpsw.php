
<?php session_start() ;
include('includes/conn.php');
?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="icon" href="https://accesscomputerlearningcenter.com/img/aclclogo.png" type="image/png">

    <title>Login Form</title>
    <style>
    .navbar.navbar-light.navbar-laravel {
        background-color: #020747 !important;
    }

    .login-form {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
    width: 100%;

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
        <img src="https://aclcbukidnon.com/logo.png" alt="aclclogo" height="20" style="margin-right: 20px;">
        <a class="navbar-brand" href="#" style="color: white;">Password Reset Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </div>
         
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password: </label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Confirm" name="confirm" class="btn btn-primary btn-block btn-flat">
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
    if(isset($_POST["confirm"])){
        include('includes/conn.php');
        $Email = $_SESSION['email'];
        $psw = $_POST["password"];

        // Hash the new password
        $hash = password_hash($psw, PASSWORD_DEFAULT);

        // Update the password in the database
        $update = mysqli_query($conn, "UPDATE voters SET password='$hash' WHERE email='$Email'");

        if($update){
            echo "<script>alert('Password has been successfully reset.'); window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Failed to reset password. Please try again.');</script>";
        }
    }
?>

<!-- <form action="#" method="POST">
    <label for="password">New Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Reset" name="reset">
</form> -->

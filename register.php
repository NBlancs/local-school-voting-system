<?php
session_start();
include('includes/conn.php');

if (isset($_POST["register"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';

    $check_query = mysqli_query($conn, "SELECT * FROM voters WHERE email ='$email'");
    $rowCount = mysqli_num_rows($check_query);

    if (!empty($email) && !empty($password)) {
        if ($rowCount > 0) {
            echo "<script>alert('User with email already exists!');</script>";
        } else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Handle file upload
            if (!empty($photo)) {
                $target_dir = 'C:/xampp/htdocs/votesystem/images/';
                $target_file = $target_dir . basename($photo);

                if ($_FILES['photo']['error'] != UPLOAD_ERR_OK) {
                    switch ($_FILES['photo']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                            $error_message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $error_message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $error_message = "The uploaded file was only partially uploaded";
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $error_message = "No file was uploaded";
                            break;
                        case UPLOAD_ERR_NO_TMP_DIR:
                            $error_message = "Missing a temporary folder";
                            break;
                        case UPLOAD_ERR_CANT_WRITE:
                            $error_message = "Failed to write file to disk";
                            break;
                        case UPLOAD_ERR_EXTENSION:
                            $error_message = "File upload stopped by extension";
                            break;
                        default:
                            $error_message = "Unknown upload error";
                            break;
                    }
                    error_log("Error uploading file: " . $error_message);
                    echo "<script>alert('Error uploading file: " . $error_message . "');</script>";
                    $photo = ''; // Reset photo if upload fails
                } else {
                    if (!file_exists($target_dir)) {
                        error_log("Target directory does not exist");
                        echo "<script>alert('Target directory does not exist');</script>";
                    } elseif (!is_writable($target_dir)) {
                        error_log("Target directory is not writable");
                        echo "<script>alert('Target directory is not writable');</script>";
                    } elseif (!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                        error_log("Error moving uploaded file to target directory");
                        echo "<script>alert('Error moving uploaded file to target directory');</script>";
                        $photo = ''; // Reset photo if upload fails
                    } else {
                        error_log("File uploaded successfully to: " . $target_file);
                    }
                }
            }

            // Generate OTP
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
            $_SESSION['password_hash'] = $password_hash;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['photo'] = $photo;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'noelblanco369@gmail.com';
            $mail->Password = 'tybyvwcklzjhgcim';

            $mail->setFrom('noelblanco369@gmail.com', 'OTP Verification');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Your verify code";
            $mail->Body = "<p>Dear user,</p><h3>Your verify OTP code is $otp</h3><br><br><p>With regards,</p><b></b>";

            if (!$mail->send()) {
                echo "<script>alert('Register Failed, Invalid Email');</script>";
            } else {
                echo "<script>
                        alert('Register Successfully, OTP sent to $email');
                        window.location.replace('verification.php');
                      </script>";
            }
        }
    }
}
?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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

    <title>Register Form</title>
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
    <img src="https://aclcbukidnon.com/logo.png" alt="aclclogo" height="20" style="margin-right: 10px;">
    <a class="navbar-brand" href="#" style="color: white;">Voter's Registration Form</a>    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php" style="color: white;">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="recover_psw.php" style= "color: white">Forgot Password</a>
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
                    <div class="card-header">Registration Form</div>
                    <div class="card-body">
                        <form action="register.php" method="POST" name="register" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" minlength="6" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="firstname" class="form-control" name="firstname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="lastname" class="form-control" name="lastname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>
                                <div class="col-md-6">
                                    <input type="file" id="photo" name="photo">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Register" name="register" class="btn btn-primary btn-block btn-flat">
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
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });

    const form = document.querySelector('form[name="register"]');
    form.addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        if (password.length < 6) {
            alert('Password must be at least 6 characters long');
            event.preventDefault(); // Prevent form submission
        }
    });
</script>

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
        height: 80vh;
        /* Set height to 100% of viewport height */
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
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" required autofocus>
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
include('includes/conn.php');

if (isset($_POST["confirm"])) {
    $email = $_POST["email"];
    
    // Check if email exists in the database
    $sql = mysqli_query($conn, "SELECT * FROM voters WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if ($query <= 0) {
        ?>
        <script>
            alert("<?php echo "Email not found. Please try again."; ?>");
        </script>
        <?php
    } else if ($fetch["status"] == 0) {
        ?>
        <script>
            alert("Sorry, your account must be verified first before you can recover your password!");
            window.location.replace("index.php");
        </script>
        <?php
    } else {
        // Generate token by binaryhexa
        $token = bin2hex(random_bytes(50));

        // Store token and email in session
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        // Send recovery email
        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        // Use your email account
        $mail->Username = 'noelblanco369@gmail.com';
        $mail->Password = 'tybyvwcklzjhgcim';

        // Send from this email
        $mail->setFrom('noelblanco369@gmail.com', 'Password Reset');
        // Send to the user's email
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        $mail->Body = "<b>Dear User,</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password:</p>
            <a href='http://localhost/votesystem/recover_confirmpsw.php?token=$token'>http://localhost/votesystem/recover_confirmpsw.php</a>
            <br><br>
            <p>With regards,</p>
            <b>ACLC VOTING SYSTEM ADMIN</b>";

        if (!$mail->send()) {
            ?>
            <script>
                alert("<?php echo "Invalid Email"; ?>");
            </script>
            <?php
        } else {
            ?>
            <script>
                window.location.replace("notification.html");
            </script>
            <?php
        }
    }
}
?>



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
</script>

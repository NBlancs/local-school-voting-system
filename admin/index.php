<style>
    html {
        background-image: linear-gradient(to right top, #020747, #002968, #004986, #0069a2, #008bba) !important;
        overflow-y: hidden; /* Disable vertical scrolling */
    }

    .login-page {
        background-image: linear-gradient(to right top, #020747, #002968, #004986, #0069a2, #008bba) !important;
    }

    .login-box {
        margin: 0 auto; /* Center the login box horizontally */
        max-width: 400px; /* Set maximum width for the login box */
    }

    .login-box-body {
        padding: 20px;
        border-radius: 30px; /* Add border radius to the login box */
        box-shadow: 0 100px 200px rgba(0, 0, 0, 0.1); /* Add box shadow for elevation */
        transform: translateY(-10px); /* Move the box up by 10px */
        border: 5px outset #ccc; /* Add an inset border */
    }

    .login-logo {
        text-align: center;
    }

    .login-box-msg {
        text-align: center;
    }

	.form-control {
        border-radius: 8px !important;
    }

    /* Add border radius to buttons */
    .btn {
        border-radius: 30px !important;
    }

</style>


<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
		exit(); // Make sure to exit after redirection

  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<!--<b>ACLC Voting System</b>-->
  	</div>
  
  	<div class="login-box-body">
	  	<center><img src="https://logodix.com/logo/1973813.png" alt="aclclogo" height="50"> </center> 
		<br></br>
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Admin's username" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
          			<center><button type="submit" class="btn btn-primary btn-block btn-flat" name="login" style="width: 200px; margin-bottom: 10px;"><i class="fa fa-sign-in"></i> Sign In</button></center>    
					<!--<button type="submit" class="btn btn-primary btn-block btn-flat" onclick="window.location.href='http://localhost/votesystem/index.php'">Voter's Login</button>-->   
					<center><a href="../index.php" class="btn btn-link"> Voter's Login </a></center>
      		</div>
    	</form>
  	</div>
	  <center>
	  <div style="position: fixed; bottom: 35; left: 0; right: 0; border-top: 1px solid white;"></div>
	  <footer style="position: fixed; bottom: -8; left: 0; right: 0; background-color: transparent; font-size: 10px; color: white; text-align: center;">
      	<div class="container">
        	<div>
            	<b>ACLC</b>
        	</div>
        	<p>GROUP 1 VOTING SYSTEM</p>
       		</div>
	   </footer>
	   </center>

  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
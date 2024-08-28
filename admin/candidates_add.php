<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$position = $_POST['position'];
		$partylist = $_POST['partylist']; // Get the partylist ID
		$platform = $_POST['platform'];
		$filename = isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : 'profile.jpg';

		if(!empty($_FILES['photo']['name'])){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO candidates (position_id, partylist_id, firstname, lastname, photo, platform) VALUES ('$position', '$partylist', '$firstname', '$lastname', '$filename', '$platform')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Candidate added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: candidates.php');
?>

<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$partylist_title = $_POST['partylist'];
		$partylist_slogan = $_POST['partylistslogan'];

		$sql = "SELECT * FROM tbl_partylist";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		
		$sql = "INSERT INTO tbl_partylist (partylist, partylistslogan) VALUES ('$partylist_title', '$partylist_slogan')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Party-list added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: partylist.php');
?>
<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$partylist_title = $_POST['partylist'];
		$partylist_slogan = $_POST['partylistslogan'];

		$sql = "UPDATE tbl_partylist SET partylist = '$partylist_title', partylistslogan = '$partylist_slogan' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Party-list updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: partylist.php');

?>
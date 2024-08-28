<?php
	include 'includes/session.php';

	if(isset($_POST['candidate_id'])){
		$candidate_id = $_POST['candidate_id'];
		$sql = "SELECT candidates.*, tbl_partylist.partylist 
		        FROM candidates 
		        LEFT JOIN tbl_partylist ON tbl_partylist.id = candidates.partylist_id 
		        WHERE candidates.id = '$candidate_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($query->num_rows > 0){
			$response = array(
				'partylist' => $row['partylist']
			);
		}
		else{
			$response = array(
				'error' => 'No party list found for this candidate'
			);
		}

		echo json_encode($response);
	}
?>

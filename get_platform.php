<?php
include 'includes/session.php';

if (isset($_POST['candidate_id'])) {
    $candidate_id = $_POST['candidate_id'];

    $sql = "SELECT platform FROM candidates WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $candidate_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        echo json_encode(['platform' => $row['platform']]);
    } else {
        echo json_encode(['error' => 'No platform data found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>

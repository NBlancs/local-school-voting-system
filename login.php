<?php
    session_start();
    include 'includes/conn.php';

    if(isset($_POST['login'])){
        $username = $_POST['voter'];
        $password = $_POST['password'];

        // Check if the user is an admin
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                $_SESSION['admin'] = $row['id'];
                header('location: admin/index.php');
                exit(); // Make sure to exit after redirection
            } else {
                $_SESSION['error'] = 'Incorrect password for admin';
            }
        } else {
            // Check if the user is a voter
            $stmt = $conn->prepare("SELECT * FROM voters WHERE email = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    $_SESSION['voter'] = $row['id'];
                    header('location: index.php');
                    exit(); // Make sure to exit after redirection
                } else {
                    $_SESSION['error'] = 'Incorrect password for voter';
                }
            } else {
                $_SESSION['error'] = 'Cannot find account with the given credentials';
            }
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = 'Input credentials first';
    }

    header('location: index.php'); // Adjust this to your login page
?>
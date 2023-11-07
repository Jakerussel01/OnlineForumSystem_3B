<?php
include('../dbconn.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statement to protect against SQL injection
$stmt = $conn->prepare("SELECT user_id, password FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($user_id, $hashed_password);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    
    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct
        $_SESSION['id'] = $user_id;
        echo 'true';
    } else {
        // Password is incorrect
        echo 'false';
    }
} else {
    // User does not exist
    echo 'false';
}

$stmt->close();
$conn->close();
?>

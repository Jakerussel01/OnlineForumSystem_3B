<?php 
include('../dbconn.php');


$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password']; 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];


if ($password != $confirmPassword) {

    echo '<script>alert("Passwords do not match. Please try again.");</script>';
    echo '<script>window.location = "../index.php";</script>'; 
} else {

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 


    mysqli_query($conn, "INSERT INTO user (username, password, firstname, lastname) VALUES ('$username', '$hashedPassword', '$firstname', '$lastname')");

 
    echo '<script>alert("Successfully Signed Up! You can now Log in your Account");</script>';
    echo '<script>window.location = "../index.php";</script>';
}
?>
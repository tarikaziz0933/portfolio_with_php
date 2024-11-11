<?php
require 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$email_check_query = "SELECT count(*) as email_count, id FROM users WHERE email='$email'";
$email_check_query_result = mysqli_query($db_connect, $email_check_query);
$email_check_query_result_assoc = mysqli_fetch_assoc($email_check_query_result);

if($email_check_query_result_assoc['email_count'] == 1 ){
    $get_email_data_query = "SELECT * FROM users WHERE email='$email'";
    $get_email_data_query_result = mysqli_query($db_connect, $get_email_data_query);
    $get_email_data_query_result_assoc = mysqli_fetch_assoc($get_email_data_query_result);

    if(password_verify($password, $get_email_data_query_result_assoc['password'])){
        $_SESSION['check_login'] = 'Logedin Properly';
        $_SESSION['login_msg'] = "Login Successfull.......";
        $_SESSION['id'] = $email_check_query_result_assoc['id'];

        header('location:users/users.php');
    } else{
        $_session['invalid_password'] = "Password not matched";
        header('location:login.php');
    }
} else{
    $_SESSION['email_doesnot_exist'] = "Email Not Found";
    header('location:login.php');
}
?>
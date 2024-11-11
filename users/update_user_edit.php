<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$uploaded_file = $_FILES['profile_picture'];
$uploaded_file_name = $uploaded_file['name'];
$after_exploded = explode('.', $uploaded_file_name);
$extension = end($after_exploded);
$allowed_extension = array('jpg', 'jpeg', 'png', 'PNG', 'gif');

if(empty($password)){
    if($_FILES['profile_picture']['name'] != ''){
        
        
        if(in_array($extension, $allowed_extension)){
            
            if($uploaded_file['size'] <= 3000000000){
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                // print_r($select_img_result);
                
                $select_img_result_assoc = mysqli_fetch_assoc($select_img_result);
                $delete_from = '../uploads/users/'.$select_img_result_assoc['profile_picture'];
                unlink($delete_from);
                
                $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);

                $new_file_name = $id . '.' .$extension;
                $new_location = '../uploads/users/'.$new_file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_picture = "UPDATE users SET profile_picture='$new_file_name' WHERE id=$id";
                $update_picture_result = mysqli_query($db_connect, $update_picture);
                

                $_SESSION['update'] = 'User Updated sucessfully';
                header('location:users.php?id=' .$id);

                
            } else {
                $_SESSION['invalid_size'] = 'File Size Too Large, Max 7 KB';
                header('location:user_edit.php?id=' .$id);
            }
        } else{
            $_SESSION['invalid_extension'] = 'Invalide Extension';
            header('location:user_edit.php?id=' .$id);
        }
    } else{
        $update_user = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
        $_SESSION['update'] = 'User Updated sucessfully';
        header('location:users.php?id=' .$id);
    }
} else{
    if($_FILES['profile_picture']['name'] != ''){
        
        
        if(in_array($extension, $allowed_extension)){
            if($uploaded_file['size'] <= 3000000000){
                //image delete
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                $select_img_result_assoc = mysqli_fetch_assoc($select_img_result);

                $delete_from = '../uploads/users/'.$select_img_result_assoc['profile_picture'];
                unlink($delete_from);

                $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);

                $new_file_name = $id. '.' .$extension;
                $new_location = '../uploads/users/'.$new_file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_picture = "UPDATE users SET profile_picture='$new_file_name' WHERE id=$id";
                $update_picture_result = mysqli_query($db_connect, $update_picture);

                $_SESSION['update'] = 'User Updated sucessfully';
                header('location:user_edit.php?id=' .$id);

                
            } else {
                $_SESSION['invalid_size'] = 'File Size Too Large, Max 7 KB';
                header('location:user_edit.php?id=' .$id);
            }
        } else{
            $_SESSION['invalid_extension'] = 'Invalide Extension';
            header('location:user_edit.php?id=' .$id);
        }
    } else{
        $update_user = "UPDATE users SET name='$name', email='$email', password='$password_hash' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
        $_SESSION['update'] = 'User Updated sucessfully';
        header('location:user_edit.php?id=' .$id);
    }
}

?>
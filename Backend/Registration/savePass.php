<?php 
    session_start();
    require_once '../db.php';
    $password = $_POST['password'];
    $mail = $_SESSION['email'];
    $number = $_SESSION['number'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `user` SET `password` = '$hashPass' WHERE `mail` = '$mail' AND `number` = '$number'";
    $response = mysqli_query($conn, $sql);
    $message = mysqli_error($conn);
    $result = [];
    if ($response) {
        $result['status'] = 'success';
        $result['message'] = 'Password Saved Successfully';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Password Saving Failed';
    }
    echo json_encode($result);
?>
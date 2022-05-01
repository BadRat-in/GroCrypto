<?php 
    require_once '../db.php';
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT `mail`, `name`, `password`, `number` FROM `user` WHERE `mail` = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    $isMatch = password_verify($password, $row[2]);
    $response = [];
    if($isMatch){
        session_start();
        $_SESSION['email'] = $username;
        $_SESSION['name'] = $row[2];
        $_SESSION['number'] = $row[3];
        $response['status'] = 'success';
        $response['message'] = 'Login Success';
        $response['name'] = $row[1];
    }else{
        $response['status'] = 'error';
        $response['message'] = 'Email or Password is incorrect';
    }
    echo json_encode($response);
?>
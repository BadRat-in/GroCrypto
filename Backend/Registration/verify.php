<?php 
    require_once '../db.php';
    $username = $_GET['email'];
    $number = $_GET['number'];

    $sql = "SELECT * FROM `user` WHERE `mail` = '$username' OR `number` = '$number'";
    $response = mysqli_query($conn, $sql);
    $result = [];
    if (mysqli_num_rows($response) > 0) {
        $result['status'] = 'warning';
        $result['message'] = 'Mobile Number or Email already exists';
        echo json_encode($result);
    } else {    
        $result['status'] = 'success';
        $result['message'] = 'Mobile Number or Email does not exist';
        echo json_encode($result);
    }
?>
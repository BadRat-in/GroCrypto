<?php
    require_once('../db.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['number'];
    $dob = $_POST['dob'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $city = $_POST['city'];
    $citycode = $_POST['zip_code'];

    $sql = "INSERT INTO `user` (`name`, `mail`, `number`, `dob`, `aadhar`, `pan`, `city`, `zip-code`) VALUES ('$name', '$email', '$mobile', '$dob', '$aadhar', '$pan', '$city', '$citycode')";
    $response = mysqli_query($conn, $sql);
    $message = mysqli_error($conn);
    $result = [];
    if ($response) {
        $result['status'] = 'success';
        $result['message'] = 'Registration Successful';
    } else {
        $result['status'] = 'error';
        $result['message'] = 'Registration Failed';
    }
    echo json_encode($result);
?>
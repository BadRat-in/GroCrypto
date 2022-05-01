<?php
require_once("../db.php");
error_reporting(E_ALL);
session_start();
$amount = $_GET['amount'];
$name = $_SESSION['name'];
$mail = $_SESSION['email'];
$number = $_SESSION['number'];
$time = date("Y-m-d-h-i-s");
$txnid = md5($mail.$time);

$amount = 1;
// You will find your secret key and salt here: https://dashboard.payu.in/merchant/api/account/index/
$hashSequence = "LuaF3P|$txnid|$amount|Subscription|$name|$mail|||||||||||qvUzsWaELbcEHZ4buSM9YUtG46O6Cqmg"; // Reaplce first value with Serect Key and last value with salt value
$hash = strtolower(hash('sha512', $hashSequence));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>

<body onload="sendform(form)">

    <form action='https://secure.payu.in/_payment' id="form" method='post'>
        <input type="hidden" name="key" value="LuaF3P" /> <!-- Replace with your Secret Key -->
        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
        <input type="hidden" name="productinfo" value="Subscription" />
        <input type="hidden" name="amount" value="<?php echo $amount ?>" />
        <input type="hidden" name="email" value="<?php echo $mail ?>" />
        <input type="hidden" name="firstname" value="<?php echo $name ?>" />
        <input type="hidden" name="lastname" value="" />
        <input type="hidden" name="surl" value="http://www.badrat.tech/home" />
        <input type="hidden" name="furl" value="http://www.badrat.tech/index" />
        <!-- <input type="hidden" name="furl" value="http://localhost/crowdfunding/">
        <input type="hidden" name="surl" value="./register.php?ref=<?php echo $ref; ?>"> -->
        <input type="hidden" name="phone" value="<?php echo $number ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>" />
    </form>
</body>
<script>
    let sendform = (form) => {
            form.submit();
    }

</script>

</html>
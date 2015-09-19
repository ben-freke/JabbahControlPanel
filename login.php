<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 13:54
 */

include('db_connect.php');

$email=$_POST['email'];
//echo $email;
$password=md5($_POST['password']);
$query = "SELECT * FROM users WHERE email = '".$_POST['email']."' AND password = '".$password."'";
$result = mysqli_query($con, $query) or die(mysql_error());
$row = mysqli_fetch_array($result);

if ($row['userID']){
    $userID = $row['userID'];

    $key = md5(microtime().rand());
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s", strtotime('+1 hours'));
    $query = "INSERT INTO login_req (userID,loginHash, expTime, ipAddress) VALUES ('".$userID."','".$key."', '".$date."', '".$ip."')";

    mysqli_query($con, $query);

    setcookie("Logon", $key, time()+3600, '/');

    header( 'Location: /' ) ;
}

else{
    header( 'Location: /?error=0' ) ;
}


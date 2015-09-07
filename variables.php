<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 11:00
 */



global $logon;
global $userID;
global $name;
global $type;



if(isset($_COOKIE['Logon'])) {

    $query = "SELECT * FROM login_req WHERE loginHash = '".$_COOKIE['Logon']."'";
    $key = $_COOKIE['Logon'];
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_array($result);

    $userID = $row['userID'];
    $logon = true;

    $query = "SELECT * FROM users WHERE userID = ".$userID."";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $name = ($row['firstName']." ". $row['lastName']);
    $type = $row['type'];
    setcookie("Logon", $key, time()+3600);



}
else{
    $logon = false;
}




?>
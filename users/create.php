<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:26
 */

include('../variables.php');
include('../db_connect.php');

if (($logon == true) && ($type == 0)){
    $password=md5($_POST['password']);
    $query = "INSERT INTO users (firstName,lastName,email,password,type) VALUES ('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['email']."', '".$password."', 1)";

    mysqli_query($con, $query);
    $newID = mysqli_insert_id($con);


    header( 'Location: /users/' ) ;
}

else{header( 'Location: /' ) ;}
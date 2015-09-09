<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 11:30
 */
include('../db_connect.php');
include('../variables.php');


if (($logon == true) && ($type == 0)){
    $query = "INSERT INTO site_info (userID,url,usr,pwd) VALUES ('".$_POST['userID']."','".$_POST['url']."','".$_POST['wp_usr']."', '".$_POST['wp_pwd']."')";

    mysqli_query($con, $query);


    header( 'Location: /sites/' ) ;
}

else{
    header( 'Location: /' ) ;
}




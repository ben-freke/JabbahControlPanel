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
    $query = "INSERT INTO site_info (userID,url,usr,pwd,wordpressAPI) VALUES ('".$_POST['userID']."','".$_POST['url']."','".$_POST['wp_usr']."', '".$_POST['wp_pwd']."', '".$_POST['wp_api']."')";

    mysqli_query($con, $query);


    header( 'Location: /sites/' ) ;
}

else{
    header( 'Location: /' ) ;
}




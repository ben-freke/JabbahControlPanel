<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 13:09
 */

include('../variables.php');
include('../db_connect.php');

if ($logon == true){
    $query = "SELECT * FROM helpdesk_req WHERE reqNo = ".$_GET['id']."";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $row = mysqli_fetch_array($result);

    if ($row['progress'] < 100){

        $query = "INSERT INTO req_updates (reqNo,status,userID) VALUES ('".$_GET['id']."','Request Closed', $userID)";

        mysqli_query($con, $query);

        $query = "UPDATE helpdesk_req SET progress=100 WHERE reqNo=".$_GET['id']."";

        mysqli_query($con, $query);
    }



    header( 'Location: view_req.php?id='.$_GET['id'].'') ;
}

else{
    header( 'Location: /' ) ;
}



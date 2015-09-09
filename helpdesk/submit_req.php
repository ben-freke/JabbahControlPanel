<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 11:30
 */
include('../db_connect.php');
include('../variables.php');


if ($logon == true){
    $query = "INSERT INTO helpdesk_req (userID,title,body,progress) VALUES ('".$userID."','".$_POST['title']."','".$_POST['body']."', 10)";

    mysqli_query($con, $query);
    $newID = mysqli_insert_id($con);

    $query = "INSERT INTO req_updates (reqNo,status,userID) VALUES ('".$newID."','Request Opened', $userID)";

    mysqli_query($con, $query);

    header( 'Location: /helpdesk/' ) ;
}

else{
    header( 'Location: /' ) ;
}




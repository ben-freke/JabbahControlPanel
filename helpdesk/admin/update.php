<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:43
 */

include('../../db_connect.php');
include('../../variables.php');

if ($logon == true && $type == 0){
    $query = "INSERT INTO req_updates (reqNo,status,userID) VALUES (".$_GET['id'].", '".$_POST['status']."', ".$userID.")";
    mysqli_query($con, $query);

    $query = "UPDATE helpdesk_req SET progress=".$_POST['progress']." WHERE reqNo=".$_GET['id']."";

    mysqli_query($con, $query);

    header( 'Location: view_req.php?id='.$_GET['id'].'') ;
}

else {
    header('Location: /');
}



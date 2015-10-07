<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 07/10/15
 * Time: 11:03
 */

include('../db_connect.php');
include('../variables.php');


if (($logon == true) && ($type == 0)){
    $query = "INSERT INTO payments (amount,userID,date,received) VALUES ('".$_POST['amt']."','".$_GET['id']."','".$_POST['date']."', 1)";

    mysqli_query($con, $query);
    $newID = mysqli_insert_id($con);



    header( 'Location: /users/manage.php?id='.$_GET['id'] );
}

else{
    header( 'Location: /' ) ;
}



<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 11:30
 */
include('../../db_connect.php');
include('../../variables.php');


if (($logon == true) && ($type == 0)){
    if ($_GET['edit'] == 0){
        $query = "INSERT INTO kb (title,authorID,body) VALUES ('".$_POST['title']."','".$_POST['userID']."','". $_POST['body']."')";

        mysqli_query($con, $query);
    }
    if ($_GET['edit'] == 1){
        $query = "UPDATE kb SET title='".$_POST['title']."', body= '".$_POST['body']."' WHERE articleID=".$_GET['id']."";

        mysqli_query($con, $query);
    }


    header( 'Location: /kb/admin' ) ;
}

else{
    header( 'Location: /' ) ;
}




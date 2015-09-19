<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 18/09/15
 * Time: 14:49
 */

include('../db_connect.php');
include('../variables.php');

if ($logon == true){

    if ($_POST['newPW'] == $_POST['confPW']){
        $newPassword = md5($_POST['newPW']);
    }
    else header( 'Location: /account?error=1' );

    $query = "UPDATE users SET password='".$newPassword."' WHERE userID=".$userID."";

    mysqli_query($con, $query);
    header( 'Location: /account?success=1' ) ;
}

else{
    header( 'Location: /' ) ;
}
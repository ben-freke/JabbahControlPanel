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
     $query = "UPDATE site_info SET url='".$_POST['url']."', usr='".$_POST['wp_usr']."', pwd='".$_POST['wp_pwd']."', wordpressAPI='".$_POST['wp_api']."', googleAPI='".$_POST['google_api']."', uptimeAPI='".$_POST['up_api']."', userID=".$_POST['userID']." WHERE siteID=".$_GET['id']."";

    mysqli_query($con, $query);


 header( 'Location: /sites/' ) ;
}

else{
    header( 'Location: /' ) ;
}




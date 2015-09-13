<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:36
 */


include('../db_connect.php');
include('../variables.php');

if ($logon == true){


    $query = "SELECT * FROM kb WHERE articleID=".$_GET['id']." ";

    $result = mysqli_query($con, $query) or die(mysql_error());


   $row = mysqli_fetch_array($result);
    $pagename = $row['title'];
    include('../header.php');

    echo '


<div class="text-center">
    <h2>'.$row['title'].'</h2>
    ';
    if ($type == 0){
       echo '<a class="btn btn-default" href="admin/edit.php?id='.$row['articleID'].'" role="button">Edit Article</a>';

    }
    echo '

</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <p>'.$row['body'].'</p>
    </div>
</div>
        ';



    include('../footer.php');
}

else{
    header( 'Location: /' ) ;
}
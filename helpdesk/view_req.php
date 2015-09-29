<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 04/09/15
 * Time: 11:05
 */
include('../db_connect.php');
include('../variables.php');

if ($logon == true){

include('../header.php');
function getUserName($id, $con){


    $query = "SELECT * FROM users WHERE userID = ".$id."";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $row = mysqli_fetch_array($result);
    return ($row['firstName']." ". $row['lastName']);
}


$query = "SELECT * FROM helpdesk_req WHERE reqNo = ".$_GET['id']."";
$result = mysqli_query($con, $query) or die(mysql_error());
$row = mysqli_fetch_array($result);

echo '

<div class="row">
  <div class="col-md-6 col-md-offset-3">

    <div class="text-center">
        <h2>'.$row['title'].' (Req No. '.$row['reqNo'].')</h2>
    </div>

  </div>
  <div class="row">
            <div class="col-md-4 col-md-offset-4">


                        <div class="text-center">
                            </br>
                            ';

                            if ($row['progress'] < 100){
                                echo '
                            <a class="btn btn-default" href="cancel_req.php?id='.$_GET['id'].'" role="button">Close Request</a>';
                            }
                            echo '

                        </div>
            </div>
        </div>


<div class="row">
  <div class="col-md-6 col-md-offset-3">

    <div class="text-center">
    <br>
        <p><i>'.$row['body'].'</i></p>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <table class="table">
      <thead>
        <tr>
          <th>Status</th>
          <th>Time</th>
          <th>Completed By</th>
        </tr>
      </thead>
      <tbody>
      ';

$query = "SELECT * FROM req_updates WHERE reqNo = ".$_GET['id']." ORDER BY time DESC";

$result = mysqli_query($con, $query) or die(mysql_error());


while($row = mysqli_fetch_array($result)){


    echo '
         <tr>
          <td>'.$row["status"].'</td>
          <td>'.$row["time"].'</td>
          <td>'.getUserName($row["userID"], $con).'</td>
        </tr>
        ';


}



echo '

      </tbody>
    </table>
    </div>
  </div>

';




include('footer.php');


}

else{
    $url = $_SERVER['REQUEST_URI'];
    header( 'Location: /?url='.$_SERVER['REQUEST_URI'].'' ) ;}

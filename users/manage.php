<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:33
 */

include('../db_connect.php');
include('../variables.php');
include('../header.php');

if (($logon == true) && ($type == 0)){
    function getUserName($id, $con){


        $query = "SELECT * FROM users WHERE userID = ".$id."";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_array($result);
        return ($row['firstName']." ". $row['lastName']);
    }

    $Name = getUserName($_GET['id'], $con);
    include ('addPaymentModal.php');
    echo '

<div class="text-center">
    <h1>'.$Name.'</h1>
</div>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <div class="text-center">
                        <p><a class="btn btn-default" data-toggle="modal" data-target="#changePW" role="button">Change Password</a></p>
                        <p><a class="btn btn-default" data-toggle="modal" data-target="#viewPayInfo" role="button">View Payment Details</a></p>
                        <p><a class="btn btn-default" data-toggle="modal" data-target="#addPayment" role="button">Add Payment</a></p>
                        <p><a class="btn btn-default" data-toggle="modal" data-target="#viewPayInfo" role="button">Show Payments</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table">
      <thead>
        <tr>
          <th class="text-center">Payment ID</th>
          <th class="text-center">Date</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Received</th>
        </tr>
      </thead>
      <tbody>';

    $query = "SELECT * FROM payments WHERE userID = ".$_GET['id']." ORDER BY date DESC";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)){

        echo '

    <tr>
          <th class="text-center" scope="row">'.$row['paymentID'].'</th>
          <td class="text-center">'.$row['date'].'</td>
          <td class="text-center">£'.$row['amount'].'</td>
          <td class="text-center">

          ';

        if ($row['received'] == 1){
            echo '<span class="glyphicon glyphicon-ok-sign" style="color:green" aria-hidden="true"></span></td>';

        }
        if ($row['received'] == 0){
            echo '<span class="glyphicon glyphicon-question-sign" style="color:darkorange" aria-hidden="true"></span></td>';

        }

        echo '
                </tr>

    ';

    }

    echo '



      </tbody>
    </table>
    </div>
</div>

';

}
else{header( 'Location: /' ) ;}


include('../footer.php');
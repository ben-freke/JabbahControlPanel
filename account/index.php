<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 06/09/15
 * Time: 13:43
 */

$pagename = 'Your Account';

include('../db_connect.php');
include('../variables.php');

if ($logon == true){
    include('../header.php');

    include('changePassword.php');
    include('changeEmail.php');
    include('viewPayment.php');

    if ($_GET['error'] == 1){
        echo '
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-danger" role="alert">
                        An <b>error</b> occured when changing your password. Check your passwords match and try again.
                    </div>
                </div>
            </div>

        ';
    }

    if ($_GET['success'] == 1){
        echo '
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-success" role="alert">
                        Your password was changed successfully.
                    </div>
                </div>
            </div>

        ';
    }


    echo '
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="text-center">
            <h3>'.$name.' ('.$userID.')</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
      <div class="col-md-3 col-md-offset-1">

      <div class="panel panel-default">
  <div class="panel-heading">Actions</div>
  <div class="panel-body">
  <div class="text-center">
  <p><a class="btn btn-default" data-toggle="modal" data-target="#changePW" role="button">Change Your Password</a></p>
  <p><a class="btn btn-default" data-toggle="modal" data-target="#viewPayInfo" role="button">View Your Payment Details</a></p>

    </div>
  </div>
</div>

      </div>

       <div class="col-md-6">

      <div class="panel panel-default">
  <div class="panel-heading">Payments</div>
  <div class="panel-body">

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

    $query = "SELECT * FROM payments WHERE userID = $userID ORDER BY date DESC";

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

      </div>

  </div>




';


    include('../footer.php');
}

else{
    header( 'Location: /' ) ;
}

<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:04
 */

include('../db_connect.php');
include('../variables.php');
include('../header.php');
if (($logon == true) && ($type == 0)){
    echo '

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="create.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New User</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="subject">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
          </div>

          <div class="form-group">
            <label for="subject">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
          </div>

          <div class="form-group">
            <label for="subject">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>

          <div class="form-group">
            <label for="subject">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
            </form>

  </div>
</div>

<div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <a class="btn btn-default" data-toggle="modal" data-target="#myModal" role="button">Create New User</a>
                        </div>
                    </div>
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
          <th>User ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      ';

    $query = "SELECT * FROM users";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)){


        echo '
         <tr>
          <td>'.$row["userID"].'</td>
          <td>'.$row["firstName"].' '.$row["lastName"].'</td>
          <td>'.$row["email"].'</td>
          <td>';
        if ($row['type'] == 0){
            echo 'Admin';
        }
        elseif ($row['type'] == 1){
            echo 'User';
        }

        echo '</td>
            <td>
                <a href="manage.php?id='.$row["userID"].'">Manage</a>
            </td>
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
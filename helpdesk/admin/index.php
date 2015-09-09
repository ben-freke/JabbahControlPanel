<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:36
 */


include('../../db_connect.php');
include('../../variables.php');

if (($logon == true) && ($type == 0)){
    $pagename = 'Helpdesk Manager';
    include('../../header.php');

    echo '

<div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <table class="table">
      <caption>Existing Helpdesk Requests</caption>
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Submitted</th>
          <th>User</th>
          <th>Progress</th>
        </tr>
      </thead>
      <tbody>
      ';

    $query = "SELECT * FROM helpdesk_req WHERE progress < 100 ORDER BY timeSubmitted DESC";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)) {

        if ($row['progress'] < 100) {
            echo '<tr style="color:green">';
        } else {
            echo '<tr style="color:grey">';
        }



        echo '

          <th scope="row"><a href="view_req.php?id=' . $row["reqNo"] . '">' . $row["reqNo"] . '</a></th>
          <td>' . $row["title"] . '</td>
          <td>' . $row["timeSubmitted"] . '</td>
          <td>'.$row["userID"].'</td>
          <td>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: ' . $row["progress"] . '%">
                <span class="sr-only">' . $row["progress"] . '% Complete</span>
              </div>
            </div>
          </td>
        </tr>
        ';

    }

    include('../../footer.php');
}

else{
    //header( 'Location: /' ) ;
}



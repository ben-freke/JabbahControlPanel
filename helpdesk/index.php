<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 03/09/15
 * Time: 23:25
 */
include('../db_connect.php');
include('../variables.php');


if ($logon == true){
    include('../header.php');
    echo '



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="submit_req.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Helpdesk Request</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Subject">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="body" name="body" placeholder="Message" rows="5"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
                            <a class="btn btn-default" data-toggle="modal" data-target="#myModal" role="button">Submit a Helpdesk Request</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <table class="table">
      <caption>Existing Helpdesk Requests</caption>
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Submitted</th>
          <th>Progress</th>
        </tr>
      </thead>
      <tbody>
      ';

    $query = "SELECT * FROM helpdesk_req WHERE userID = $userID ORDER BY timeSubmitted DESC";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)){

        if ($row['progress'] < 100){
            echo '<tr style="color:green">';
        }
        else {
            echo '<tr style="color:grey">';
        }

        echo '

          <th scope="row"><a href="view_req.php?id='.$row["reqNo"].'">'.$row["reqNo"].'</a></th>
          <td>'.$row["title"].'</td>
          <td>'.$row["timeSubmitted"].'</td>
          <td>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["progress"].'%">
                <span class="sr-only">'.$row["progress"].'% Complete</span>
              </div>
            </div>
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



    include('../footer.php');

}
 else {
     $url = $_SERVER['REQUEST_URI'];
     header( 'Location: /?url='.$_SERVER['REQUEST_URI'].'' ) ;
 }

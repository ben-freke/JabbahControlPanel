<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 11:36
 */


include('../db_connect.php');
include('../variables.php');

if (($logon == true) && ($type == 0)){
    $pagename = 'Sites Manager';
    include('../header.php');

    echo '


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="add_site.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Site</h4>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="subject">Site URL</label>
            <input type="text" class="form-control" id="title" name="url" placeholder="Site URL">
          </div>
          <div class="form-group">
            <label for="message">Wordpress User</label>
            <input type="text" class="form-control" id="title" name="wp_usr" placeholder="Wordpress User">
        </div>
         <div class="form-group">
            <label for="message">Wordpress Password</label>
            <input type="text" class="form-control" id="title" name="wp_pwd" placeholder="Wordpress Password">
        </div>
        <div class="form-group">
            <label for="message">Wordpress API</label>
            <input type="text" class="form-control" id="title" name="wp_api" placeholder="Wordpress Password">
        </div>
        <div class="form-group">
            <label for="message">Google API</label>
            <input type="text" class="form-control" id="title" name="google_api" placeholder="Wordpress Password">
        </div>
        <div class="form-group">
            <label for="message">Uptime API</label>
            <input type="text" class="form-control" id="title" name="up_api" placeholder="Wordpress Password">
        </div>
         <div class="form-group">
            <label for="message">User ID</label>
            <input type="text" class="form-control" id="title" name="userID" placeholder="User ID">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
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
                            <a class="btn btn-default" data-toggle="modal" data-target="#myModal" role="button">Add A New Site</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <table class="table">
      <caption>Current Sites</caption>
      <thead>
        <tr>
          <th>Site ID</th>
          <th>URL</th>
          <th>User ID</th>

        </tr>
      </thead>
      <tbody>
      ';

    $query = "SELECT * FROM site_info";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)) {



        echo '

          <td>' . $row["siteID"] . '</td>
          <td><a href="https://' . $row["url"] . '">' . $row["url"] . '</a></td>
          <td>'.$row["userID"].'</td>

        </tr>
        ';

    }

    include('../footer.php');
}

else{
    header( 'Location: /' ) ;
}
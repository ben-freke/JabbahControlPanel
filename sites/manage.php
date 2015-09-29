<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 29/09/15
 * Time: 14:30
 */

include('../db_connect.php');
include('../variables.php');

if (($logon == true) && ($type == 0)){
    $pagename = 'Sites Manager';
    include('../header.php');

$query = "SELECT * FROM site_info WHERE siteID=".$_GET['id']." ";

$result = mysqli_query($con, $query) or die(mysql_error());

$row = mysqli_fetch_array($result);

echo '

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

        <form action="edit_site.php?id='.$row['siteID'].'" method="post">


          <div class="form-group">
            <label for="subject">Site URL</label>
            <input type="text" class="form-control" id="title" name="url" value="'.$row['url'].'">
          </div>
          <div class="form-group">
            <label for="message">Wordpress User</label>
            <input type="text" class="form-control" id="title" name="wp_usr" value="'.$row['usr'].'">
        </div>
         <div class="form-group">
            <label for="message">Wordpress Password</label>
            <input type="text" class="form-control" id="title" name="wp_pwd" value="'.$row['pwd'].'">
        </div>
        <div class="form-group">
            <label for="message">Wordpress API</label>
            <input type="text" class="form-control" id="title" name="wp_api" value="'.$row['wordpressAPI'].'">
        </div>
        <div class="form-group">
            <label for="message">Google API</label>
            <input type="text" class="form-control" id="title" name="google_api" value="'.$row['googleAPI'].'">
        </div>
        <div class="form-group">
            <label for="message">Uptime API</label>
            <input type="text" class="form-control" id="title" name="up_api" value="'.$row['uptimeAPI'].'">
        </div>
         <div class="form-group">
            <label for="message">User ID</label>
            <input type="text" class="form-control" id="title" name="userID" value="'.$row['userID'].'">
        </div>
      </div>

    </div>
    <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>


    </div>

            </form>

        </div>

    </div>
';}
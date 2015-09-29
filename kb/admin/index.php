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
    $pagename = 'Knowledge Base Manager';
    include('../../header.php');

    echo '



 <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <a class="btn btn-default" href="add_kb.php" role="button">Add A New Article</a>
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
          <th>Article ID</th>
          <th>Title</th>
          <th>Time</th>

        </tr>
      </thead>
      <tbody>
      ';

    $query = "SELECT * FROM kb";

    $result = mysqli_query($con, $query) or die(mysql_error());


    while($row = mysqli_fetch_array($result)) {



        echo '

          <td><a href="/kb/view.article.php?id=' . $row["articleID"] . '">' . $row["articleID"] . '</a></td>
          <td>' . $row["title"] . '</td>
          <td>'.$row["timestamp"].'</td>

        </tr>
        ';

    }

    include('../../footer.php');
}

else{
    $url = $_SERVER['REQUEST_URI'];
    header( 'Location: /?url='.$_SERVER['REQUEST_URI'].'' ) ;
}
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
    $pagename = 'Knowledge Base';
    include('../header.php');

    echo '
 <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table">

              <thead>
                <tr>
                    <th>Article</th>
                    <th></th>
                </tr>
              </thead>

              <tbody>';
                $query = "SELECT * FROM kb ORDER BY title ASC";
                $result = mysqli_query($con, $query) or die(mysql_error());
                while($row = mysqli_fetch_array($result)){
                    echo '
                     <tr>
                      <td><a href="view.article.php?id='.$row["articleID"].'">'.$row["title"].'</a></td>
                      <td><i>'.strip_tags(substr($row["body"], 0, 50)).'...</i></td>
                    </tr>
                    ';}
                echo '
              </tbody>

        </table>
    </div>
</div>';


    include('../footer.php');

}

else{
    header( 'Location: /' ) ;
}
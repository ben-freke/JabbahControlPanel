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
    $pagename = 'Edit Article';
    include('../../header.php');

    $query = "SELECT * FROM kb WHERE articleID=".$_GET['id']." ";

    $result = mysqli_query($con, $query) or die(mysql_error());


    $row = mysqli_fetch_array($result);
    echo '





 <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <form action="add_article.php?edit=1&id='.$row['articleID'].'" method="post">


          <div class="form-group">
            <label for="subject">Article Title</label>
            <input type="text" class="form-control" id="title" name="title" value="'.$row['title'].'">
          </div>

            <textarea name="body" id="editor1" rows="20" cols="80">
            '.$row['body'].'
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( "editor1" );
            </script>
<br>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        ';



    include('../../footer.php');
}

else{
    $url = $_SERVER['REQUEST_URI'];
    header( 'Location: /?url='.$_SERVER['REQUEST_URI'].'' ) ;
}
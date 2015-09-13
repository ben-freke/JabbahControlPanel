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

                            <form action="add_article.php" method="post">


          <div class="form-group">
            <label for="subject">Article Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Article Title">
          </div>

            <textarea name="body" id="editor1" rows="20" cols="80">
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
    header( 'Location: /' ) ;
}
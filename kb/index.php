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
    $pagename = 'Coming Soon!';
    include('../header.php');

    echo '




 <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3>The Knowledge Base is coming soon</h3>
                        </div>
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
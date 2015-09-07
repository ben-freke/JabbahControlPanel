<?php
/**
 * Created by PhpStorm.
 * (C) Ben Freke 2015
 * User: benfreke
 * Date: 29/08/15
 * Time: 20:19
 */



$status = true;
//$views = 3451;
$clicks = 46;
include('db_connect.php');

include('variables.php');

        /**
         *
         * Content should fit between the Header and Footer, excluding content to be put in the header and footer.
         *
         */


    if ($logon == true){
        include('functions.php');

        $query = "SELECT * FROM site_info WHERE userID = $userID";

        $result = mysqli_query($con, $query);


        $row = mysqli_fetch_array($result);

        $pagename = 'Dashboard';
        include('header.php');
        echo "

            <div class='row''>
              <div class='col-md-2 col-md-offset-3''>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>Website Status</div>
                        <div class='panel-body'>
                            ";

                                if ($status){
                                    echo "
                                    <h4 class='text-center'>
                                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                                        </br>
                                        </br>
                                        Your site is up and running
                                    </h4>
                                    ";
                                }
                                else{
                                    echo "
                                    <h4 class='text-center'>
                                        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                        </br>
                                        </br>
                                        There's an issue with your site
                                    </h4>
                                    ";
                                }
                            echo "

                        </div>
                    </div>
                    </div>
              <div class='col-md-2''>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>Viewer Stats</div>
                        <div class='panel-body'>
                            <h4 class='text-center'>
                                <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                                </br>
                                </br>
                                ".$views." views this week
                            </h4>
                        </div>
                    </div>
                </div>
              <div class='col-md-2''>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>Google Clicks</div>
                        <div class='panel-body'>
                            <h4 class='text-center'>
                                <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                                </br>
                                </br>
                                0 clicks this week
                                <p><i>(Coming Soon!)</i></p>
                            </h4>
                        </div>
                    </div>
                </div>
              </div>
              </div>

              <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='panel panel-default'>
  <div class='panel-heading'>Your Website</div>
  <div class='panel-body'>
  <div class='text-center'>
    <p><a href='http://".$row['url']."/wp-admin/'><button type='button' class='btn btn-default'>Manage Your Website</button></p></a>


    </div>
  </div>
  </div>


                </div>
              </div>

 <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='panel panel-default'>
  <div class='panel-heading'>Your Email</div>
  <div class='panel-body'>
  <div class='text-center'>
    <p><a href='#'><button type='button' class='btn btn-default'>View Your Email</button></p></a>
    <p>Coming Soon</p>

    </div>
  </div>
  </div>


                </div>
              </div>



        ";
    }

    else{
        $pagename = 'Login';
        include('bare_header.php');
    echo '

        <div style="min-height: 100%; min-height: 100vh; display: flex; align-items: center;">
              <div class="col-md-4 col-md-offset-4">
              <h2 class="text-center" style="color:white;">Jabbah Control Panel</h2>
              <br>
                <form action="login.php" method="post">
                  <div class="form-group">
                    <label style="color:white;" for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label style="color:white;" for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>

                    <div class="text-center">
                  <button type="submit" class="btn btn-default">Login</button>
                  </div>
                </form>
              </div>
              </div>
        </div>

    ';

    }




    include('footer.php');

?>
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
         *Test
         */


    if ($logon == true){

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
                                $url = $row['url'];
                                $key = $row['wordpressAPI'];
                                $str = file_get_contents('http://stats.wordpress.com/csv.php?api_key='.$key.'&blog_uri='.$url.'&table=views&days=7');
                                $csv = str_getcsv($str);
                                $i = 2;
                                while ($i < 9){
                                    $pieces = explode('"', $csv[$i]);
                                    $views = $views + $pieces[0];
                                    $i++;
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
                                </br>".$views." views this week
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
                    <form action='https://".$row['url']."/wp-login.php' method='post' target='_blank'>
                        <input type='hidden' name='log' value='".$row['usr']."'>
                        <input type='hidden' name='pwd' value='".$row['pwd']."'>
                        <button type='submit' class='btn btn-default'>Manage My Website</button>
                        <p></p>
                        <p>Want to learn more about using WordPress? Visit the <a href='/kb'>Knowledge Base</a>.</p>
                    </form>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class='row'>
   <div class='col-md-6 col-md-offset-3'>
        <iframe  height='200px'  width='100%' src='https://feed.mikle.com/widget/?rssmikle_url=http%3A%2F%2Ffeeds.bbci.co.uk%2Fnews%2Frss.xml%3Fedition%3Duk&rssmikle_frame_width=650&rssmikle_frame_height=300&frame_height_by_article=0&rssmikle_target=_blank&rssmikle_font=Arial%2C%20Helvetica%2C%20sans-serif&rssmikle_font_size=12&rssmikle_border=off&responsive=off&text_align=left&text_align2=left&corner=off&scrollbar=on&autoscroll=on_mc&scrolldirection=up&scrollstep=3&mcspeed=70&sort=Off&rssmikle_title=on&rssmikle_title_sentence=UK%20News&rssmikle_title_bgcolor=%232f72ac&rssmikle_title_color=%23FFFFFF&rssmikle_item_bgcolor=%23FFFFFF&rssmikle_item_title_length=55&rssmikle_item_title_color=%232F72AC&rssmikle_item_border_bottom=on&rssmikle_item_description=on&item_link=off&rssmikle_item_description_length=150&rssmikle_item_description_color=%23666666&rssmikle_item_date=gl1&rssmikle_timezone=Etc%2FGMT&datetime_format=%25b%20%25e%2C%20%25Y%20%25l%3A%25M%20%25p&item_description_style=text&item_thumbnail=full&item_thumbnail_selection=auto&article_num=15&rssmikle_item_podcast=off&' scrolling='no' name='rssmikle_frame' marginwidth='0' marginheight='0' vspace='0' hspace='0' frameborder='0'></iframe>
   </div>
</div>

<!--
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
</div>

-->



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
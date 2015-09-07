<?php //* Mind this opening PHP tag
/**
 *	Send an HTTP request to the WordPress.com stats API to retrieve a blog's traffic statistics
 *
 *	@author Ren Ventura <EngageWP.com>
 *	@link 	http://www.engagewp.com/retrieve-display-wordpress-com-jetpack-site-stats
 *
 *	@return Error if unauthenticated, JSON decoded array of data otherwise
 */

$query = "SELECT * FROM site_info WHERE userID = ".$userID."";
$result = mysqli_query($con, $query) or die(mysql_error());
$row = mysqli_fetch_array($result);

 $url = $row['url'];
  $key = $row['wordpressAPI'];


$str = file_get_contents('http://stats.wordpress.com/csv.php?api_key='.$key.'&blog_uri='.$url.'&table=views&days=7');


$csv = str_getcsv($str);

//echo $csv[6];

$i = 2;
while ($i < 9){
    $pieces = explode('"', $csv[$i]);
    $views = $views + $pieces[0];
    $i++;
}


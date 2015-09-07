<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 03/09/15
 * Time: 23:54
 */

$servername = "localhost";
$username = "sd_user";
$password = "Skatebb3";
$database = "servicedesk";
global $con;
// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
//echo "Connected successfully";
<?php
/**
 * Created by PhpStorm.
 * User: benfreke
 * Date: 05/09/15
 * Time: 01:22
 */

setcookie("Logon", "", time() - 3600);
header( 'Location: /' ) ;
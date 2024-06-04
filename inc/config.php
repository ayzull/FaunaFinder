<?php

$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "faunafinder";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}



// function p($x, $b = false) {
//     echo '<pre>';
//     print_r($x);
//     echo '</pre>';
//     if (!$b) {
//         die();
//     }
// }


// error_reporting(E_ALL);
// ini_set('display_errors', 'On');


?>
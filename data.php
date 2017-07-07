<?php

$output = [
    'success'=>false,
    'errors'=>[]
];
define('fromData', true); // get variable names from external source
$action = $_GET['action'];

empty($action) ? (exit('No action specified')) : (''); // Exit if no action is specified; otherwise, continue on

// require('config/config.php'); // For mySQL credentials


switch($action) {
    case("register_client"): 
        include('data_api/register_client.php');
        break;

    default:
        include('data_api/default.php');  

}

$outputJSON = json_encode($output);

print_r($outputJSON); 

?>
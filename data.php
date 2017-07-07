<?php

define('fromData', true); // get variable names from external source
$action = $_GET['action'];

empty($action) ? (exit('No action specified')) : (''); // Exit if no action is specified; otherwise, continue on

// require('config/config.php'); // For mySQL credentials

$output = new stdClass(); 
$output->success=false; // Default assumption is that transactions failed unless otherwise indicated
$output->debug=[]; // Empty object to hold debugging output

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
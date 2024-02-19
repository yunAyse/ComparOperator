<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
    isset($_POST['location']) && !empty($_POST['location']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['operator_id']) && !empty($_POST['operator_id'])
  
) {
    $destination = new destination([
        'location'=> $_POST['location'],
        'operator_id'=> $_POST['operator_id'],
        'price'=> $_POST['price']
        
       
    ]);
    $destinationManagement = new DestinationManagement($db);
    $destinationManagement->createDestination($destination);
}
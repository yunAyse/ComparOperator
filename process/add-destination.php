<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
    isset($_POST['location']) && !empty($_POST['location']) &&
    isset($_POST['price']) && !empty($_POST['price']) 
  
) {
    $destination = new destination([
        'location'=> $_POST['location'],
        'price'=> $_POST['price']
       
    ]);
    $destinationManagement = new DestinationManagement($db);
    $destinationManagement->createDestination($destination);
}
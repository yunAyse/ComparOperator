<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
    isset($_POST['location']) && !empty($_POST['location']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['operator_id']) && !empty($_POST['operator_id'])
) {

    $destination = new Destination([
        'location' => $_POST['location'],
        'operator_id' => intval($_POST['operator_id']),
        'price'=> $_POST['price']
        
       
    ]);
    
        $destinationManagement = new DestinationManagement($db);
        $theDestination = $destinationManagement->getDestinationByLocation($destination);
    
        if ($theDestination) {
            $theDestinationLocation = $theDestination['location'];
        } else {
            $theDestinationLocation = $destinationManagement->createDestination($destination);
        }
} else {
    echo 'error';
};
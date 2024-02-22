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
        'tour_operator_id' => intval($_POST['operator_id']),
        'price'=> $_POST['price']
    ]);
    
        $destinationManagement = new DestinationManagement($db);
        $theDestinations = $destinationManagement->getDestinationByOperatorId($destination);

        $findDestination = false;

        foreach($theDestinations as $theDestination) {
            if ( in_array($destination->getLocation(), $theDestination)) {
                $findDestination = true;
            }
        }

        if ($findDestination === false) {
            $theDestinationOperator = $destinationManagement->createDestination($destination);
        }
    header('Location: ../pages/admin.php');
} else {
    echo 'error';
};

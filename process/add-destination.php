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
    // var_dump(intval($_POST['operator_id']));
    
        $destinationManagement = new DestinationManagement($db);
        $theDestinations = $destinationManagement->getDestinationByOperatorId($destination);
        // var_dump(in_array($destination->getLocation(), $theDestination[1]));
        // var_dump($destination->getLocation());

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

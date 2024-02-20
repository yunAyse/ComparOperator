<?php

require_once('../utils/autoload.php');
require_once('../utils/database.php');

$destination = new Destination([
  'id' => 1,
  'price' => 2,
  'location' => 'italy',
  'operator_id' => 1
]);
// $destinationById = $destinationManagement->getDestinationById($destination);

$destinationManagement = new DestinationManagement($db);
$idDestination = $destinationManagement->getDestinationByLocation($_POST['the_location']);
var_dump($destinationManagement->getDestinationByLocation($destination));

var_dump($_POST['the_location']); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destination</title>
</head>
<body>
  
</body>
</html>
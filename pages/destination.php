<?php

require_once('../utils/autoload.php');
require_once('../utils/database.php');

// $destination = new Destination([
//   'id' => 1,
//   'price' => 2,
//   'location' => 'italy',
//   'operator_id' => 1
// ]);
// $destinationById = $destinationManagement->getDestinationById($destination
$destinationManagement = new DestinationManagement($db);
$idDestination = $destinationManagement->getDestinationById(intval($_POST['id']));

var_dump(intval($_POST['id'])); 

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
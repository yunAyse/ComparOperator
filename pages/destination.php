<?php


$destination = new Destination([
  'id' => 1,
  'price' => 2,
  'location' => 'italy',
  'operator_id' => 1
]);
$destinationById = $destinationManagement->getDestinationById($destination);
var_dump($destinationById); 

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
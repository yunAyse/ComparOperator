<?php
require_once('./utils/autoload.php');
require_once('./utils/database.php');

$tourOperators = new TourOperatorManagement($db);
$tourOperators->getAllOperators();

$destination = new DestinationManagement($db);
$destination->getAllDestination();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Operator</title>
</head>
<body>
    
</body>
</html>

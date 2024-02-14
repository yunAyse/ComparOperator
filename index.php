<?php
require_once('./utils/autoload.php');
require_once('./utils/database.php');

$tourOperators = new TourOperatorManagement($db);
$tourOperators->getAllOperators();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
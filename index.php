<?php 
require_once './utils/autoload.php';
require_once './utils/database.php';

$destination = new DestinationManagement($db);
$destination->getAllDestination();

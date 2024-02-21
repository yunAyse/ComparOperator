<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
            isset($_POST['name_operator']) && !empty($_POST['name_operator'])
   
        ) {
            $tourOperator = new TourOperator([
                'name_operator'=> $_POST['name_operator'],
             
            ]);
            $tourOperatorManagement = new TourOperatorManagement($db);
            $selectOperator->selectTourOperator($selectOperator);
        }
<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
            isset($_POST['name_operator']) && !empty($_POST['name_operator']) &&
            isset($_POST['link_operator']) && !empty($_POST['link_operator']) &&
            isset($_POST['is_premium']) && !empty($_POST['is_premium']) 
        ) {
            $tourOperator = new TourOperator([
                'name_operator'=> $_POST['name_operator'],
                'link_operator'=> $_POST['link_operator'],
                'is_premium'=>$_POST['is_premium']
            ]);
            $tourOperatorManagement = new TourOperatorManagement($db);
            $tourOperatorManagement->createTourOperator($tourOperator);
        }
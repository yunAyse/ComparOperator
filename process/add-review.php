<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['message']) && !empty($_POST['message'])
        ) {
            $review = new Review([
                'author'=> $_POST['author'],
                'message'=> $_POST['message']
          
            ]);
            $reviewManagement = new ReviewManagement($db);
            $ReviewManagement->getAllReview();
        }
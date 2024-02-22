<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');

if (
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['message']) && !empty($_POST['message']) &&
            isset($_POST['operator_id']) && !empty($_POST['operator_id'])
        ) {
            $review = new Review([
                'author'=> $_POST['author'],
                'message'=> $_POST['message'],
                'tour_operator_id' => intval($_POST['operator_id'])
          
            ]);

            $reviewManagement = new ReviewManagement($db);
            $operatorByReviews = $reviewManagement->operatorByReview($review);
            
            $findOperator = false;

            foreach($operatorByReviews as $operatorByReview) {
                if (in_array($review->getTourOperator(), $operatorByReview)) {
                    $findOperator = true;
                }
            }

            if ($findOperator === false) {
                $theReview = $reviewManagement->createReview($review);
            }
        }
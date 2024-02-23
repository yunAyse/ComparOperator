<?php

require_once('../utils/database.php');
require_once('../utils/autoload.php');
session_start();

if (
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['message']) && !empty($_POST['message']) &&
            isset($_SESSION['operator_id']) && !empty($_SESSION['operator_id'])
        ) {
            $operatorId = $_SESSION['operator_id'];

           
            $review = new Review([
                'author'=> $_POST['author'],
                'message'=> $_POST['message'],
                'tour_operator' => intval($operatorId)
            ]);
           
            $reviewManagement = new ReviewManagement($db);
            $theReview = $reviewManagement->createReview($review);
            // $operatorByReviews = $reviewManagement->operatorByReview($review);
            
            // $findOperator = false;

            // foreach($operatorByReviews as $operatorByReview) {
            //     if (in_array($review->getTourOperator(), $operatorByReview)) {
            //         $findOperator = true;
            //     }
            // }

            // if ($findOperator === false) {
            // }
            // die();
            header('Location: ../pages/operator.php');
            exit;
        } else {
            header('Location: ../pages/operator.php');
        };
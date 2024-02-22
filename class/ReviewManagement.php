<?php

class ReviewManagement
{
  private PDO $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function joinReviewOperator($operatorId)
  {
    $request = $this->db->prepare("SELECT * FROM review INNER JOIN tour_operator ON review.tour_operator_id = tour_operator.id WHERE tour_operator_id = :id ");
    $request->execute([
      'id' => $operatorId
    ]);

    $operatorJoined = $request->fetchAll();
    return $operatorJoined ;
  }

  public function hydrate(array $data)
  {
    $reviews = [];
    foreach ($data as $review) {
      $reviews[] = new Review($review);
    }
    return $reviews;
  }
}

<?php 
class ReviewManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllReview($id){
        $request = $this->db->prepare("SELECT * FROM review WHERE tour_operator_id = :tour_operator_id");
        $request->execute([
            'tour_operator_id'=>$id,
        
       ]);
        return  $this->hydrate($request->fetchAll());
    }

    public function createReview($review) {
      $request = $this->db->prepare("INSERT INTO review (message, author, tour_operator_id) VALUES (:message, :author, :tour_operator_id)");
      $request->execute([
        'message' => $review->getMessage(),
        'author' => $review->getAuthor(),
        'tour_operator_id' => $review->getTourOperator()
      ]);
    }

    public function operatorByReview(Review $review) {
      $request = $this->db->prepare("SELECT tour_operator_id FROM review WHERE tour_operator_id = :id");
      $request->execute([
        'id' => $review->getTourOperator(),
      ]);
      return $request->fetchAll();
    }

    public function hydrate(array $data){
        $reviews = [];
        foreach ($data as $review){
            $reviews[] = new Review($review);
        }
        return $reviews;
    }
}

<?php 
class ReviewManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllReview($id) {
      $request = $this->db->prepare("SELECT * FROM review WHERE tour_operator_id = :tour_operator_id");
    
      // Bind value using bindValue
      $request->bindValue(':tour_operator_id', $id);
    
      // Execute the query
      $request->execute();
    
      return $this->hydrate($request->fetchAll());
    }

    public function createReview($review) {
      $request = $this->db->prepare("INSERT INTO review (message, author, tour_operator_id) VALUES (:message, :author, :tour_operator_id)");
    
      // Bind values using bindValue
      $request->bindValue(':message', htmlspecialchars($review->getMessage()));
      $request->bindValue(':author', htmlspecialchars($review->getAuthor()));
      $request->bindValue(':tour_operator_id', $review->getTourOperator());
    
      // Execute the query
      $request->execute();
    }

    public function operatorByReview(Review $review) {
      $request = $this->db->prepare("SELECT tour_operator_id FROM review WHERE tour_operator_id = :id");
    
      // Bind value using bindValue
      $request->bindValue(':id', $review->getTourOperator());
    
      // Execute the query
      $request->execute();
    
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

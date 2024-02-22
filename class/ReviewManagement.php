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

    public function hydrate(array $data){
        $reviews = [];
        foreach ($data as $review){
            $reviews[] = new Review($review);
        }
        return $reviews;
    }
}

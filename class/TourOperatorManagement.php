<?php
class TourOperatorManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllOperators($valeur){

        $request = $this->db->query("SELECT * FROM tour_operator WHERE tour_operator.id = $valeur");
        $tourOperators = $request->fetch();
        return $tourOperators;


        // $request = $this->db->prepare('SELECT * FROM tour_operator');
        // $request->execute();
        // $tourOperators = $request->fetchAll();
        // return $tourOperators;

    }

    public function createTourOperator(TourOperator $tourOperator){

        $request = $this->db->prepare("INSERT INTO tour_operator (name, link, grade_count, grade_total, is_premium) VALUES (:name, :link, :grade_count, :grade_total, :is_premium)");
        $request->execute([
            'name'=> $tourOperator->getName(),
            'link'=> $tourOperator->getLink(),
            'grade_count'=> 0,
            'grade_total'=> 0,
            'is_premium'=> $tourOperator->getIsPremium()
        ]);

    }
} 

?>

<?php
class TourOperatorManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllOperators(){
        
        $request = $this->db->query("SELECT * FROM tour_operator");
        $tourOperators = $request->fetchAll();
        return $tourOperators;


        // $request = $this->db->prepare('SELECT * FROM tour_operator');
        // $request->execute();
        // $tourOperators = $request->fetchAll();
        // return $tourOperators;

    }

    public function getOperatorLocation($location) {
        $request = $this->db->prepare("SELECT DISTINCT destination.id, tour_operator.name FROM tour_operator JOIN destination ON tour_operator.id = destination.tour_operator_id WHERE destination.location = :location");
        $request->execute([
            'location' => $location
        ]);
        $operatorLocation = $request->fetchAll();
        return $operatorLocation; 

    }

    public function selectTourOperator(TourOperator $tourOperator) {
        $request = $this->db->prepare("SELECT location FROM tour_operator JOIN destination on tour_operator_id = destination.tour_operator_id");
        $request->execute([
            'id' => $tourOperator->getId(),
            'name' => $tourOperator->getName()
        ]);
        $selectTourOperator = $request->fetchAll();
        var_dump($selectTourOperator);
        return $selectTourOperator; 

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
    
    public function hydrate(array $data)
        {
            $operators = [];
            foreach ($data as $operator) {
                var_dump($operator);
                $operators[] = new TourOperator($operator);
            }
            return $operators;
        }
} 
?>

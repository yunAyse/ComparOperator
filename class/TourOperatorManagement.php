<?php
class TourOperatorManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllOperators()
    {

        $request = $this->db->query("SELECT * FROM tour_operator");
        return $this->hydrate($request->fetchAll());
    }

    public function getOperatorLocation($location) {
        $request = $this->db->prepare("SELECT * FROM destination JOIN tour_operator ON destination.tour_operator_id = tour_operator.id WHERE destination.location = :location");
      
        // Bind value using bindValue
        $request->bindValue(':location', $location);
      
        // Execute the query
        $request->execute();
      
        $operatorLocation = $request->fetchAll(PDO::FETCH_ASSOC);
        return $operatorLocation;
      }



      public function selectTourOperator(TourOperator $tourOperator)
      {
        $request = $this->db->prepare("SELECT * FROM tour_operator JOIN destination ON tour_operator_id = destination.tour_operator_id WHERE tour_operator.name = :name");
      
        // Bind value using bindValue
        $request->bindValue(':name', $tourOperator->getName());
      
        // Execute the query
        $request->execute();
      
        $selectTourOperator = $request->fetchAll();
      
        return $this->hydrate($selectTourOperator);
      }

      public function createTourOperator(TourOperator $tourOperator)
      {
        $request = $this->db->prepare("INSERT INTO tour_operator (name, link, grade_count, grade_total, is_premium) VALUES (:name, :link, :grade_count, :grade_total, :is_premium)");
      
        // Bind values using bindValue
        $request->bindValue(':name', $tourOperator->getName());
        $request->bindValue(':link', $tourOperator->getLink());
        $request->bindValue(':grade_count', 0, PDO::PARAM_INT); // Explicitly set data type for clarity
        $request->bindValue(':grade_total', 0, PDO::PARAM_INT); // Explicitly set data type for clarity
        $request->bindValue(':is_premium', $tourOperator->getIsPremium());
      
        // Execute the query
        $request->execute();
      }

    public function hydrate(array $data)
    {
        $operators = [];
        foreach ($data as $operator) {
            // var_dump($operator);
            $operators[] = new TourOperator($operator);
        }
        return $operators;
    }
}

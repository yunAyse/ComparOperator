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

    public function getOperatorLocation($location)
    {
        $request = $this->db->prepare("SELECT * FROM destination JOIN tour_operator ON destination.tour_operator_id = tour_operator.id WHERE destination.location = :location");
        $request->execute([
            'location' => $location
        ]);
        $operatorLocation = $request->fetchAll(PDO::FETCH_ASSOC);
        return $operatorLocation;
    }



    public function selectTourOperator(TourOperator $tourOperator)
    {
        $request = $this->db->prepare("SELECT * FROM tour_operator JOIN destination ON tour_operator_id = destination.tour_operator_id WHERE tour_operator.name = :name ");
        $request->execute([
            'name' => $tourOperator->getName()
        ]);
        $selectTourOperator = $request->fetchAll();
        // var_dump($selectTourOperator);
        return $this->hydrate($selectTourOperator);
    }

    public function createTourOperator(TourOperator $tourOperator)
    {

        $request = $this->db->prepare("INSERT INTO tour_operator (name, link, grade_count, grade_total, is_premium) VALUES (:name, :link, :grade_count, :grade_total, :is_premium)");
        $request->execute([
            'name' => $tourOperator->getName(),
            'link' => $tourOperator->getLink(),
            'grade_count' => 0,
            'grade_total' => 0,
            'is_premium' => $tourOperator->getIsPremium()
        ]);
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

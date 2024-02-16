<?php

class DestinationManagement {
  private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllDestination() {
      $request = $this->db->query("SELECT * FROM destination");
      $destinations = $request->fetchAll();
      var_dump($destinations);
      return $destinations;
    }

    public function createDestination(Destination $destination){

       

      $request = $this->db->prepare("INSERT INTO destination (location, price, tour_operator_id) VALUES (:location, :price, tour_operator_id)");
      $request->execute([
          'location'=> $destination->getLocation(),
          'price'=> $destination->getPrice(),
          'tour_operator_id'=> $destination->getTourOperator()
          
      ]);

  }
}

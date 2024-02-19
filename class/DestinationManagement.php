<?php

class DestinationManagement {
  private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllDestinations() {
      $request = $this->db->query("SELECT * FROM destination");
      $destinations = $request->fetchAll();
      var_dump($destinations);
      return $destinations;
    }

    public function getDestinationByLocation(Destination $destination) {
      $request = $this->db->prepare("SELECT * FROM destination WHERE location = :location");
      $request->bindValue(':location', $destination->getLocation());
      $request->execute(
        // ['id' => $destination->getId()] 
      );
      return $request->fetch(); 
    }

    public function connectDestinationAndOperator(Destination $destination) {
      $request = $this->db->prepare("SELECT * FROM tour_operator INNER JOIN destination ON tour_operator.id = :id ");
      $request->execute([
        'id' => $destination->getId()
      ]);
      $destination = $request->fetchAll();
      var_dump($destination);
      return $destination;
    }

    public function createDestination(Destination $destination){

      $request = $this->db->prepare("INSERT INTO destination (location, price, tour_operator_id) VALUES (:location, :price, :tour_operator_id)");
      $request->execute([
          'location'=> $destination->getLocation(),
          'price'=> $destination->getPrice(),
          'tour_operator_id'=> $destination->getTourOperator()
          
      ]);

  }
}

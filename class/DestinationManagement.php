<?php

class DestinationManagement
{
  private PDO $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

    public function getAllDestinations() {
      $request = $this->db->query("SELECT * FROM destination");
      $destinations = $request->fetchAll();

      return $this->hydrate( $destinations);
    }

    public function getTheDestinations($location) {
      $request = $this->db->prepare("SELECT * FROM destination WHERE location = :location");
      $request->execute([
        "location" => $location
      ]);
      $destination = $request->fetch();

      return $this->hydrateOne($destination);
    }

    public function getDestinationByLocation($location) {
      $request = $this->db->prepare("SELECT * FROM destination WHERE location = :location");
      $request->bindValue(':location', $location);
      $request->execute(
        // ['id' => $destination->getId()] 
      );
      return $this->hydrateOne($request->fetch()); 
    }


    public function getDestinationByOperatorId(Destination $destination) {
      $request = $this->db->prepare("SELECT * FROM destination WHERE tour_operator_id = :tour_operator_id");
      $request->bindValue(':tour_operator_id', $destination->getTourOperator());
      $request->execute(
        // ['id' => $destination->getId()] 
      );
      return $request->fetchAll();  
    }

  public function connectDestinationAndOperator(Destination $destination)
  {
    $request = $this->db->prepare("SELECT * FROM tour_operator INNER JOIN destination ON tour_operator.id = :id ");
    $request->execute([
      'id' => $destination->getId()
    ]);
    $destination = $request->fetchAll();
    // var_dump($destination);
    return $destination;
  }

  public function createDestination(Destination $destination)
  {

    $request = $this->db->prepare("INSERT INTO destination (location, price, tour_operator_id) VALUES (:location, :price, :tour_operator_id)");
    $request->execute([
      'location' => $destination->getLocation(),
      'price' => $destination->getPrice(),
      'tour_operator_id' => $destination->getTourOperator()
    ]);
  }

  public function hydrate(array $data)
    {
        $destinations = [];
        foreach ($data as $destination) {
            // var_dump($destination);
            $destinations[] = new Destination($destination);
        }
        return $destinations;
    }

    public function hydrateOne($data) {
      return new Destination($data);
    }
}

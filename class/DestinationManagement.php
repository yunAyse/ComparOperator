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

  
}

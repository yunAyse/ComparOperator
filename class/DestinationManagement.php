<?php
require_once './utils/autoload.php';
require_once './utils/database.php';

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

    // public function createDestination() {
    //   $request = $this->db->prepare("INSERT INTO")
    // }
}
<?php

class TourOperatorManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllOperators(){

        $request = $this->db->prepare('SELECT * FROM tour_operator');
        $request->execute();
        $tourOperators = $request->fetchAll();
        return $tourOperators;

    }

    
} 

?>

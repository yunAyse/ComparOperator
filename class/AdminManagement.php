<?php
require_once './utils/autoload.php';
require_once './utils/database.php';

class AdminManagement
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    
}
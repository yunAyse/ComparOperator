<?php
class Manager
{
    private PDO $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
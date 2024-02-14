<?php

class Destination
{
    private int $id;
    private $location;
    private $price;
    private $tourOperator;

    public function __construct($db)
    {
        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of tourOperator
     */ 
    public function getTourOperator()
    {
        return $this->tourOperator;
    }

    /**
     * Set the value of tourOperator
     *
     * @return  self
     */ 
    public function setTourOperator($tourOperator)
    {
        $this->tourOperator = $tourOperator;

        return $this;
    }
}
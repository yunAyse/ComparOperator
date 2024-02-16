<?php

class Destination
{
    private int $id;
    private $location;
    private $price;
    private $tourOperator;

    public function __construct($data)
    {
        if(isset($data['id'])){
            $this->id = $data['id'];
         }
         $this->location = $data['location'];
         $this->price = $data['price'];
       
    }

     
    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getLocation()
    {
        return $this->location;
    }

   
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
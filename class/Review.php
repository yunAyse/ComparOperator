<?php

class Review
{
    private int $id;
    private string $message;
    private string $author;
    private $tourOperator;

    public function __construct(array $data)
    {
        if(isset($data['id'])){
            $this->id = $data['id'];
         }
         if (isset($data['message'])) {
             $this->message = $data['message'];
         }

         if(isset($data['author'])) {
             $this->author = $data['author'];
         }

         if(isset($data['tour_operator'])) {
             $this->tourOperator = $data['tour_operator'];
        }
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
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

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
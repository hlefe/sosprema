<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connexion
 *
 * @author Nicolas
 */
class connexion extends PDO
{
    private $stmt = null;
    
    public function __construct($dsn, $user, $pswd) 
    {
        try{
           parent::__construct($dsn, $user, $pswd); //il me faut les paramètres de Valentin
           $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function executeQuerry($querry, array $parameters = [])
    {
        $this->stmt=parent::prepare($querry);
        foreach($parameters as $name=>$value)
        {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }
    
    public function getResults()
    {
        return $this->stmt->fetchAll();
    }   
}
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



class Connexion extends PDO
{
    private $stmt = null;
    private static $instance = null;
    
    public function __construct($dsn, $user, $pswd) 
    {
        
        
        try
        {
            $this->stmt = parent::__construct($dsn, $user, $pswd); //il me faut les paramètres de Valentin
           $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    public static function getInstance()
    {
        include '/config/config.php';
        global $dsn;
        global $pswd;
        global $user;
        
        if(is_null(self::$instance))
        {
            return self::$instance = new Connexion($dsn, $user, $pswd);
        }
        return self::$instance;
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
    
    public function getResult()
    {
        return $this->stmt->fetch();
    }
    
    
    public function getResults()
    {
        return $this->stmt->fetchAll();
    }   
}
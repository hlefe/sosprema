<?php

class Connexion extends PDO
{
    private $stmt = null;
    private static $instance = null;
    
    public function __construct($dsn, $user, $pswd) 
    {
        $this->stmt = parent::__construct($dsn, $user, $pswd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    }
    
    public static function getInstance()
    {
        include 'config/config.php';
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
        foreach($parameters as $key=>$value)
        {
            $this->stmt->bindValue($key, $value[0], $value[1]);
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
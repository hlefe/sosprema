<?php

class Connexion extends PDO
{    
    private static $pdo;
    private static $stmt;
    
    public static function connect($dsn, $user, $pswd) 
    {
        self::$pdo = parent::__construct($dsn, $user, $pswd);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    }
        
    public static function executeQuerry($querry, array $parameters = [])
    {
        self::$stmt=parent::prepare($querry);
        foreach($parameters as $key=>$value)
        {
            self::$stmt->bindValue($key, $value[0], $value[1]);
        }
        return self::$stmt->execute();
    }
    
    public static function getResult()
    {
        return self::$stmt->fetch();
    }
    
    
    public static function getResults()
    {
        return self::$stmt->fetchAll();
    }   
}
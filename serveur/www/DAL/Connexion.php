<?php
/**
* Classe Connexion
*
* Gateway de Connexion (intéragit avec les tables en utilisant PDO)
* @package DAL
*/
class Connexion extends PDO
{    
    static private $pdo;
    static private $stmt;
    
    public static function connect($dsn, $user, $pswd) 
    {
        self::$pdo = new PDO($dsn, $user, $pswd);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    }
        
    public static function executeQuerry($querry, array $parameters = []){
            self::$stmt = self::$pdo->prepare($querry);
            foreach($parameters as $name => $value){
                self::$stmt->bindValue($name, $value[0], $value[1]);
            }
               
            return self::$stmt->execute();;
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
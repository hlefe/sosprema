<?php
/**
* Classe Connexion
*
* Gateway de Connexion (intéragit avec les tables en utilisant PDO)
* Permet d'établir la connexion avec la base de données mySQL
* @package DAL
*/
class Connexion extends PDO
{    
    static private $pdo;
    static private $stmt;
    
    /**
    * Fonction permettant de se connecter à la base données. 
    * 
    * Permet de se connecter à la base de données.
    */
    public static function connect($dsn, $user, $pswd) 
    {
        self::$pdo = new PDO($dsn, $user, $pswd);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    }
    
    /**
    * Fonction permettant d'exécuter une requête SQL. 
    * 
    * Permet d'exécuter une requête SQL.
    * @param querry requête à exécuter
    * @param parameters paramètre de la requête SQL
    * @return retourne le résultat de la requête.
    */
    public static function executeQuerry($querry, array $parameters = []){
            self::$stmt = self::$pdo->prepare($querry);
            foreach($parameters as $name => $value){
                self::$stmt->bindValue($name, $value[0], $value[1]);
            }
               
            return self::$stmt->execute();;
        }
    
        
    /**
    * Fonction permettant de récupérer le résultat de la requête. 
    * 
    * Permet de récupérer le résultat de la requête.
    * @return retourne le résultat de la requête.
    */    
    public static function getResult()
    {
        return self::$stmt->fetch();
    }
    
    
    /**
    * Fonction de récupération de l'ensemble des résultats de la requête. 
    * 
    * Permet de récupérer l'ensemble des résultats de la requête.
    * @return results retourne l'ensemble des résultats de la requête.
    */
    public static function getResults()
    {
        return self::$stmt->fetchAll();
    }   
}
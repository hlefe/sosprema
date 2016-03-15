<?php
/**
* Classe HopitalGateway
*
* Gateway Hopital (intéragit avec cette table en utilisant PDO)
* @package DAL
* @subpackage gateway
*/
class HopitalGateway {
    
    /**
    * Fonction d'ajout d'un hôpital. 
    * 
    * Permet de rajouter un hôpital dans la table des hôpitaux.
    * @param nomHopital correspond au nom de l'hopital à ajouter.
    * @param idAdresse correspond à l'id de l'adresse ou se trouve l'hopital.
    * @param niveau correspond au niveau de service de l'hopital. 
    * @param service correspond au principal service de l'hopital.
    * @param nbLits correspond au nombre de couveuse "lit" de l'hopital.
    * @param nbPremaParAn correspond au nombre d'enfant né prématuré par an.
    * @param cafeParent indique si l'hôpital fait oui ou non des café parent.
    * @param parkingPayant indique si le stationnement et payant ou non aux alentours de l'hôpital.
    * @param convention permet de savoir si l'hôpital posséde une convention avec l'association ou non.
    * @param visiteBenevole permet de savoir si l'hôpital organise des visite bénévole.
    */
    public static function ajouterHopital($nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn, $cafeParent, $parkingPayant, $convention, $visiteBenevole)
    {
        $querry = 'INSERT INTO hopital (nomHopital, idAdresse, niveau, service, nbLits, nbPremaParAn, cafeParent, parkingPayant, convention, visiteBenevole)
                    VALUES (:nomHopital, :idAdresse, :niveau, :service, :nbLits, :nbPremaParAn, :cafeParent, :parkingPayant, :convention, :visiteBenevole)';
        
        Connexion::executeQuerry($querry, array(':nomHopital'=>array($nomHopital,PDO::PARAM_STR),
                                                ':idAdresse'=>array($idAdresse,PDO::PARAM_INT), 
                                                ':niveau'=>array($niveau,PDO::PARAM_INT), 
                                                ':service'=>array($service,PDO::PARAM_STR), 
                                                ':nbLits'=>array($nbLits,PDO::PARAM_INT), 
                                                ':nbPremaParAn'=>array($nbPremaParAn,PDO::PARAM_INT), 
                                                ':cafeParent'=>array($cafeParent,PDO::PARAM_BOOL), 
                                                ':parkingPayant'=>array($parkingPayant,PDO::PARAM_BOOL), 
                                                ':convention'=>array($convention,PDO::PARAM_BOOL), 
                                                ':visiteBenevole'=>array($visiteBenevole,PDO::PARAM_BOOL)));
        
    }
    
    /**
    * Fonction de recherche d'un hôpital. 
    * 
    * Permet de rechercher un hôpital dans la table des hôpitaux.
    * @param idHopital correspond à l'id de l'hôpital rechercher.
    * @return hôpital est l'objet hôpital qui correspond à l'hôpital rechercher.
    */
    public static function rechercherHopital($idHopital){    
        $querry = 'SELECT * FROM hopital WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_STR)));
        $result = Connexion::getResult();
        $hopital = new Hopital($result);
        //Assocaition de l'adresse de l'hôpital
        if($hopital->idAdresse!=NULL){
            $adresse = AdresseGateway::rechercherAdresseById($hopital->idAdresse);
            $ville = VilleGateway::rechercherVilleById($adresse['idVille']);
            $departement = DepartementGateway::rechercherDepartementById($ville['idDepartement']);
            $region = RegionGateway::rechercherRegionById($departement['idRegion']);
            $hopitalAdresse = array('numRue' => $adresse['numRue'], 
                                  'nomRue' => $adresse['nomRue'],
                                  'codePostal' => $ville['codePostal'],
                                  'nomVille' => $ville['nomVille'],
                                  'nomDepartement' => $departement['nomDepartement'],
                                  'nomRegion' => $region['nomRegion']);
            $hopital->adresse = new Adresse($hopitalAdresse);
        }
        
        return $hopital;
    }
    
    /**
    * Fonction permettant de récupérer l'ensemble des hôpitaux. 
    * 
    * Permet de récupérer tout les hôpitaux dans la table des hôpitaux.
    * @return result est un tableaux contenat le résultat de la requête SQL.
    */
    public static function getAll(){
        $querry = 'SELECT * FROM hopital';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    /**
    * Fonction de suppression d'un hôpital. 
    * 
    * Permet de supprimer un hôpital dans la table des hôpitaux.
    * @param idHopital correspond à l'id de l'hôpital rechercher.
    */
    public static function supprimerHopital($idHopital){
        $querry = 'DELETE FROM hopital WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital, PDO::PARAM_INT)));
    }
    
    /**
    * Fonction de modifier un hôpital. 
    * 
    * Permet de modifier un hôpital dans la table des hôpitaux.
    * @param idHopital correspond à l'id de l'hôpital rechercher.
    * @param nomHopital correspond au nom de l'hopital à ajouter.
    * @param idAdresse correspond à l'id de l'adresse ou se trouve l'hopital.
    * @param niveau correspond au niveau de service de l'hopital. 
    * @param service correspond au principal service de l'hopital.
    * @param nbLits correspond au nombre de couveuse "lit" de l'hopital.
    * @param nbPremaParAn correspond au nombre d'enfant né prématuré par an.
    * @param cafeParent indique si l'hôpital fait oui ou non des café parent.
    * @param parkingPayant indique si le stationnement et payant ou non aux alentours de l'hôpital.
    * @param convention permet de savoir si l'hôpital posséde une convention avec l'association ou non.
    * @param visiteBenevole permet de savoir si l'hôpital organise des visite bénévole.
    */
    public static function modifierHopital($idHopital,$nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn, $cafeParent, $parkingPayant, $convention, $visiteBenevole){
        $querry = 'UPDATE hopital SET nomHopital = :nomHopital, 
                                      idAdresse = :idAdresse, 
                                      niveau = :niveau, 
                                      service = :service, 
                                      nbLits = :nbLits, 
                                      nbPremaParAn = :nbPremaParAn, 
                                      cafeParent = :cafeParent, 
                                      parkingPayant = :parkingPayant, 
                                      convention = :convention, 
                                      visiteBenevole = :visiteBenevole
                                WHERE idHopital = :idHopital';
        
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital,PDO::PARAM_INT),
                                                ':nomHopital'=>array($nomHopital,PDO::PARAM_STR),
                                                ':idAdresse'=>array($idAdresse,PDO::PARAM_INT), 
                                                ':niveau'=>array($niveau,PDO::PARAM_INT), 
                                                ':service'=>array($service,PDO::PARAM_STR), 
                                                ':nbLits'=>array($nbLits,PDO::PARAM_STR), 
                                                ':nbPremaParAn'=>array($nbPremaParAn,PDO::PARAM_STR), 
                                                ':cafeParent'=>array($cafeParent,PDO::PARAM_BOOL), 
                                                ':parkingPayant'=>array($parkingPayant,PDO::PARAM_BOOL), 
                                                ':convention'=>array($convention,PDO::PARAM_BOOL), 
                                                ':visiteBenevole'=>array($visiteBenevole,PDO::PARAM_BOOL)));
    }
}

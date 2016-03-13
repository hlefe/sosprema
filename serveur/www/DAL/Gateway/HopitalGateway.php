<?php

class HopitalGateway {
    
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
    
    public static function getAll(){
        $querry = 'SELECT * FROM hopital';
        Connexion::executeQuerry($querry);
        $results = Connexion::getResults();
        return $results;
    }
    
    public static function supprimerHopital($idHopital){
        $querry = 'DELETE FROM hopital WHERE idHopital=:idHopital';
        Connexion::executeQuerry($querry, array(':idHopital'=>array($idHopital, PDO::PARAM_INT)));
    }
    
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

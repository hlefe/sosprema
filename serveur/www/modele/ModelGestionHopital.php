<?php
/**
* Classe ModelGestionHopital
*
* Modèle pour GestionHopital
* @package modele
*/
class ModelGestionHopital {
    
    /**
    * Fonction de recherche d'un hôpital. 
    * 
    * Permet de rechercher un hôpital.
    * @param idHopital corespond à l'id de l'hopital à rechercher.
    * @return hopital correspond à l'hôpital rechercher.
    */
    public static function rechercherHopital($idHopital){
        
        $hopital = HopitalGateway::rechercherHopital($idHopital);
        $contactLocal = ModelContactLocal::rechercherContactLocalByHopital($idHopital);
        if($contactLocal != false || $contactLocal != NULL){
            $hopital->listeContactLocal = $contactLocal;
        }
        $contactHopital = ModelContactHopital::rechercherContactHopitalByHopital($idHopital);
        if($contactHopital != false || $contactHopital != NULL){
            $hopital->listeContactHopital = $contactHopital;
        }
        return $hopital;
    }
    
    /**
    * Fonction de récupération de l'ensemble des hôpitaux. 
    * 
    * Permet de récupérer l'ensemble des hôpitaux.
    * @return hopitaux correspond à l'ensemble des hôpitaux trouver dans la table.
    */
    public static function afficherToutHopital(){
        $hopitaux = HopitalGateway::getAll();
        return $hopitaux;
    }

    /**
    * Fonction d'ajout d'un hôpital. 
    * 
    * Permet d'ajouter un hôpital fait.
    */
    public static function ajouterHopital(){
       
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $service = VariableExterne::verifChampOptionnel('service');
        $niveau = $service;
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');

        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();
        
        HopitalGateway::ajouterHopital($nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn,
                                       $cafeParent, $parkingPayant, $convention, $visiteBenevole);
    }
    
    /**
    * Fonction de supression d'un hôpital. 
    * 
    * Permet de suprimer un hôpital par son id.
    * @param idHopital correspond à l'id de l'hôpital à suprmer.
    */
    public static function supprimerHopital($idHopital){
        HopitalGateway::supprimerHopital($idHopital);
        RelationGateway::supprimerRelationForHopital($idHopital);
    }
    
    /**
    * Fonction de modification d'un hôpital. 
    * 
    * Permet de modifier un hôpital.
    * @param idHopital correspond à l'id de l'hôpital à modifier.
    * @return retourne l'hôpital modifier.
    */
    public static function modifierHopital($idHopital){
        
        $nomHopital = VariableExterne::verifChampObligatoire('nomHopital', 'nomHopital');
        $service = VariableExterne::verifChampObligatoire('service', 'service');
        $niveau = $service;
        $nbLits = VariableExterne::verifChampOptionnel('nbLits');
        $nbPremaParAn = VariableExterne::verifChampOptionnel('nbPremaParAn');
        $cafeParent = VariableExterne::verifChampOptionnel('cafeParent');
        $parkingPayant = VariableExterne::verifChampOptionnel('parkingPayant');
        $convention = VariableExterne::verifChampOptionnel('convention');
        $visiteBenevole = VariableExterne::verifChampOptionnel('visiteBenevole');
        $contactHopital = VariableExterne::verifChampOptionnel('contactH');
        $idcontact = VariableExterne::verifChampOptionnel('idContact');
        
        $idAdresse = ModelGestionLieu::gestionAjoutModifAdresse();
        
        ModelContactHopital::ajouterContactHopital($idHopital);
        ModelRelation::ajouterRelation($idHopital, $idcontact);
        
        HopitalGateway::modifierHopital($idHopital, $nomHopital, $idAdresse, $niveau, $service, $nbLits, $nbPremaParAn, $cafeParent, $parkingPayant, $convention, $visiteBenevole);
        return HopitalGateway::rechercherHopital($idHopital);
    }
}

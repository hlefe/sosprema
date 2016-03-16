<?php
/**
* Classe ModelContactHopital
*
* Modèle pour ContactHopital
* @package modele
*/
class ModelContactHopital {
    
    /**
    * Fonction d'ajout d'un contact hôpital. 
    * 
    * Permet d'ajouter un contact hôpital.
    * @param idHopital correspond à l'id de l'hôpital auquel est rattaché le contact hôpital.
    */
    public static function ajouterContactHopital($idHopital)
    {
        $nom = VariableExterne::verifChampOptionnel('nom','nom');
        $prenom = VariableExterne::verifChampOptionnel('prenom', 'prenom');
        $profession = VariableExterne::verifChampOptionnel('profession','profession');
        $numero = VariableExterne::verifChampOptionnel('numero');
        if ($nom != NULL && $prenom != NULL && $profession != NULL && $numero != NULL){
            ContactHopitalGateway::ajouterContactHopital($idHopital, $nom, $prenom, $profession, $numero);
        }
    }
    
    /**
    * Fonction de recherche d'un contact hôpital. 
    * 
    * Permet de rechercher un contact hôpital par son id.
    * @param idContactHopital correspond à l'id du contact hôpital rechercher.
    * @return le resultat de la recherche.
    */
    public static function rechercherContactHopital($idContactHopital){
        return ContactHopitalGateway::rechercherContactHopital($idContactHopital);
    }
    
    /**
    * Fonction de récupération de l'ensemble des contact hôpitaux. 
    * 
    * Permet de récupérer l'ensemble des contact hôpitaux'.
    * @return retourne le résultat de la récupération.
    */
    public static function getAll(){
        return ContactHopitalGateway::getAll();
    }
    
    /**
    * Fonction de suppression d'un contact hôpital. 
    * 
    * Permet de suprimer un contact hôpita.
    * @param idContactHopital correspond à l'id du contact hôpital à supprimer.
    */
    public static function supprimerContactHopital($idContactHopital){
        ContactHopitalGateway::supprimerContact($idContactHopital);
    }
    
    /**
    * Fonction de modification d'un contact. 
    * 
    * Permet de modifier un contact hôpital.
    * @param idContactHopital correspond à l'id du contact hopital à modifier.
    * @param idHopital correspond à l'id de l'hôpital du contact hôpital.
    * @param nom correspond au nom du contact hôpital.
    * @param prenom correspond au prénom du contact hôpital.
    * @param profession correspond à la profession du contact.
    * @return retourne le résultat de la modification.
    */
    public static function modifierContact($idContactHopital, $idHopital, $nom, $prenom, $profession)
    {
        $idHopital = VariableExterne::verifChampObligatoire('idHopital', 'idHopital');
        $nom = VariableExterne::verifChampObligatoire('nom','nom');
        $prenom = VariableExterne::verifChampObligatoire('prénom', 'prenom');
        $profession = VariableExterne::verifChampObligatoire('profession','profession');
        
        return ContactHopitalGateway::ajouterContactHopital($idContactHopital, $idHopital, $nom, $prenom, $profession);
    }

    /**
    * Fonction de récupération des contacts hôpital d'un hôpital donné. 
    * 
    * Permet de récupérer les contact hôpital d'un hôpital.
    * @param idHopital correspond à l'id de l'hôpital.
    * @return retourne le résultat de la récupération.
    */
    public static function rechercherContactHopitalByHopital($idHopital){
        return ContactHopitalGateway::rechercherContactHopitalByHopital($idHopital);
    }
}
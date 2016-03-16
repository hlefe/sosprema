<?php
/**
* Classe ModelContactHopital
*
* Modèle pour Relation
* @package modele
*/
class ModelRelation {

	/**
    * Fonction de recherche les contacts locaux par leurs hôpitaux. 
    * 
    * Permet de rechercher les contacts locaux par leurs hôpitaux.
    * @param idHopital correspond à l'id de l'hôpital dont on recherche les contacts locaux.
    * @return l'ensemble des contacts locaux de l'hôpital.
    */
	public static function rechercherContactLocalByIdHopital($idHopital){
		return RelationGateway::rechercherContactLocalByIdHopital($idHopital);	
	}
    
    /**
    * Fonction de test afin de savoir si le contact local et en liens avec l'hôpital. 
    * 
    * Permet de tester afin de savoir si le contact local et en liens avec l'hôpital.
    * @param idHopital correspond à l'id de l'hôpital concerné.
    * @param idContact correspond à l'id du contact local concerné.
    * @return la relation si elle existe.
    */
    public static function rechercherContactLocalInHopital($idHopital, $idContact){
        return RelationGateway::rechercherContactLocalInHopital($idHopital, $idContact);
    }

    /**
    * Fonction d'ajout d'une relation entre un contact local et un hôpital. 
    * 
    * Permet d'ajouter une relation entre un contact local et un hôpital.
    * @param idHopital correspond à l'id de l'hôpital concerné.
    * @param idContact correspond à l'id du contact local concerné.
    * @return result permet de savoir si l'ajout à réussi sinon il est null.
    */
	public static function ajouterRelation($idHopital, $idContactLocal){
        $result=null;
        if($idHopital !=null && $idContactLocal != null && $idContactLocal != 0){
            $result = RelationGateway::ajouterRelation($idHopital, $idContactLocal);
        }
		return $result;
	}

	/**
    * Fonction de supression d'une relation entre un cotact local et un hôpital. 
    * 
    * Permet de suprimer une relation entre un cotact local et un hôpital.
    * @param idHopital correspond à l'id de l'hôpital concerné.
    * @param idContact correspond à l'id du contact local concerné.
    */
	public static function supprimerRelation($idHopital,$idContactLocal){
		RelationGateway::supprimerRelation($idHopital, $idContactLocal);
	}

	/**
    * Fonction de supression de l'ensemble des relation concernant un hôpital. 
    * 
    * Permet de suprimer l'ensemble des relations concernant un hôpital.
    * @param idHopital correspond à l'id de l'hôpital concerné.
    */
	public static function supprimerRelationForHopital($idHopital){
		RelationGateway::supprimerRelationForHopital($idHopital);
	}

	/**
    * Fonction de supression de l'ensemble des relation concernant un contact local. 
    * 
    * Permet de suprimer l'ensemble des relations concernant un contact local.
    * @param idContact correspond à l'id du contact local concerné.
    */
	public static function supprimerRelationForContact($idContact){
		RelationGateway::supprimerRelationForContact($idContact);
	}
}
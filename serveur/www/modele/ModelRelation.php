<?php

class ModelRelation {
	public static function rechercherContactLocalByIdHopital($idHopital){
		return RelationGateway::rechercherContactLocalByIdHopital($idHopital);	
	}
    
    public static function rechercherContactLocalInHopital($idHopital, $idContact){
        return RelationGateway::rechercherContactLocalInHopital($idHopital, $idContact);
    }

	public static function ajouterRelation($idHopital, $idContactLocal){
        $result=null;
        if($idHopital !=null && $idContactLocal != null){
            $result = RelationGateway::ajouterRelation($idHopital, $idContactLocal);
        }
		return $result;
	}

	public static function supprimerRelation($idHopital,$idContactLocal){
		RelationGateway::supprimerRelation($idHopital, $idContactLocal);
	}

	public static function supprimerRelationForHopital($idHopital){
		RelationGateway::supprimerRelationForHopital($idHopital);
	}

	public static function supprimerRelationForContact($idContact){
		RelationGateway::supprimerRelationForContact($idContact);
	}
}
<?php

class ModelRelation {
	public static function rechercherContactLocalByIdHopital($idHopital){
		return RelationGateway::rechercherContactLocalByIdHopital($idHopital);	
	}

	public static function ajouterRelation($idHopital, $idContactLocal){
		return RelationGateway::ajouterRelation($idHopital, $idContactLocal);
	}

	public static function supprimerRelation($idHopital,$idContactLocal){
		RelationGateway::supprimerRelation($idHopital, $idContactLocal);
	}
}
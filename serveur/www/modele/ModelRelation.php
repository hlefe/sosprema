<?php

class ModelRelation {
	public static function rechercherContactLocalByIdHopital($idHopital){
		return NiveauGateway::rechercherNom($idHopital);	
	}

	public static function ajouterRelation($idHopital, $idContactLocal){
		return NiveauGateway::rechercheridNiveau($idHopital, $idContactLocal);
	}

	public static function getAll(){
		return NiveauGateway::getAll();
	}
}
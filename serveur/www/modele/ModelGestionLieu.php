<?php
/**
* Classe ModelGestionLieu
*
* Modèle pour GestionLieu
* @package modele
*/
class ModelGestionLieu {
	public static function verifierPresenceVille($nomVille, $codePostal, $idDepartement){
		$ville=VilleGateway::rechercherVille($nomVille,$codePostal);
		if($ville!=NULL){
	    	return $ville['idVille'];
	    }
		VilleGateway::ajouterVille($nomVille,$codePostal, $idDepartement);
		$ville=VilleGateway::rechercherVille($nomVille,$codePostal);
		return $ville['idVille'];
	}

	public static function verifierPresenceDepartement($nomDepartement, $idRegion){
		$departement = DepartementGateway::rechercherDepartement($nomDepartement);
		if($departement!=NULL){
	    	return $departement['idDepartement'];
	    }
		DepartementGateway::ajouterDepartement($nomDepartement, $idRegion);
		$departement = DepartementGateway::rechercherDepartement($nomDepartement);
		return $departement['idDepartement'];
	}

	public static function verifierPresenceRegion($nomRegion){
		$region = RegionGateway::rechercherRegion($nomRegion);
		if($region != NULL){
			return $region['idRegion'];
		}
		RegionGateway::ajouterRegion($nomRegion);
		$region = RegionGateway::rechercherRegion($nomRegion);
		return $region['idRegion'];
	}

	public static function verifierPresenceAdresse($numRue, $nomRue, $idVille){
		$adresse = AdresseGateway::rechercherAdresse($numRue, $nomRue, $idVille);
		if($adresse != NULL){
			return $adresse['idAdresse'];
		}
		AdresseGateway::ajouterAdresse($numRue, $nomRue, $idVille);
		$adresse = AdresseGateway::rechercherAdresse($numRue, $nomRue, $idVille);
		return $adresse['idAdresse'];
	}

	public static function gestionAjoutModifAdresse(){
		$numRue=VariableExterne::verifChampOptionnel('numRue');
        $nomRue=VariableExterne::verifChampOptionnel('nomRue');
        $codePostal=VariableExterne::verifChampOptionnel('codePostal');
        $nomVille=VariableExterne::verifChampOptionnel('nomVille');
        $nomRegion=VariableExterne::verifChampOptionnel('nomRegion');
        $nomDepartement=VariableExterne::verifChampOptionnel('nomDepartement');

        $idRegion = ModelGestionLieu::verifierPresenceRegion($nomRegion);
        $idDepartement = ModelGestionLieu::verifierPresenceDepartement($nomDepartement, $idRegion);
        $idVille = ModelGestionLieu::verifierPresenceVille($nomVille, $codePostal, $idDepartement);
        $idAdresse = ModelGestionLieu::verifierPresenceAdresse($numRue, $nomRue, $idVille);
        return $idAdresse;
	}
}
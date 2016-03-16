<?php
/**
* Classe ModelGestionLieu
*
* Modèle pour GestionLieu
* @package modele
*/
class ModelGestionLieu {

	/**
    * Fonction de vérification de la présence d'une ville en base. 
    * 
    * Permet de vérifier si la ville est en base ou nom pour ne pas l'ajouter plusieur fois.
    * @param nomVille correspond au nom de la ville rechercher.
    * @param codePostal correspond au code postal de la ville à rechercher.
    * @param idDepartement correspond à l'id du département ou se trouve la ville.
    * @return retourne l'id de la ville trouver ou si elle n'est pas trouvé, l'ajoute en base.
    */
	public static function verifierPresenceVille($nomVille, $codePostal, $idDepartement){
		$ville=VilleGateway::rechercherVille($nomVille,$codePostal);
		if($ville!=NULL){
	    	return $ville['idVille'];
	    }
		VilleGateway::ajouterVille($nomVille,$codePostal, $idDepartement);
		$ville=VilleGateway::rechercherVille($nomVille,$codePostal);
		return $ville['idVille'];
	}

	/**
    * Fonction de vérification de la présence d'un département en base. 
    * 
    * Permet de vérifier si le département est en base ou nom pour ne pas l'ajouter plusieur fois.
    * @param nomDepartement correspond au nom de la rechercher.
    * @param idRegion correspond à l'id de la région ou se trouve le département.
    * @return retourne l'id du département trouver ou si il n'est pas trouvé, l'ajoute en base.
    */
	public static function verifierPresenceDepartement($nomDepartement, $idRegion){
		$departement = DepartementGateway::rechercherDepartement($nomDepartement);
		if($departement!=NULL){
	    	return $departement['idDepartement'];
	    }
		DepartementGateway::ajouterDepartement($nomDepartement, $idRegion);
		$departement = DepartementGateway::rechercherDepartement($nomDepartement);
		return $departement['idDepartement'];
	}

	/**
    * Fonction de vérification de la présence d'une région en base. 
    * 
    * Permet de vérifier si la région est en base ou nom pour ne pas l'ajouter plusieur fois.
    * @param nomRegion correspond au nom de la région de la rechercher.
    * @return retourne l'id de la région trouver ou si elle n'est pas trouvé, l'ajoute en base.
    */
	public static function verifierPresenceRegion($nomRegion){
		$region = RegionGateway::rechercherRegion($nomRegion);
		if($region != NULL){
			return $region['idRegion'];
		}
		RegionGateway::ajouterRegion($nomRegion);
		$region = RegionGateway::rechercherRegion($nomRegion);
		return $region['idRegion'];
	}

	/**
    * Fonction de vérification de la présence d'une adresse en base. 
    * 
    * Permet de vérifier si l'adresse est en base ou nom pour ne pas l'ajouter plusieur fois.
    * @param numRue correspond au numèro de la rue de la nouvelle adresse.
    * @param nomRue correspond au nom de la rue rechercher.
    * @param idVille correspond à l'id de la ville à rechercher.
    * @return retourne l'id de l'adresse trouver ou si elle n'est pas trouvé, l'ajoute en base.
    */
	public static function verifierPresenceAdresse($numRue, $nomRue, $idVille){
		$adresse = AdresseGateway::rechercherAdresse($numRue, $nomRue, $idVille);
		if($adresse != NULL){
			return $adresse['idAdresse'];
		}
		AdresseGateway::ajouterAdresse($numRue, $nomRue, $idVille);
		$adresse = AdresseGateway::rechercherAdresse($numRue, $nomRue, $idVille);
		return $adresse['idAdresse'];
	}

	/**
    * Fonction de gestion de l'ajout d'une adresse. 
    * 
    * Permet de l'ajout et la modification de la nouvelle adresse.
    * @return idAdresse retourne l'id de l'adresse ajouter ou rechercher.
    */
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
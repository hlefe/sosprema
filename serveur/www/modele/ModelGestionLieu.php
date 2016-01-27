<?php

class ModelGestionLieu {
	public static function verifierPresenceLieu($typeLieu, $variable){
		if($typeLieu == 'region')
			if(RegionGateway::rechercherRegion($variable)==NULL){
	            RegionGateway::ajouterRegion($variable);
	        }
	    elseif($typeLieu == 'ville')
			if(VillGateway::rechercherVille($variable)==NULL){
	            RegionGateway::ajouterVille($variable);
	        }
	    elseif($typeLieu == 'Departement')
			if(DepartementGateway::rechercherDepartement($variable)==NULL){
	            DepartementGateway::ajouterDepartement($variable);
	        }
	}
}
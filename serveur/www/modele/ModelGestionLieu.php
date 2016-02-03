<?php

class ModelGestionLieu {
	public static function verifierPresenceLieu($typeLieu, $variable){
	    if($typeLieu == 'ville')
			if(VilleGateway::rechercherVille($variable)==NULL){
	            VilleGateway::ajouterVille($variable);
	        }
	}
}
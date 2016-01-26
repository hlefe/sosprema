<?php

class ModelGestionLieu {
	public verifierPresenceLieu($nomGateway, $variable){
		if($nomGateway::rechercherRegion($variable)==NULL){
            $nomGateway::ajouterRegion($variable);
        }
	}
}
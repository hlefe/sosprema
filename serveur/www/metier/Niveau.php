<?php
/**
* Classe niveau
*
* Métier de niveau
* @package metier
*/
class niveau {
	private $idNiveau;
	private $libelle;

	/**
    * Fonction de construction de l'objet. 
    * 
    * Permet de construire l'objet avec les bonnes valeurs.
    * @param param correspond au tableau avec comme clef les propriétés et comme valeur la valeur de la propriété.
    */
	public function __construct($idNiveau, $libelle){
		$this->idNiveau = $idNiveau;
		$this->libelle = $libelle;
	}

	/**
    * Fonction de récupération de la valeur d'une propriété. 
    * 
    * Permet de récupérer la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @return result retourne la valeur de la propriété demandée.
    */
	public function __get($property){
		return $this->$property;
	}

	/**
    * Fonction de modification de la valeur d'une propriété. 
    * 
    * Permet de modifier la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @param value correspond à la nouvelle valeur de la propriété.
    */
	public function __set($property, $value){
		$this->$property = $value;
	}
}
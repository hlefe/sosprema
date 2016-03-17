<?php
/**
* Classe page
*
* Métier de page
* @package metier
*/
class page {
	private $id;
	private $nom;
    private $url;
    private $droit;

    /**
    * Fonction de construction de l'objet. 
    * 
    * Permet de construire l'objet avec les bonnes valeurs.
    * @param param correspond au tableau avec comme clef les propriétés et comme valeur la valeur de la propriété.
    */
	public function __construct($param){
       foreach ($param as $key=>$value){
            if ('id' == $key) {
                $this->id = $value;
            } 
            elseif ('nom' == $key) {
                $this->nom = $value;
            } 
            elseif ('url' == $key) {
                $this->url = $value;
            } 
            elseif ('droit' == $key) {
                $this->droit = $value;
            } 
       }
	}

	/**
    * Fonction de récupération de la valeur d'une propriété. 
    * 
    * Permet de récupérer la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @return result retourne la valeur de la propriété demandée.
    */
	public function __get($property){
		if('id'==$property){
			return $this->id;
		}elseif('nom'==$property){
			return $this->nom;
		}elseif('url'==$property){
			return $this->url;
		}elseif('droit'==$property){
			return $this->droit;
		}else{
			return null;
		}
	}

	/**
    * Fonction de modification de la valeur d'une propriété. 
    * 
    * Permet de modifier la valeur d'une propriété.
    * @param property correspond à la propriété.
    * @param value correspond à la nouvelle valeur de la propriété.
    */
	public function __set($property, $value){
		if('id'==$property){
			$this->id = $value;
		}elseif('nom'==$property){
			$this->nom = $value;
		} elseif('url'==$property){
			$this->url = $value;
		} elseif('droit'==$property){
			$this->droit = $value;
		}else{
			return;
		}
	}
}
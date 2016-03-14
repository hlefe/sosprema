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
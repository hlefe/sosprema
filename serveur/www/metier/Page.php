<?php

class page {
	private $id;
	private $nom;
    private $url;
    private $droit;

	/*public function __construct($param){
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
	}*/

	//Getter
    public function __get($property) {
        //Utilisation d'une variable dynamique   
        return $this->$property;
    }

//Setter
    public function __set($property, $value) {
        //Utilisation d'une variable dynamique 
        $this->$property = $value;
    }

//Constructeur
    public function __construct($param) {
        foreach ($param as $key=>$value){
            //Utilisation d'une variable dynamique
            $this->$key = $value;
        }
    }
}
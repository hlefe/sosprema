<?php


class hopital {

    private $idHopital;
    private $nomHopital; 
    private $idAdresse;
    private $service;
    private $nbLits;
    private $nbPremaParAn;
    private $cafeParent;
    private $parkingPayant;
    private $convention;
    private $visiteBenevole;

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __construct($param) {

        foreach($param as $key=>$value){
            $this->$key = $value;
        }
    }
}


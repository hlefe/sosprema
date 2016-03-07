<?php

class ContactLocal {

	private $idContact;
	private $idUtilisateur; 
	private $datePremierEngagement;
	private $dateRenouvellement;
	private $dateSenior;
	private $visitesBenevoles;
	private $conventionHopital; 
	private $conventionCAMSP;
	private $conventionPMI;
	private $charteVisiteur;

	 public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __construct($param) {

        foreach ($param as $key=>$value){
                $this->$key = $value;
        }
    }
}
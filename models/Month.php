<?php

Class Month {
    public $mois_courant;
    private $monthName;

    public function __construct(int $mois_courant){
        $this->setMois_courant($mois_courant);
    }

    public function getMois_Courant() {
        return $this->mois_courant;
    }

    public function setMois_Courant($mois_courant) {
        $this->mois_courant = $mois_courant;
    }

    public function getMonth() : string {
        return $this->monthName;
    }

    public function setMonth(string $name) {
        $this->monthName = $name;
    }


function monthName() {
    $mois = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
    $this->monthName .= $mois[$this->setMois_Courant($this->getMois_Courant())];
}
}
?>
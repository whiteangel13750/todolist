<?php

Class Month {
    private $year;
    private $monthName;

    public function __construct(int $monthNum, int $year){
        $this->setmonthName($monthNum);
        $this->year = $year;
    }

  public function getmonthName() : string {
        return $this->monthName;
    }

    public function setmonthName(int $num) {
        $mois = [1=>'Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
        $this->monthName = $mois[$num];
    } 
    
    public function getYear() : int {
        return $this->year;
    }

    public function setYear(int $year) {
        $this->year = $year;
    }

}
?>

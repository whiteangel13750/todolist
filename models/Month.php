<?php
// date_default_timezone_set('Europe/Paris');
// $now = date("d/m/Y H:i:s");
// echo $now;
// echo "<br>";
// date_default_timezone_set('America/Los_Angeles');
// $now = date("d/m/Y H:i:s");
// echo $now;


// $date = new DateTimeImmutable("now", new DateTimeZone("Europe/Paris"));
// var_dump($date);

// $annee_courante = $date->format('Y');
// var_dump($annee_courante);
// $mois_courant= $date->format('m');
// var_dump($mois_courant);
// $jour_courant= $date->format('d');
// var_dump($jour_courant);

// $premier = $date->modify('last monday of this month');
// var_dump($premier);

Class Month {
    private $monthName;

    public function getMonth() {
        return $this->monthName;
    }

    public function setMonth($month) {
        $this->monthName = $month;
    }

function monthName($month) {
    $month = $this->format('m');
}

}

$month = new Month(5);
var_dump($month);

?>
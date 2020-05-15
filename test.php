<?php

// $array = [];

// $texte = "Bonjour et au revoir ! Je m'appelle John Doe, j'ai 27 ans, j'habite en France et travaille depuis que j'ai 20 ans. Ma passion : écrire des mots, mits, mets, mats, mat... Pour me contacter, vous pouvez envoyer un email à contact@johndoe.fr ou contact@johndoe.com ou bien m'appeler au 06 07 08 09 10. Vous pouvez aussi aller voir mon blog à l'adresse johndoe-blog.fr. Bonjour et au revoir";
// echo $texte;

// var_dump(preg_match_all('#m[\w]ts#', $texte, $array, PREG_OFFSET_CAPTURE));

// var_dump($array);

// $numero ="03-90-73-42-60";

// if (preg_match('#(0|\+33)[1-9](( |/|-)*[0-9]{2}){4}#', $numero)) {
//     echo "Le numéro de téléphone entré est correct.";
//     // On peut ajouter le numéro à la base de donnée
// } else {
//     echo "Le numéro de téléphone entré est incorrect.";
//     // On ne peut pas ajouter le numéro à la base de donnée
// }

// $nom =["Dupont", "Henri", "9ieux", "Goût", "G3ntil", "Géorges", "L'Hotellier","Martïn"];

// foreach($nom as $value){
//     if (preg_match("#^[a-zA-ZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØŒŠþÙÚÛÜÝŸàáâãäåæçèéêëìíîïðñòóôõöøœšÞùúûüýÿ' ()]*$#", $value)) {
//         echo "Le nom entré est correct.<br>";
//     } else {
//         echo "Le nom entré est incorrect.<br>";
//     }
// }

// date_default_timezone_set('Europe/Paris');
// $now = date("d/m/Y H:i:s");
// echo $now;
// echo "<br>";
// date_default_timezone_set('America/Los_Angeles');
// $now = date("d/m/Y H:i:s");
// echo $now;


$date = new DateTimeImmutable("now", new DateTimeZone("Europe/Paris"));

$annee_courante = $date->format('Y');

$mois_courant= $date->format('m');

$jour_courant= $date->format('d');

echo "Nous sommes le $jour_courant/$mois_courant/$annee_courante";

require "models/Month.php";
$month = new Month($mois_courant);

?>
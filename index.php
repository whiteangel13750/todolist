<?php

// Demarre une session utilisateur
session_start();

// On requiere le fichier global qui correspond à la base de donnée
require "conf/global.php";

// FRONT CONTROLLER -> Toutes les requêtes arrivent ici et sont traitées par le ROUTER
// ------------------------------------------------------------------------------------
// 1. INCLUSIONS CLASSES
// Dans un premier temps, nous allons inclure les fichiers de nos classes ici pour pouvoir les utiliser

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")){
        require_once "models/$class.php";
    }
});


// ------------------------------------------------------------------------------------
// 2. ROUTER
// Structure permettant d'appeler une action en fonction de la requête utilisateur

$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";

switch($route) {
    case "home" : $view = showHome();
        break;
    case "insert_user" : insertUser();
        break;
    case "connect_user" : connectUser();
        break;
    case "update_user" : updateUser();
        break; 
    case "delete_user" : deleteUser();
        break;      
    case "insert_tache" : insertTache();
        break;
    case "update_tache" : updateTache();
        break; 
    case "delete_tache" : deleteTache();
        break;   
    case "deconnect" : deconnectUser();
        break;
    default : $view= showHome();
}

// ------------------------------------------------------------------------------------
// 3. FONCTIONS DE CONTROLE
// Actions déclenchées en fonction du choix de l'utilisateur
// 1 choix = 1 fonction avec deux "types" de fonctions, celles qui mèneront à un affichage, et celles qui seront redirigées (vers un choix conduisant à un affichage)

// Fonctionnalité(s) d'affichage :

function showHome(): string {

    return "home.html";

    $datas = [$datas["mois"] = $month->getmonthName(),$datas["annee"] = $month->getYear()];
	// il suffit désormais de mettre dans $datas les données à transmettre à notre vue
    // par exemple $datas["annee"] = 2020;
	return ["template" => "home.html", "datas" => $datas];
}

function showMembre() {

    $user = new Utilisateurs();
    $user->selectAll();
    
    return "membre.php";
        }
    

// Fonctionnalité(s) redirigées :

function insertUser() {
if(preg_match("#^[a-zA-Z0-9]*$#", $_POST['pseudo']) &&
preg_match("#^[a-zA-Z0-9]*$#", $_POST['password'])){
    echo "Le pseudo et le mot de passe sont corrects";
    if(!empty($_POST['pseudo'] && !empty($_POST['password']))){
$user = new Utilisateurs();
$user-> setPseudo($_POST['pseudo']);
$user-> setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
$user->insert();
$pseudo= isset($_POST['pseudo'])? $_POST['pseudo'] : "null";
$password= isset($_POST['password'])? $_POST['password'] : "null";
$_SESSION['pseudo']=$pseudo;
$_SESSION['password']=$password;
}
header('Location:index.php');
}else {
    echo "Le pseudo et le mot de passe sont incorrects";
}}

function connectUser() {
    if(!empty($_POST['pseudo'] && !empty($_POST['password']))){
        $user = new Utilisateurs();
        $user-> setPseudo($_POST['pseudo']);
        $user-> setPassword($_POST['password']);
        $reponse = $user->selectByPseudo();
        if ($reponse && password_verify($_POST['password'],$reponse['password'])){
            $_SESSION['id'] = $reponse['id_user'];
            $_SESSION['pseudo']= $reponse['pseudo'];
            $_SESSION['password']=$reponse['password'];
            header('Location:monespace.php');
        }else {
            header('Location:index.php');
        }
        }
    }

    function updateUser() {
        $user = new Utilisateurs();
        $user->update();
            }
    
    function deleteUser() {
            $user = new Utilisateurs();
            $user->delete();
            return "delete.php";
                }

    function deconnectUser() {
    unset($_SESSION['pseudo']);
    header('Location:index.php');
        }

    function insertTache() {
         if(!empty($_POST['description'] && !empty($_POST['date']))){
            $user = new Tache();
            $user-> setIdUtilisateur($_SESSION['id']);
            $user-> setDescription($_POST['description']);
            $user-> setDate($_POST['date']);
            $user->insert();
            header('Location:monespace.php');
            }
    }

    function updateTache() {
        $user = new Tache();
        $user->update();
        return "updatetache.php";
            }

    function deleteTache() {
            $user = new Tache();
            $user->delete();
                    }

    // ------------------------------------------------------------------------------------
// 4. TEMPLATE
// Affichage du système de templates HTML

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma TODO-LIST</title>
</head>
<body>
    <?php require "views/{$view['template']}";?>
    
</body>
</html> 
<?php

// On requiert le fichier utilisateurs.php pour permettre d'ajouter les informations utilisateurs à nos taches
require 'utilisateurs.php';

// La classe instancie une nouvelle tache. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
// Elle requiert les méthodes afin d'agrémenter la base
class Tache extends Dbconnect {
    public $idTache;
    public $description;
    public $date;
    public $idUtilisateur;
// Le construct permet d'établir une structure de notre tache
    function __construct($id=null) {
     parent::__construct($id);
}
// La syntaxe get permet de lier une propriété d'un objet à une fonction qui sera appelée lorsqu'on accédera à la propriété.
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
// La syntaxe set permet de lier une propriété d'un objet à une fonction qui sera appelée à chaque tentative de modification de cette propriété.
    public function setIdUtilisateur(int $id) {
        $this->idUtilisateur = $id;
    }

    public function getDescription($description) {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    
    public function getDate($date) {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }

    public function getIdTache() {
        return $this->idTache;
    }

    public function setIdTache(int $id2) {
        $this->idTache = $id2;
    }

 // Permet d'enregistrer une tache en encodant le fichier json. 
    public function save_tache() {
        $file = file_get_contents("tache.json");
        $tab = json_decode($file, false, 512, 0);
        array_push($tab,["idTache"=>sizeof($tab)+1,"idUtilisateur"=>$_SESSION['id'], "description"=> $this->description, "date" => $this->date]);
        file_put_contents('tache.json', json_encode($tab));       
    }

   // Permet d'inserer une tache dans la base de donnée. 
    public function insert(){
        var_dump($this);
        $query1 = "INSERT INTO tasks (DESCRIPTION,DEADLINE, ID_USER) VALUES ('$this->description','$this->date', $this->idUtilisateur)";
        $result1 = $this->pdo->prepare($query1);
        $result1->execute();
        $id2 = $this->pdo->lastInsertId();
        var_dump($this);
        return $this;

    }

  // Permet de selectionner toutes les taches dans la base de donnée. 
public function selectAll(){
        $query ="SELECT * FROM tasks;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll();

        $tab=[];

        foreach($datas as $data) {
            $current = new Tache();
            $current->setId($data['ID_TASK']);
            array_push($tab, $current);
            }
            return $tab;

    }

// Permet de selectionner une tache dans la base de donnée. 
public function select(){
    $query2 = "SELECT * FROM tasks WHERE ID_TASK = $this->idTache;";
    $result2 = $this->pdo->prepare($query2);
    $result2->execute();
    $data2 = $result2->fetch();
            //appel aux setters de l'objet
        return $this;
    }

// Permet de modifier une tache dans la base de donnée. 
    public function update(){
            $query ="UPDATE * FROM tasks WHERE ID_TASK = $this->idTache;";
            $result = $this->pdo->prepare($query);
            $result->execute();
            $data = $result->fetch();
                    //appel aux setters de l'objet
                return $this;
    }

// Permet de supprimer une tache dans la base de donnée. 
    public function delete(){
        $query ="DELETE * FROM tasks WHERE ID_TASK = $this->idTache;";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $data = $result->fetch();
            //appel aux setters de l'objet
        return $this;
    }

}

?>



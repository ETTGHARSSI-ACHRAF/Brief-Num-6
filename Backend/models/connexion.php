<?php
class Connexion{
    private $host="localhost";
    private $database="brief6";
    private $user="root";
    private $password="";
    private $con;
    private $query;

    public function __construct(){
        try {
            $this->con=new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->user,$this->password);
        } catch (PDOException $e) {
            print "ERREUR : ".$e->getMessage()."<br/>";
        }   
    }
    public function execution($var){
        $this->query=$this->con->prepare($var);
        $this->query->execute();
    }
    public function selectAll(){
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function rowcount(){
        return $this->query->rowCount();
    }
}

?>
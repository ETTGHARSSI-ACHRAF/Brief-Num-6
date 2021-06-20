<?php
require_once 'connexion.php';
class Rendezvous
{
    private $Id;
    private $DateConsult;
    private $TypeConsult;
    private $Horaire;
    private $Reference;
    private $db;

    function __construct()
    {
       $this->db=new Connexion();
    }
    //---seterse-----
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
        return $this;
      }

    function creat()
    {
        $this->db->execution("INSERT INTO `rendezvous`(`DateConsult`, `TypeConsult`, `Horaire`, `Reference`) VALUES ('".$this->DateConsult."','".$this->TypeConsult."','".$this->Horaire."','".$this->Reference."')");
    }
    function update()
    {
        $this->db->execution("UPDATE `rendezvous` SET `DateConsult`='".$this->DateConsult."',`TypeConsult`='".$this->TypeConsult."',`Horaire`='".$this->Horaire."',`Reference`='".$this->Reference."' WHERE Id=".$this->Id);
    }
    function delete(){
        $this->db->execution("DELETE FROM `rendezvous` WHERE Id=".$this->Id);
    }
    function readAll(){
        $this->db->execution("SELECT * FROM `rendezvous`");
        return $this->db->selectAll();
    }
    
    function readWithId()
    {
        $this->db->execution("SELECT * FROM `rendezvous` WHERE Id=".$this->Id);
        return $this->db->selectAll();
    }

    function readWithRefe()
    {
        $this->db->execution("SELECT * FROM `rendezvous` WHERE Reference='".$this->Reference."'");
        return $this->db->selectAll();
    }
      
}
?>
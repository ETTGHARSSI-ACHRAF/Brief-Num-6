<?php
require_once 'connexion.php';
class Client
{
    private $Reference;
    private $Nom;
    private $Prenom;
    private $Email;
    private $Age;
    private $Tele;
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
        $this->db->execution("INSERT INTO `client`(`Reference`, `Nom`, `Prenom`, `Email`, `Age`, `Tele`) VALUES ('".$this->Reference."','".$this->Nom."','".$this->Prenom."','".$this->Email."',".$this->Age.",'".$this->Tele."')");
        $headre='frome:achraf.ettgharssi1997@gmail.com';
        mail($this->Email,'Rerefernce',$this->Reference,$headre);
    }
    function serch(){
      $this->db->execution("SELECT * FROM `client` WHERE Reference='$this->Reference'");
      return $this->db->rowcount();
    }
}
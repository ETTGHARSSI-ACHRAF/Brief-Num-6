<?php

require_once __DIR__.'/../models/client.php';
class ApiClient{
    function handle_request()
    {
        return json_decode(file_get_contents('php://input'));
    }

    //reference aleatiore
    public function uniqidReal($lenght = 7) {

        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
    
    //ajouter colone dans la table client
    function Create(){
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            $requestBody=$this->handle_request();
            $Reference=$this->uniqidReal();
            $Nom= $requestBody->Nom;
            $Prenom=$requestBody->Prenom;
            $Email= $requestBody->Email;
            $Age= $requestBody->Age;
            $Tele= $requestBody->Tele;
            $clt=new Client();
            $clt->Reference=$Reference;
            $clt->Nom=$Nom;
            $clt->Prenom=$Prenom;
            $clt->Email=$Email;
            $clt->Age=$Age;
            $clt->Tele=$Tele;
            $clt->creat();  
            echo json_encode($Reference);
        }
            
    }
    //recherche d'une referece
    function SelectRef($ref){
        if($_SERVER["REQUEST_METHOD"]=='GET'){
            $clt=new Client();
            $clt->Reference=$ref;
            $result = $clt->serch();  
            echo json_encode($result);
            // echo $ref;
        }
    }
}
<?php

require_once __DIR__.'/../models/rendezvous.php';
class ApiRendezvous{
    function handle_request()
    {
        return json_decode(file_get_contents('php://input'));
    }


    //afficher la table rendez vous
    function Read(){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $rendez=new Rendezvous();
            $result =$rendez->readAll();
            echo json_encode($result);
        }  
    }
    //afficher la table rendez vous avec la condition de Id

    function SingleRead($Id){
        // $Id=$_GET['Id'];
        if($_SERVER["REQUEST_METHOD"]=="GET" && isset($Id) && !empty($Id) ){
            $rendez=new Rendezvous();
            $rendez->Id=$Id;
            $result =$rendez->readWithId();
            echo json_encode($result);
        }
    }

    //afficher la table rendez vous avec la condition de reference

    function ReadCondition($reference){
        if($_SERVER["REQUEST_METHOD"]=="GET" && isset($reference) && !empty($reference) ){
            $rendez=new Rendezvous();
            $rendez->Reference=$reference;
            $result =$rendez->readWithRefe();
            echo json_encode($result);
        }
    }
    
    //ajouter colone dans la table rendez vous

    function Create(){
        if($_SERVER["REQUEST_METHOD"]=='POST'){
            $requestBody=$this->handle_request();
            $DateConsult= $requestBody->DateConsult;
            $TypeConsult=$requestBody->TypeConsult;
            $Horaire= $requestBody->Horaire;
            $Reference=$requestBody->Reference;
            $rendez=new Rendezvous();
            $rendez->DateConsult=$DateConsult;
            $rendez->TypeConsult=$TypeConsult;
            $rendez->Horaire=$Horaire;
            $rendez->Reference=$Reference;
            $rendez->creat();
        }
            
    }

    //modifier colone dans la table rendez vous

    function Update($Id){
        if($_SERVER["REQUEST_METHOD"]=='PUT' && isset($Id) && !empty($Id)){
            $requestBody=$this->handle_request();
            $DateConsult= $requestBody->DateConsult;
            $TypeConsult=$requestBody->TypeConsult;
            $Horaire= $requestBody->Horaire;
            $Reference=$requestBody->Reference;

            $rendez=new Rendezvous();
            $rendez->Id=$Id;
            $rendez->DateConsult=$DateConsult;
            $rendez->TypeConsult=$TypeConsult;
            $rendez->Horaire=$Horaire;
            $rendez->Reference=$Reference;
            $rendez->update();
        }
    }
    
    //supprimer colone dans la table rendez vous

    function Delete($Id){
        if($_SERVER["REQUEST_METHOD"]=='DELETE' && isset($Id) && !empty($Id)){
            $rendez=new Rendezvous();
            $rendez->Id=$Id;
            $rendez->delete();
        }
    }
}
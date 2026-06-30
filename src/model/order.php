<?php
class OrderModel
{
    // création variable publique de la base de donnée
    public $db;


    // le constructeur qui se lance au moment on on instantie la classe     

    public function __construct($db){
        // il stocke la connexion dans $db

        $this->db = $db;
    }
}
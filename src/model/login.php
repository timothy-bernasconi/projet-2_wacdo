<?php

class LoginModel
{

// les propriété de ma classe loginModel, $db stocke la connexion à la base de donnée et $email et $password stock les information entrées par l'utilisateur
    public $db;
    public $email;
    public $password;

// le constructeur qui se lance au moment on on instantie la classe     
    public function __construct($db){
// il stocke la connexion dans $db
        $this->db = $db;

// vérification si le formulaire a été soumis + une sécurité pour empêcher injonction script strip_tags 
// trim retire les espaces éventuel au début / fin 
        if (!empty($_POST)) {
            $this->email = trim(strip_tags($_POST['email']));
            $this->password = trim(strip_tags($_POST['password']));
        }
    }
}
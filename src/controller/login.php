<?php

// on développe le controller 
class LoginController
{
    // une variable interne qui permet au controlleur de récupérer les variables $email et $password
    private $model;

    // le constructeur, qui prend en paramètre loginModel
    public function __construct(LoginModel $model)
    {
        // récupère le model et le sauvegarde
        $this->model = $model;

    }

    // la fonction pour retrouver l'email

    public function getUser($email)
    {
        // on crée une variable et dedans on lui fais chercher l'utilisateur 
        $query = $this->model->db->prepare("SELECT email, password FROM employees WHERE email = :email");
        // on ajoute la vraie valeur (à la place de :email)
        $query->bindValue(":email", $email);
        // on execute la requête
        $query->execute();
        // on recupère le résultat en un tableau
        return $query->fetch();
    }

    // une fonction booléenne pour valider la connexion
    public function validateLogin(): bool
    {
        // appel fonction avec l'email en question, stocké dans $result
        $result = $this->getUser($this->model->email);

        // double vérif, si le mail existe dans la base de donnée et donc pas vide et si le mdp correspond à celui qu'on a dans la base de donnée
        if (!empty($result) && password_verify($this->model->password, $result["password"])) {

        // si vrai, on valide la connexion
            $_SESSION["session_id"] = md5($result["email"]);
            $_SESSION["user_name"] = $result["firstname"];
            $_SESSION["user_ip"] = $_SERVER["REMOTE_ADDR"];

            return true;
        }

        // si faux on ne la valide pas 
        return false;
    }
}

<?php
class LoginView
{
    // deux propriétés publiques, qui stockent le controller, qui va vérif la connexion et le template qui est le chemin 
    public $controller;
    public $template;

    // le constructeur de la vue, il prend en paramètre le contrôleur et on indique le chemin d'affichage
    public function __construct(LoginController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE."login.php";
    }

    // méthode qui génère la page 
    public function render(){
        $message = "";

        // on vérifie si l'utilisateur a envoyé le formulaire
        if (!empty($_POST)) {
            // si oui, on appelle la fonction du controller, si elle retourne vrai, on accède à la page d'accueil home 
            if($this->controller->validateLogin()) {
                header("Location: index.php?page=home");
                exit;
            } else {
                // C'est ici qu'on injecte le message d'erreur !
                $message = "<div class=\"alert alert-danger\" style=\"color: red; margin-bottom: 15px;\">Impossible de se connecter avec les informations saisies</div>";
            }
        }
        // chargement du form (qui va maintenant recevoir le vrai contenu de $message)
        require($this->template);
    }
}
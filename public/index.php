<?php
session_start();

// Configuration
require_once("../config/index.php");

$dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$page = "home";
if (isset($_GET["page"]) && !empty($_GET["page"])) {
    $page = $_GET["page"];
}

$components = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
    "login" => array(
        "model" => "LoginModel", 
        "view" => "LoginView", 
        "controller" => "LoginController"
    ),

    "order" => array(
        "model" => "OrderModel",
        "view" => "OrderView",
        "controller" => "OrderController"
)
);


if (array_key_exists($page, $components)) {
    
    require_once("../src/model/" . $page . ".php");
    require_once("../src/controller/" . $page . ".php");
    require_once("../src/view/" . $page . ".php");

    $modelClass      = $components[$page]["model"];
    $controllerClass = $components[$page]["controller"];
    $viewClass       = $components[$page]["view"];

    $model      = new $modelClass($db);
    $controller = new $controllerClass($model);
    $view       = new $viewClass($controller);

    $view->render();

} else {
    header("HTTP/1.0 404 Not Found");
    echo "Erreur 404 : La page n'existe pas.";
}
?>
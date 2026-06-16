<?php
class OrderView
{
    public $controller;
    public $template;

    public function __construct(OrderController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "order.php";
    }

    public function render() {
        // le controlleur doit chercher la liste des produits
        $products = $this->controller->getProducts();

        // On charge le template. 
        require($this->template);
    }
}
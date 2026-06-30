<?php
class StockView
{
    public $controller;
    public $template;

    public function __construct(StockController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "stock.php";
    }

    public function render(){
        $products = $this->controller->getProducts();
        require($this->template);
    }
}
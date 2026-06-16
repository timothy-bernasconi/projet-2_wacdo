<?php
class OrderController
{
    private $model;

    public function __construct(OrderModel $model) {
        $this->model = $model;
    }

    public function getProducts(): array
    {
        // On prépare la requête pour récupérer tous les produits disponibles
        $query = $this->model->db->prepare("SELECT * FROM products");
        $query->execute();
        
        // on retourne tous les produits sous forme de tableau
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
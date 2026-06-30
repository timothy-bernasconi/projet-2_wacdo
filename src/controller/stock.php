<?php
class StockController
{
    // une variable $model privée
    private $model;

    // le constructeur qui prend en paramètre stockmodel
    public function __construct(StockModel $model)
    {
        
        $this->model = $model;
    }

    public function getProducts(): array
    {
        $query = $this->model->db->prepare("
            SELECT products.*, categories.name AS cat_name 
            FROM products 
            INNER JOIN categories ON categories.id = products.category_id
            ORDER BY products.id ASC
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

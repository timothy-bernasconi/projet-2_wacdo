<?php
class OrderController
{
    private $model;

    public function __construct(OrderModel $model) {
        $this->model = $model;

        // supprimer commande
        if (isset($_GET['action']) && $_GET['action'] === 'delete_order' && isset($_GET['order_id'])) {
            $orderId = intval($_GET['order_id']);
            if (isset($_SESSION['all_orders'])) {
                foreach ($_SESSION['all_orders'] as $key => $order) {
                    if ($order['id'] === $orderId) {
                        unset($_SESSION['all_orders'][$key]);
                        // Réindexer le tableau pour éviter des clés manquantes
                        $_SESSION['all_orders'] = array_values($_SESSION['all_orders']);
                        break;
                    }
                }
            }
            header("Location: index.php?page=order");
            exit;
        }

        // supprimer produit
        if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
            $productId = intval($_GET['product_id']);
            if (isset($_SESSION['cart'][$productId])) {
                unset($_SESSION['cart'][$productId]);
            }
            header("Location: index.php?page=order");
            exit;
        }

        // vider panier
        if (isset($_GET['action']) && $_GET['action'] === 'clear') {
            unset($_SESSION['cart']);
            header("Location: index.php?page=order");
            exit;
        }

        // transmettre commande
        if (isset($_GET['todo']) && $_GET['todo'] === 'deliver' && isset($_GET['order_id'])) {
            $orderId = intval($_GET['order_id']);
            if (isset($_SESSION['all_orders'])) {
                foreach ($_SESSION['all_orders'] as &$order) {
                    if ($order['id'] === $orderId) {
                        $order['status'] = 'Remise au client';
                    }
                }
            }
            header("Location: index.php?page=order");
            exit;
        }

        // ajout au panier
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
            $productId = intval($_POST['product_id']);

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]++;
            } else {
                $_SESSION['cart'][$productId] = 1;
            }

            header("Location: index.php?page=order");
            exit;
        }

        // valider commande
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'place_order') {
            if (!empty($_SESSION['cart'])) {
                if (!isset($_SESSION['all_orders'])) {
                    $_SESSION['all_orders'] = [];
                }
                
                $_SESSION['all_orders'][] = [
                    'id' => time(),
                    'type' => $_POST['order_type'] ?? 'Comptoir',
                    'status' => 'En préparation'
                ];
                
                unset($_SESSION['cart']);
                header("Location: index.php?page=order");
                exit;
            }
        }
    }

    public function getProducts(): array
    {
        $query = $this->model->db->prepare("
            SELECT products.*, categories.name AS cat_name 
            FROM products 
            INNER JOIN categories ON categories.id = products.category_id
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WacDo - Prise de commande</title>
    <link rel="stylesheet" href="/wacdo/templates/style.css">
</head>
<body>

 <?php
    $home = true;
    require_once("header.php");
    ?>

<div class="order-container">

    <header class="main-header">
        <h1 class="main-title">Prise de commande</h1>
    </header>

    <div class="order-grid">
        
        <div class="products-column">
            
            <div class="card form-group">
                <h3 class="card-title">1. Nos Menus</h3>
                <form action="index.php?page=order" method="POST">
                    <select name="product_id" class="select-input">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product['cat_name'] === 'menus'): ?>
                                <option value="<?php echo $product['id']; ?>">
                                    <?php echo $product['name']; ?> - <?php echo number_format($product['price'], 2); ?>€
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="action" value="add_to_cart" class="btn btn-primary">Ajouter le menu</button>
                </form>
            </div>

            <div class="card form-group">
                <h3 class="card-title">2. À la carte</h3>
                <form action="index.php?page=order" method="POST">
                    <select name="product_id" class="select-input">
                        <?php foreach ($products as $product): ?>
                            <?php if ($product['cat_name'] !== 'menus'): ?>
                                <option value="<?php echo $product['id']; ?>">
                                    [<?php echo strtoupper($product['cat_name']); ?>] <?php echo $product['name']; ?> - <?php echo number_format($product['price'], 2); ?>€
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="action" value="add_to_cart" class="btn btn-primary">Ajouter à la carte</button>
                </form>
            </div>

        </div>

        <div class="cart-column">
            <div class="card">
                <h2 class="section-title">Commande en cours</h2>
                
                <?php if (!empty($_SESSION['cart'])): ?>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th class="text-right">Prix U.</th>
                                    <th class="text-center">Qté</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $grandTotal = 0;
                                foreach ($_SESSION['cart'] as $id => $quantity): 
                                    $productInfo = null;
                                    foreach ($products as $p) {
                                        if ($p['id'] == $id) { $productInfo = $p; break; }
                                    }
                                    if ($productInfo):
                                        $subtotal = $productInfo['price'] * $quantity;
                                        $grandTotal += $subtotal;
                                ?>
                                    <tr>
                                        <td><strong><?php echo $productInfo['name']; ?></strong></td>
                                        <td class="text-right"><?php echo number_format($productInfo['price'], 2); ?> €</td>
                                        <td class="text-center"><?php echo $quantity; ?></td>
                                        <td class="text-right"><strong><?php echo number_format($subtotal, 2); ?> €</strong></td>
                                        <td class="text-center">
                                            <a href="index.php?page=order&action=remove&product_id=<?php echo $id; ?>" class="cart-delete-icon">❌</a>
                                        </td>
                                    </tr>
                                <?php endif; endforeach; ?>
                                <tr class="row-total">
                                    <td colspan="3" class="text-right">Total :</td>
                                    <td class="text-right total-price"><?php echo number_format($grandTotal, 2); ?> €</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <form action="index.php?page=order" method="POST">
                        <div class="radio-group">
                            <label class="radio-label"><input type="radio" name="order_type" value="Comptoir" checked> Comptoir</label>
                            <label class="radio-label"><input type="radio" name="order_type" value="Téléphone"> Téléphone</label>
                        </div>
                        <button type="submit" name="action" value="place_order" class="btn btn-success">
                            Valider et envoyer la commande
                        </button>
                    </form>

                    <a href="index.php?page=order&action=clear" class="link-danger">Vider le panier actuel</a>

                <?php else: ?>
                    <p class="empty-msg">Aucun produit dans la commande.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="card">
        <?php if (!empty($_SESSION['all_orders'])): ?>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Type</th>
                            <th>Statut</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['all_orders'] as $order): 
                            $isPending = ($order['status'] === 'En préparation');
                        ?>
                            <tr class="<?php echo !$isPending ? 'row-archived' : ''; ?>">
                                <td><strong>#<?php echo $order['id']; ?></strong></td>
                                <td><?php echo $order['type']; ?></td>
                                <td>
                                    <span class="badge <?php echo $isPending ? 'badge-warning' : 'badge-success'; ?>">
                                        <?php echo $order['status']; ?>
                                    </span>
                                </td>
                                <td class="text-right">
                                    <?php if ($isPending): ?>
                                        <a href="index.php?page=order&todo=deliver&order_id=<?php echo $order['id']; ?>" class="btn btn-action">
                                            Remettre au client
                                        </a>
                                    <?php else: ?>
                                        <span class="delivered-text">✓ Livrée</span>
                                    <?php endif; ?>
                                    
                                    <a href="index.php?page=order&action=delete_order&order_id=<?php echo $order['id']; ?>" class="btn btn-danger" onclick="return confirm('Supprimer cette commande ?');">
                                        🗑 Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="empty-msg">Aucune commande en attente.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
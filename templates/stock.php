<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="/wacdo/templates/style.css">
</head>
<body>

 <?php
    $home = true;
    require_once("header.php");
    ?>

    
    <div class="stock-container">
        <h1 class="stock-title"> Stock produits </h1>

        <table class="stock-table">
            <thead class="stock-table-head">
                <tr>
                    <th class="stock-table-th">ID</th>
                    <th class="stock-table-th">Nom</th>
                    <th class="stock-table-th">Prix</th>
                    <th class="stock-table-th">Catégorie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr class="stock-table-row">
                        <td class="stock-table-td"><?php echo htmlspecialchars($product['id']); ?></td>
                        <td class="stock-table-td"><?php echo htmlspecialchars($product['name']); ?></td>
                        <td class="stock-table-td"><?php echo htmlspecialchars($product['price']); ?></td>
                        <td class="stock-table-td"><?php echo htmlspecialchars($product['cat_name']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
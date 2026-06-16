<<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>
</head>
<body>

<select name="product_id">
    <?php foreach ($products as $product): ?>
        <option value="<?php echo $product['id']; ?>">
            <?php echo $product['name']; ?> - <?php echo $product['price']; ?>€
        </option>
    <?php endforeach; ?>
</select>

</body>
</html>
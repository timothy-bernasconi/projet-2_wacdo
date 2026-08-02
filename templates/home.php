<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/wacdo/templates/style.css">
</head>
<body>

 <?php
    $home = true;
    require_once("header.php");
    ?>

<div class="welcome-message">
    <span>Bienvenue <?= $_SESSION["user_name"] ?> (<?= $_SESSION["user_role"] ?>)</span>
</div>

<section>
    <h1>
        Wacdo
    </h1>
    <h2>
        Logiciel de gestion interne
    </h2>
</section>    



</body>
</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wacdo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
     rel="stylesheet">
     <link rel="stylesheet" href="/wacdo/templates/style.css">
</head>

<body>
    <main>
        <section id="login">

<form action="/wacdo/public/index.php?page=login" method="POST">
                    <div class="form-group">
                    <h1>Connexion </h1>
                    <input type="email" name="email" id="inputEmail" placeholder="Email" required />
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="inputPassword" placeholder="Mot de passe" required />
                </div>

                <input class="btn" type="submit" value="Se connecter" />
                    <?= $message ?>


               
            </form>

        </section>
    </main>
</body>

</html>
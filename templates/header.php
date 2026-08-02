<style>
    .wacdo-header, .wacdo-header * {
        box-sizing: border-box;
    }
    .wacdo-header {
        display: flex ;
        justify-content: space-between ;
        align-items: center ;
        padding: 10px 30px ;
        background-color: #db0000 ;
        color: #ffffff ;
        height: 70px ;
        width: 100% ;
        font-family: Arial, sans-serif ;
        
    }
    .wacdo-header.wacdo-fixed {
        position: fixed ;
        top: 0;
        left: 0 ;
        z-index: 1000 ;
    }
    .wacdo-header-left {
        display: flex ;
        align-items: center ;
        gap: 30px ;
    }
    .wacdo-logo {
        height: 45px ;
        width: auto ;
        display: block ;
    }
    .wacdo-menu {
        margin: 0 ;
        padding: 0 ;
        display: flex ;
        list-style: none ;
        gap: 20px ;
    }
    .wacdo-menu li {
        margin: 0 ;
        padding: 0 ;
    }
    .wacdo-menu a {
        color: #ffffff ;
        text-decoration: none ;
        font-size: 0.95rem ;
        font-weight: 500 ;
    }
    .wacdo-menu a:hover {
        color: #f1c40f ;
    }
    .wacdo-header-right {
        display: flex ;
        align-items: center ;
        gap: 20px ;
        font-size: 0.9rem ;
    }
    .wacdo-user-name {
        color: #ffffff ;
    }
    .wacdo-btn-logout {
        display: inline-block ;
        padding: 8px 16px ;
        border-radius: 4px ;
        text-decoration: none ;
        font-weight: bold ;
        font-size: 0.85rem ;
        background-color: #e74c3c ;
        color: #ffffff ;
    }
    .wacdo-btn-logout:hover {
        background-color: #c0392b ;
    }
</style>

<header class="wacdo-header <?= !empty($home) ? 'wacdo-fixed' : '' ?>">
    <div class="wacdo-header-left">
        <img src="./assets/images/logo.png" alt="Wacdo" class="wacdo-logo" />
        <nav class="wacdo-nav">
            <ul class="wacdo-menu">
                <li><a href="./">Home</a></li>
                <li><a href="./order">Commandes</a></li>
                <li><a href="./stock">Stock</a></li>
                <li><a href="./settings">Paramètres</a></li>
            </ul>
        </nav>
    </div>

    <div class="wacdo-header-right">
        <span class="wacdo-user-name">Bienvenue <?= htmlspecialchars($_SESSION["user_name"] ?? '') ?></span>
        <a href="./logout" class="wacdo-btn-logout">Se déconnecter</a>
    </div>
</header>
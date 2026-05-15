<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('page-background'); ?>>

<!-- COOKIE NOTICE -->
<div class="cookie-notice" id="cookieNotice">
    <span>Al navegar por este sitio aceptás el uso de cookies para agilizar tu experiencia de compra.</span>
    <button onclick="document.getElementById('cookieNotice').style.display='none'">Entendido</button>
</div>

<!-- HEADER -->
<header class="site-header">

    <!-- TOP BAR -->
    <div class="top-bar">
        <span>✨ Envíos a todo el país</span>
        <span>6 cuotas sin interés</span>
        <span>info@joyasrodriguez.com.ar</span>
    </div>

    <!-- HEADER MAIN -->
    <div class="header-main">
        <div class="header-container">

            <!-- LOGO -->
            <div class="site-logo">
                <a href="<?php echo home_url(); ?>">
                    <span class="logo-text">Joyas Rodriguez</span>
                    <span class="logo-sub">joyería artesanal</span>
                </a>
            </div>

            <!-- SEARCH -->
            <div class="search-wrapper">
                <input type="text" class="search-input" placeholder="🔍 Buscar joyas...">
            </div>

            <!-- ACTIONS -->
            <div class="header-actions">
                <a href="<?php echo home_url('/mi-cuenta'); ?>" class="action-btn">
                    <span class="action-icon">👤</span>
                    <span>Ingresar</span>
                </a>
                <a href="#" class="action-btn">
                    <span class="action-icon">🤍</span>
                    <span>Favoritos</span>
                </a>
                <a href="#" class="action-btn cart-btn">
                    <span class="action-icon">🛒</span>
                    <span>Carrito (0)</span>
                </a>
            </div>

        </div>
    </div>

    <!-- NAVEGACION -->
    <nav class="main-navigation">
        <div class="nav-container">
            <a href="<?php echo home_url('/best-sellers'); ?>">Best Sellers</a>
            <a href="<?php echo home_url('/joyas-de-diseno'); ?>">Joyas de diseño</a>
            <a href="<?php echo home_url('/para-personalizar'); ?>">Para Personalizar</a>
            <a href="<?php echo home_url('/colecciones'); ?>">Colecciones</a>
            <a href="<?php echo home_url('/todas-las-joyas'); ?>">Todas las joyas</a>
            <a href="<?php echo home_url('/medida-anillo'); ?>">¿Cómo tomar tu medida?</a>
        </div>
    </nav>

</header>

<!-- BANNER PROMOCIONAL -->
<div class="promo-banner">
    <div class="promo-content">
        <span class="promo-icon">💳</span>
        <span class="promo-text">6 CUOTAS SIN INTERÉS</span>
        <div class="countdown" id="countdown">
            <div class="countdown-item">
                <span class="countdown-number" id="hours">20</span>
                <span class="countdown-label">HRS</span>
            </div>
            <span class="sep">:</span>
            <div class="countdown-item">
                <span class="countdown-number" id="minutes">00</span>
                <span class="countdown-label">MIN</span>
            </div>
            <span class="sep">:</span>
            <div class="countdown-item">
                <span class="countdown-number" id="seconds">00</span>
                <span class="countdown-label">SEG</span>
            </div>
        </div>
        <a href="#" class="promo-cta">Pedí tu joya ahora →</a>
    </div>
</div>

<script>
// Countdown timer
let totalSeconds = 20 * 3600;
setInterval(() => {
    if (totalSeconds <= 0) return;
    totalSeconds--;
    const h = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = totalSeconds % 60;
    document.getElementById('hours').textContent   = String(h).padStart(2, '0');
    document.getElementById('minutes').textContent = String(m).padStart(2, '0');
    document.getElementById('seconds').textContent = String(s).padStart(2, '0');
}, 1000);
</script>
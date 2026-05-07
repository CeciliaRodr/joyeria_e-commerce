<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('page-background'); ?>>

    <header class="site-header">
        <div class="cookie-notice">
            <span>Utilizamos cookies para mejorar tu experiencia.</span>
            <button>Aceptar</button>
        </div>
        <div class="header-container">
            <div class="header-main">
                <div class="site-logo">Joyas Rodriguez</div>
                <form class="search-form">
                    <div class="search-wrapper">
                        <input type="text" class="search-input" placeholder="Buscar joyas...">
                    </div>
                </form>
                <div class="header-actions">
                    <button class="header-action-btn">Favoritos(0)</button>
                    <button class="header-action-btn">Carrito(0)</button>
                </div>
            </div>
            <nav class="main-navigation">
                <a href="#">Joyas de diseño</a>
                <a href="#">Para Personalizar</a>
                <a href="#">Colecciones</a>
                <a href="#">Todas las joyas</a>
            </nav>
        </div>
    </header>

    <div class="promo-banner">
        <div class="promo-content">
            <div class="promo-title">6 CUOTAS SIN INTERÉS</div>
            <div class="countdown">
                <div class="countdown-item"><span class="countdown-number">20</span><br><span class="countdown-label">HRS</span></div>
                <span class="countdown-separator">:</span>
                <div class="countdown-item"><span class="countdown-number">24</span><br><span class="countdown-label">MIN</span></div>
            </div>
            <button class="promo-cta">Pedí tu joya ahora</button>
        </div>
    </div>
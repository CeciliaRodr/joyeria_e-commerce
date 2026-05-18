<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- COOKIE NOTICE -->
<div class="cookie-notice">
    <span>Al navegar por este sitio aceptás el uso de cookies para agilizar tu experiencia de compra.</span>
    <button>Entendido</button>
</div>

<!-- TOP BAR -->
<div class="top-bar">
    <span>✨ Envíos a todo el país</span>
    <span>6 cuotas sin interés</span>
    <span>info@joyasrodriguez.com.ar</span>
</div>

<!-- HEADER -->
<header class="site-header">

    <div class="header-container">

        <div class="header-main">

            <!-- LOGO -->
            <div class="site-logo">
                <a href="<?php echo home_url(); ?>">
                    Joyas Rodríguez
                    <span class="logo-sub">JOYERÍA ARTESANAL</span>
                </a>
            </div>

            <!-- SEARCH -->
            <div class="search-wrapper">
                <?php get_search_form(); ?>
            </div>

            <!-- ACTIONS -->
            <div class="header-actions">

                <!-- LOGIN -->
                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="action-btn">
                    <span class="action-icon">👤</span>
                    <span>
                        <?php echo is_user_logged_in() ? 'Mi cuenta' : 'Ingresar'; ?>
                    </span>
                </a>

                <!-- FAVORITOS -->
                <a href="#" class="action-btn">
                    <span class="action-icon">🤍</span>
                    <span>Favoritos</span>
                </a>

                <!-- CARRITO -->
                <a href="<?php echo function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'; ?>" class="action-btn cart-btn">
                    <span class="action-icon">🛒</span>
                    <span>
                        Carrito (
                        <?php
                        echo function_exists('WC') && WC()->cart
                            ? WC()->cart->get_cart_contents_count()
                            : '0';
                        ?>
                        )
                    </span>
                </a>

            </div>

        </div>

    </div>

    <!-- NAV -->
    <nav class="main-navigation">
        <div class="nav-container">

            <a href="<?php echo home_url(); ?>">Best Sellers</a>

            <a href="#">
                Joyas de diseño
            </a>

            <a href="#">
                Para Personalizar
            </a>

            <a href="#">
                Colecciones
            </a>

            <a href="#">
                Todas las joyas
            </a>

            <a href="#">
                ¿Cómo tomar tu medida?
            </a>

        </div>
    </nav>

</header>

<!-- PROMO BANNER -->
<div class="promo-banner">

    <div class="promo-content">

        <span class="promo-title">
            🇦🇷 6 CUOTAS SIN INTERÉS
        </span>

        <div class="countdown">

            <div class="countdown-item">
                <div class="countdown-number">19</div>
                <div class="countdown-label">HRS</div>
            </div>

            <span class="countdown-separator">:</span>

            <div class="countdown-item">
                <div class="countdown-number">59</div>
                <div class="countdown-label">MIN</div>
            </div>

            <span class="countdown-separator">:</span>

            <div class="countdown-item">
                <div class="countdown-number">56</div>
                <div class="countdown-label">SEG</div>
            </div>

        </div>

        <a href="#" class="promo-cta">
            Pedí tu joya ahora →
        </a>

    </div>

</div>

<!-- MAIN CONTENT -->
<main class="main-content">
<!-- ACTIONS -->
<div class="header-actions">
    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="action-btn">
        <span class="action-icon">👤</span>
        <span><?php echo is_user_logged_in() ? 'Mi cuenta' : 'Ingresar'; ?></span>
    </a>
    <a href="#" class="action-btn">
        <span class="action-icon">🤍</span>
        <span>Favoritos</span>
    </a>
    <a href="<?php echo function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'; ?>" class="action-btn cart-btn">
        <span class="action-icon">🛒</span>
        <span>Carrito (<?php echo function_exists('WC') ? WC()->cart->get_cart_contents_count() : '0'; ?>)</span>
    </a>
</div>
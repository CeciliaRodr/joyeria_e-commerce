<?php
/**
 * Template Name: Mi Cuenta - Panel de Usuario
 */

if (!is_user_logged_in()) {
    wp_redirect(home_url('/ingresar'));
    exit;
}

get_header();

$current_user = wp_get_current_user();

if ( function_exists( 'wc_get_orders' ) ) {
    $customer_orders = wc_get_orders( array(
        'customer' => $current_user->ID,
        'limit' => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    ) );

    if ( function_exists( 'wc_get_customer_order_count' ) ) {
        $orders = wc_get_customer_order_count( $current_user->ID );
    } else {
        $all_orders = wc_get_orders( array(
            'customer' => $current_user->ID,
            'limit' => -1,
            'return' => 'ids'
        ) );
        $orders = is_array( $all_orders ) ? count( $all_orders ) : 0;
    }
} else {
    $orders = 0;
    $customer_orders = array();
}
?>

<div class="my-account-container" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">
    
    <div style="display: flex; flex-wrap: wrap; gap: 30px;">
        
        <!-- Sidebar izquierdo -->
        <div style="flex: 1; min-width: 200px; background: #f9f9f9; border-radius: 10px; padding: 20px; height: fit-content;">
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="background: #e75480; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                    <span style="font-size: 40px; color: white;">👤</span>
                </div>
                <h3 style="margin: 0; color: #333;"><?php echo esc_html($current_user->display_name); ?></h3>
                <p style="color: #666; margin: 5px 0 0;"><?php echo esc_html($current_user->user_email); ?></p>
            </div>
            
            <nav style="display: flex; flex-direction: column; gap: 10px;">
                <a href="<?php echo esc_url(home_url('/mi-cuenta')); ?>" style="padding: 10px; background: #e75480; color: white; text-decoration: none; border-radius: 5px; text-align: center;">📊 Mi Panel</a>
                <a href="<?php echo esc_url(home_url('/mis-pedidos')); ?>" style="padding: 10px; background: #f0f0f0; color: #333; text-decoration: none; border-radius: 5px; text-align: center;">📦 Mis Pedidos</a>
                <a href="<?php echo wp_logout_url(home_url()); ?>" style="padding: 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px; text-align: center;">🚪 Cerrar Sesión</a>
            </nav>
        </div>
        
        <!-- Contenido principal -->
        <div style="flex: 3; min-width: 300px;">
            
            <!-- Bienvenida -->
            <div style="background: linear-gradient(135deg, #c0396a, #e75480); color: white; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                <h2 style="margin: 0 0 10px;">¡Bienvenido, <?php echo esc_html($current_user->display_name); ?>!</h2>
                <p style="margin: 0;">Gracias por ser parte de Joyas Rodriguez</p>
            </div>
            
            <!-- Estadísticas rápidas -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px; margin-bottom: 30px;">
                <div style="background: #fff; border: 1px solid #ffe0ec; border-radius: 10px; padding: 20px; text-align: center;">
                    <div style="font-size: 30px;">🛍️</div>
                    <div style="font-size: 24px; font-weight: bold; color: #e75480;"><?php echo esc_html($orders); ?></div>
                    <div style="color: #666;">Pedidos realizados</div>
                </div>
                <div style="background: #fff; border: 1px solid #ffe0ec; border-radius: 10px; padding: 20px; text-align: center;">
                    <div style="font-size: 30px;">⭐</div>
                    <div style="font-size: 24px; font-weight: bold; color: #e75480;"><?php echo date('d/m/Y'); ?></div>
                    <div style="color: #666;">Última visita</div>
                </div>
                <div style="background: #fff; border: 1px solid #ffe0ec; border-radius: 10px; padding: 20px; text-align: center;">
                    <div style="font-size: 30px;">💎</div>
                    <div style="font-size: 24px; font-weight: bold; color: #e75480;">Cliente</div>
                    <div style="color: #666;">Tipo de cuenta</div>
                </div>
            </div>
            
            <!-- Últimos pedidos -->
            <div style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="margin-top: 0; color: #333; border-bottom: 2px solid #e75480; padding-bottom: 10px;">📦 Últimos pedidos</h3>
                
                <?php if (empty($customer_orders)) : ?>
                    <p style="text-align: center; color: #666; padding: 30px;">No tenés pedidos realizados aún.</p>
                    <div style="text-align: center;">
                        <a href="<?php echo esc_url(home_url('/colecciones')); ?>" style="background: #e75480; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">✨ Comenzar a comprar</a>
                    </div>
                <?php else : ?>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #fff8fb; border-bottom: 1px solid #ffe0ec;">
                                <th style="padding: 12px; text-align: left;">Pedido</th>
                                <th style="padding: 12px; text-align: left;">Fecha</th>
                                <th style="padding: 12px; text-align: left;">Total</th>
                                <th style="padding: 12px; text-align: left;">Estado</th>
                                <th style="padding: 12px; text-align: left;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customer_orders as $order) : ?>
                                <tr style="border-bottom: 1px solid #ffe0ec;">
                                    <td style="padding: 12px;">#<?php echo esc_html($order->get_order_number()); ?></td>
                                    <td style="padding: 12px;"><?php echo esc_html($order->get_date_created()->date('d/m/Y')); ?></td>
                                    <td style="padding: 12px;"><?php echo function_exists('wc_price') ? wc_price($order->get_total()) : $order->get_total(); ?></td>
                                    <td style="padding: 12px;">
                                        <span style="background: <?php echo $order->get_status() === 'completed' ? '#28a745' : '#e75480'; ?>; color: white; padding: 3px 10px; border-radius: 20px; font-size: 12px;">
                                            <?php echo esc_html( function_exists('wc_get_order_status_name') ? wc_get_order_status_name($order->get_status()) : ucfirst($order->get_status()) ); ?>
                                        </span>
                                    </td>
                                    <td style="padding: 12px;">
                                        <a href="<?php echo esc_url($order->get_view_order_url()); ?>" style="color: #e75480;">Ver</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php

// ==============================================
// CARGAR ESTILOS DEL TEMA
// ==============================================

function joyeria_enqueue_styles() {

    wp_enqueue_style(
        'joyeria-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

}

add_action('wp_enqueue_scripts', 'joyeria_enqueue_styles');


// ==============================================
// SOPORTE PARA WOOCOMMERCE
// ==============================================

function joyeria_woocommerce_support() {

    add_theme_support('woocommerce');

}

add_action('after_setup_theme', 'joyeria_woocommerce_support');


// ==============================================
// DESACTIVAR CSS DEFAULT DE WOOCOMMERCE
// ==============================================

add_filter('woocommerce_enqueue_styles', '__return_empty_array');


// ==============================================
// ELIMINAR BREADCRUMB DE WOOCOMMERCE
// ==============================================

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('init', function () {

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

});


// ==============================================
// REGISTRO DE USUARIO PERSONALIZADO
// ==============================================

add_action('admin_post_nopriv_registrar_usuario', 'procesar_registro');

function procesar_registro() {

    $nombre    = sanitize_text_field($_POST['nombre']);
    $email     = sanitize_email($_POST['email']);
    $password  = $_POST['password'];
    $password2 = $_POST['password2'];

    // Verificar contraseñas
    if ($password !== $password2) {

        wp_redirect(
            home_url('/registro?error=Las+contraseñas+no+coinciden')
        );

        exit;
    }

    // Verificar email existente
    if (email_exists($email)) {

        wp_redirect(
            home_url('/registro?error=El+email+ya+está+registrado')
        );

        exit;
    }

    // Crear usuario
    $user_id = wp_create_user($email, $password, $email);

    // Error al crear usuario
    if (is_wp_error($user_id)) {

        wp_redirect(
            home_url('/registro?error=' .
                urlencode($user_id->get_error_message()))
        );

        exit;
    }

    // Actualizar nombre visible
    wp_update_user([
        'ID'           => $user_id,
        'display_name' => $nombre
    ]);

    // Redireccionar login
    wp_redirect(
        home_url('/ingresar?registro=exitoso')
    );

    exit;
}


// ==============================================
// SHORTCODE PANEL MI CUENTA
// ==============================================

add_shortcode('mi_cuenta_panel', function () {

    // Usuario no logueado
    if (!is_user_logged_in()) {

        return "
            <p>
                Por favor,
                <a href='" . home_url('/ingresar') . "'>
                    inicia sesión
                </a>
                para ver tu cuenta.
            </p>
        ";
    }

    $user = wp_get_current_user();

    $orders = 0;

    $customer_orders = array();

    // WooCommerce activo
    if (function_exists('wc_get_orders')) {

        $customer_orders = wc_get_orders(array(

            'customer' => $user->ID,
            'limit'    => 5,
            'orderby'  => 'date',
            'order'    => 'DESC'

        ));

        $orders = function_exists('wc_get_customer_order_count')
            ? wc_get_customer_order_count($user->ID)
            : 0;
    }

    // ==========================================
    // HTML PANEL
    // ==========================================

    $html = "";

    $html .= "
    <div style='
        max-width:800px;
        margin:50px auto;
        background:white;
        border-radius:15px;
        box-shadow:0 5px 25px rgba(0,0,0,0.1);
        overflow:hidden;
    '>
    ";

    // HEADER
    $html .= "
    <div style='
        background:linear-gradient(135deg,#b8860b,#d4a017);
        color:white;
        padding:30px;
        text-align:center;
    '>
        <h1>👤 Mi Cuenta</h1>
        <p>Bienvenido, " . esc_html($user->display_name) . "</p>
    </div>
    ";

    // CONTENIDO
    $html .= "
    <div style='padding:30px;'>
    ";

    // DATOS USUARIO
    $html .= "
    <div style='
        background:#f9f9f9;
        padding:20px;
        border-radius:10px;
        margin-bottom:20px;
    '>

        <p>
            <strong>📧 Email:</strong>
            " . esc_html($user->user_email) . "
        </p>

        <p>
            <strong>📅 Miembro desde:</strong>
            " . date_i18n(
                get_option('date_format'),
                strtotime($user->user_registered)
            ) . "
        </p>

    </div>
    ";

    // CARDS
    $html .= "
    <div style='
        display:flex;
        gap:20px;
        margin-bottom:20px;
        flex-wrap:wrap;
    '>
    ";

    // PEDIDOS
    $html .= "
    <div style='
        flex:1;
        background:#f9f9f9;
        padding:20px;
        text-align:center;
        border-radius:10px;
    '>

        <div style='font-size:30px;'>🛍️</div>

        <div style='
            font-size:24px;
            font-weight:bold;
            color:#b8860b;
        '>
            {$orders}
        </div>

        <div>Pedidos</div>

    </div>
    ";

    // VISITA
    $html .= "
    <div style='
        flex:1;
        background:#f9f9f9;
        padding:20px;
        text-align:center;
        border-radius:10px;
    '>

        <div style='font-size:30px;'>⭐</div>

        <div style='
            font-size:24px;
            font-weight:bold;
            color:#b8860b;
        '>
            " . date('d/m/Y') . "
        </div>

        <div>Visita</div>

    </div>
    ";

    // TIPO CLIENTE
    $html .= "
    <div style='
        flex:1;
        background:#f9f9f9;
        padding:20px;
        text-align:center;
        border-radius:10px;
    '>

        <div style='font-size:30px;'>💎</div>

        <div style='
            font-size:24px;
            font-weight:bold;
            color:#b8860b;
        '>
            Cliente
        </div>

        <div>Tipo</div>

    </div>
    ";

    $html .= "</div>";

    // SIN PEDIDOS
    if (empty($customer_orders)) {

        $html .= "
        <div style='text-align:center;margin-top:20px;'>

            <p>No tenés pedidos realizados aún.</p>

            <a href='" . home_url('/best-sellers') . "'
               style='
                    display:inline-block;
                    background:#b8860b;
                    color:white;
                    padding:10px 20px;
                    text-decoration:none;
                    border-radius:8px;
                    margin-top:10px;
               '>

               ✨ Comenzar a comprar

            </a>

        </div>
        ";
    }

    // CON PEDIDOS
    else {

        $html .= "
        <h3 style='
            border-bottom:2px solid #b8860b;
            padding-bottom:10px;
        '>

            📦 Últimos pedidos

        </h3>
        ";

        $html .= "
        <table style='
            width:100%;
            border-collapse:collapse;
        '>
        ";

        $html .= "
        <thead>

            <tr style='background:#f9f9f9;'>

                <th style='padding:10px;text-align:left;'>Pedido</th>
                <th style='padding:10px;text-align:left;'>Fecha</th>
                <th style='padding:10px;text-align:left;'>Total</th>
                <th style='padding:10px;text-align:left;'>Estado</th>

            </tr>

        </thead>

        <tbody>
        ";

        foreach ($customer_orders as $order) {

            $status_color =
                $order->get_status() === 'completed'
                ? '#28a745'
                : '#b8860b';

            $status_text =
                $order->get_status() === 'completed'
                ? 'Completado'
                : ucfirst($order->get_status());

            $html .= "
            <tr style='border-bottom:1px solid #eee;'>

                <td style='padding:10px;'>
                    #" . esc_html($order->get_order_number()) . "
                </td>

                <td style='padding:10px;'>
                    " . esc_html(
                        $order->get_date_created()->date('d/m/Y')
                    ) . "
                </td>

                <td style='padding:10px;'>
                    " . (
                        function_exists('wc_price')
                        ? wc_price($order->get_total())
                        : '$' . number_format($order->get_total(), 2)
                    ) . "
                </td>

                <td style='padding:10px;'>

                    <span style='
                        background:{$status_color};
                        color:white;
                        padding:3px 10px;
                        border-radius:20px;
                        font-size:12px;
                    '>

                        {$status_text}

                    </span>

                </td>

            </tr>
            ";
        }

        $html .= "
        </tbody>
        </table>
        ";
    }

    // BOTONES
    $html .= "
    <div style='
        text-align:center;
        margin-top:30px;
    '>

        <a href='" . home_url() . "'
           style='
                background:#b8860b;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:8px;
                margin-right:10px;
           '>

           ← Volver a la tienda

        </a>

        <a href='" . wp_logout_url(home_url()) . "'
           style='
                background:#dc3545;
                color:white;
                padding:10px 20px;
                text-decoration:none;
                border-radius:8px;
           '>

           🚪 Cerrar sesión

        </a>

    </div>
    ";

    $html .= "</div></div>";

    return $html;

});

?>
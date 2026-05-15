<?php
/**
 * Template Name: Página de Login Personalizada
 * Description: Plantilla personalizada para el inicio de sesión de clientes
 */

get_header();
?>

<div class="joyas-login-container" style="max-width: 500px; margin: 50px auto; padding: 30px; background: #fff; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
    
    <?php if (is_user_logged_in()) : ?>
        <!-- Usuario ya logueado -->
        <div style="text-align: center;">
            <div style="font-size: 60px; margin-bottom: 20px;">👋</div>
            <h2 style="color: #333;">¡Ya estás logueado!</h2>
            <p style="color: #666; margin-bottom: 25px;">Bienvenido de vuelta, <?php echo esc_html(wp_get_current_user()->display_name); ?></p>
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="<?php echo esc_url(home_url('/mi-cuenta-panel')); ?>" style="background: #b8860b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">📊 Ir a mi panel</a>
                <a href="<?php echo wp_logout_url(home_url()); ?>" style="background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">🚪 Cerrar sesión</a>
            </div>
        </div>
        
    <?php else : ?>
        
        <!-- Formulario de login -->
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="font-size: 50px; margin-bottom: 10px;">✨</div>
            <h2 style="color: #333; margin: 0;">Bienvenido a Joyas Rodriguez</h2>
            <p style="color: #666;">Ingresá con tu cuenta para continuar</p>
        </div>
        
        <?php
        // Mostrar errores si existen
        if (isset($_GET['login']) && $_GET['login'] === 'failed') : ?>
            <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; border-left: 4px solid #dc3545;">
                ❌ Usuario o contraseña incorrectos. Por favor, intentá de nuevo.
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['loggedout']) && $_GET['loggedout'] === 'true') : ?>
            <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; border-left: 4px solid #28a745;">
                ✅ Has cerrado sesión correctamente. ¡Te esperamos pronto!
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" style="display: flex; flex-direction: column; gap: 18px;">
            
            <div>
                <label for="user_login" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Email o Usuario</label>
                <input type="text" name="log" id="user_login" class="input" 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                       required autofocus />
            </div>
            
            <div>
                <label for="user_pass" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Contraseña</label>
                <input type="password" name="pwd" id="user_pass" class="input" 
                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; transition: all 0.3s;"
                       required />
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <label style="color: #666; cursor: pointer;">
                    <input name="rememberme" type="checkbox" value="forever" style="margin-right: 5px;" /> Recordarme
                </label>
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" style="color: #b8860b; text-decoration: none;">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>
            
            <input type="submit" name="wp-submit" value="Ingresar" 
                   style="background: #b8860b; color: white; padding: 14px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s;" 
                   onmouseover="this.style.background='#9a7209'" onmouseout="this.style.background='#b8860b'" />
            
            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/mi-cuenta-panel')); ?>" />
            <input type="hidden" name="testcookie" value="1" />
        </form>
        
        <div style="text-align: center; margin-top: 25px; padding-top: 20px; border-top: 1px solid #eee;">
            <p style="color: #666; margin: 0;">
                ¿No tenés cuenta? 
                <a href="<?php echo esc_url(home_url('/registro')); ?>" style="color: #b8860b; text-decoration: none; font-weight: bold;">
                    Registrate aquí
                </a>
            </p>
            <p style="color: #999; font-size: 12px; margin-top: 15px;">
                🛡️ Tus datos están seguros con nosotros
            </p>
        </div>
        
    <?php endif; ?>
</div>

<style>
    .joyas-login-container input:focus {
        outline: none;
        border-color: #b8860b !important;
        box-shadow: 0 0 8px rgba(184,134,11,0.2);
    }
    
    @media (max-width: 768px) {
        .joyas-login-container {
            margin: 20px !important;
            padding: 20px !important;
        }
    }
</style>

<?php get_footer(); ?>
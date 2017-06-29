<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'c0620253_nina');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'c0620253_nina');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'sogisoLE69');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'fh7V3aHSW=WI/ZuQQY<cpah{_d.$=d$5Xv<PJXjZ.[~V}?%CF|%XJZ=#=SM-x<%I');
define('SECURE_AUTH_KEY', 'Cc%(ZQ>9%3i7Es99i;:,{r3u280wwIIY|YgeGF(S qFeGh:rpNElz>99J=2xS4^4');
define('LOGGED_IN_KEY', 'aN;~jSH0]bVQzX0WtPG:MVD8JX~f0Bz&gUc?VLMtVqByRDG#S(QswwMJiYaGhK?Z');
define('NONCE_KEY', ':4Qut7&F/|HIy1L@iTC/;XGT31kq@)8ea%!{8t<|iAjH@N~wJQKI)43qM6 {88OG');
define('AUTH_SALT', 'NKD`xE^K:01bK#/39@KBt4DdiCIA`TTqOVfNq[-v}EnJ>3V-o21hrLVV]t%K&T:[');
define('SECURE_AUTH_SALT', '%W0RbhH!-i.h.XDFKQ<#^bzn1}uZ&{Pc-6/#r`A-gt!SS;FC]3%WHYq7p=Pn{ o+');
define('LOGGED_IN_SALT', 'vem9i_DlUDs})+qeF_Lb@cQ#)jv*HRoEwO*O<{*a1^;eYbkGx>c.,I:dzvlwo2+-');
define('NONCE_SALT', 'G)Y=;[qfq[%`&(S{Bn10.ulDVS8EuYHIA0R_O7j%ODx.GK;f`I*s[-PGW_Y(<AX>');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'grn_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


<?php
/*
Plugin Name: Ninjachat
Plugin URI: https://ninjachat.com/
Author: 500apps
Author URI: https://500apps.com
Version: 0.1
Description: Let users should be able to move beyond the limitations of older systems by using an innovative cloud-based business PBX phone system. Reduce phone costs and increase call management regardless of business size..
 */

if ( ! defined( 'ABSPATH' ) ) exit;
define('NINJACHATFILE_ROOT', __FILE__);
define('NINJACHAT_DIR', plugin_dir_path(__FILE__));

require __DIR__ . '/ninjachat_functions.php';
spl_autoload_register('ninjachat_class_loader');

/**
 * Parse configuration
 */
$settings_ninjachat = parse_ini_file(__DIR__ . '/ninjachat_settings.ini', true);
add_action('plugins_loaded', array(\ninjachatplugin\Ninjachat::$class, 'init'));

add_action('wp_enqueue_scripts', 'wpNinjachatStylesheet');
add_action('admin_enqueue_scripts', 'wpNinjachatStylesheet');
function wpNinjachatStylesheet() 
{
    wp_enqueue_style( 'ninjachat_CSS', plugins_url( '/ninjachat.css', __FILE__ ) );
}

function wpNinjachatScripts(){
    wp_register_script('ninjachat_script', plugins_url('/js/ninjachat_admin.js', NINJACHATFILE_ROOT), array('jquery'),time(),true);
    wp_enqueue_script('ninjachat_script');
}    

add_action('wp_enqueue_scripts', 'wpNinjachatScripts');
add_action('admin_enqueue_scripts', 'wpNinjachatScripts');
add_action( 'wp_head', 'ninjachat_script' );

add_action('wp_ajax_ninjachat_addtoken', 'ninjachat_addtoken');
add_action('wp_ajax_ninjachat_save_website', 'ninjachat_save_website');
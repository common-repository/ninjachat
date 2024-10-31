<?php
namespace ninjachatplugin;
class NinjaChat
{
    public static $class = __CLASS__;
    /**
     * @param $action_id
     */
    public static function appContent($action_id){
        global $settings_ninjachat;
        if ($action_id == 'ninjachat') {
            $ninjachat_url = "https://infinity.500apps.com/ninjachat?a=s&menu=false";
            include 'ninjachat_content.php';
        }
    }
    public static function action_1(){
        self::appContent('ninjachat');
    }
    public static function action_2(){
        self::appContent('Other');
    }
    public static function init()
    {
        add_action('admin_menu', array(__CLASS__, 'register_menu_ninjachat'),10,0);
    }
    public static function register_menu_ninjachat()
    {
        global $settings_ninjachat;
        add_menu_page($settings_ninjachat['menus']['menu'], $settings_ninjachat['menus']['menu'], 'manage_options', __FILE__, array(__CLASS__, 'action_1'),plugin_dir_url( __FILE__ ) . 'images/ninjachat_logo.png');
        add_submenu_page(__FILE__, $settings_ninjachat['menus']['sub_menu_title_1'], $settings_ninjachat['menus']['sub_menu_title_1'], 'manage_options', $settings_ninjachat['menus']['sub_menu_url_1'], array(__CLASS__, 'action_2'));
    }
}
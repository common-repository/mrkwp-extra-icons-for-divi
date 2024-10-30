<?php
/**
 * Plugin Name:     Extra Icons Plugin for Divi
 * Description:     Divi icon toolkit helps to add social icons to the divi header and footer.
 * Author:          M R K Development Pty Ltd
 * Author URI:      https://www.mrkwp.com
 * Text Domain:     mrkwp-extra-icons-plugin-for-divi
 * Domain Path:     /languages
 * Version:         2.1.1
 *
 * @package
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('MRKWP_SOCIAL_ICONS_VERSION', '2.1.1');
define('MRKWP_SOCIAL_ICONS_DIR', __DIR__);
define('MRKWP_SOCIAL_ICONS_URL', plugins_url('/' . basename(__DIR__)));

require_once MRKWP_SOCIAL_ICONS_DIR . '/vendor/autoload.php';

$container                   = \MRKWP_SOCIAL_ICONS\Container::getInstance();
$container['plugin_name']    = 'Extra Icons Plugin for Divi';
$container['plugin_version'] = MRKWP_SOCIAL_ICONS_VERSION;
$container['plugin_file']    = __FILE__;
$container['plugin_dir']     = MRKWP_SOCIAL_ICONS_DIR;
$container['plugin_url']     = MRKWP_SOCIAL_ICONS_URL;
$container['plugin_slug']    = 'mrkwp-extra-icons-plugin-for-divi';

// activation hook.
register_activation_hook(__FILE__, [$container['activation'], 'install']);

$container->run();

if (!function_exists('et_load_core_options')) {
    function et_load_core_options() {
        $container = \MRKWP_SOCIAL_ICONS\Container::getInstance();
        global $shortname, $themename, $options;

        $file = get_template_directory() . esc_attr("/options_{$shortname}.php");
        if (!file_exists($file)) {
            return;
        }
        include_once $file;
        $newOptions = [];
        if (isset($options) && is_array($options)) {
            foreach ($options as $option) {
                if (!$container->icons_loaded && isset($option['id']) && ($option['id'] == 'divi_show_facebook_icon')) {
                    $container->icons_loaded = true;

                    foreach ($container['icon_helper']->get_brands() as $brand_key => $brand_name) {

                        $newOptions[] = [
                            "name" => esc_html__("Show {$brand_name} Icon", $themename),
                            "id"   => $shortname . "_show_{$brand_key}_icon",
                            "type" => "checkbox2",
                            "std"  => "off",
                            "desc" => esc_html__("Here you can choose to display the {$brand_name} Icon. ", $themename),
                        ];
                    }
                }
                if (!$container->urls_loaded && isset($option['id']) && ($option['id'] == 'divi_facebook_url')) {
                    $container->urls_loaded = true;
                    foreach ($container['icon_helper']->get_brands() as $brand_key => $brand_name) {
                        $newOptions[] = [
                            "name"            => esc_html__("{$brand_name} Profile Url", $themename),
                            "id"              => $shortname . "_{$brand_key}_url",
                            "std"             => "#",
                            "type"            => "text",
                            "validation_type" => "url",
                            "desc"            => esc_html__("Enter the URL of your {$brand_name} Profile. ", $themename),
                        ];
                    }
                }

                $newOptions[] = $option;
            }

            $options = $newOptions;
        } //if
    }
}
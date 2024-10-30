<?php
namespace MRKWP_SOCIAL_ICONS;

use Pimple\Container as PimpleContainer;

/**
 * DI Container.
 */
class Container extends PimpleContainer {
    public static $instance;

    public $icons_loaded = false;
    public $urls_loaded  = false;

    /**
     * Constructor
     */
    public function __construct() {
        $this->initObjects();
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Container();
        }

        return self::$instance;
    }

    /**
     * Define dependancies.
     */
    public function initObjects() {
        $this['activation'] = function ($container) {
            return new Activation($container);
        };

        $this['themes'] = function ($container) {
            return new Themes($container);
        };

        $this['icon_helper'] = function ($container) {
            return new IconHelper($container);
        };

        $this['settings'] = function ($container) {
            return new Settings($container);
        };

    }

    /**
     * Start the plugin
     */
    public function run() {
        add_action('wp_enqueue_scripts', [$this['themes'], 'theme_enqueue_styles']);

        add_action('get_template_part_includes/social_icons', [$this['themes'], 'render_extra_social_icons']);

        add_action('plugins_loaded', [$this['themes'], 'checkDependancies']);

        add_action('wp_head', [$this['icon_helper'], 'dns_prefetch']);

        add_action('admin_menu', [$this['settings'], 'admin_menu']);
    }
}

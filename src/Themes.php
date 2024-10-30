<?php
namespace MRKWP_SOCIAL_ICONS;

/**
 * Themes Helper class.
 */
class Themes {

    //container.
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container) {
        $this->container = $container;
    }

    /**
     * Check Dependancies
     */
    public function checkDependancies() {
        $themes = [
            'Divi',
        ];

        foreach ($themes as $theme) {
            $this->checkDependancy($theme);
        }
    }

    /**
     * Check if dependant theme is active. If not show an admin notice.
     */
    public function checkDependancy($theme) {
        if (is_admin()) {
            $currentTheme = wp_get_theme();

            // Parent theme matches
            if ($currentTheme->get('Name') == $theme) {
                return;
            }

            // check for child theme.
            if ($currentTheme->parent()) {
                if ($currentTheme->parent()->get('Name') == $theme) {
                    return;
                }
            }

            $container = $this->container;

            add_action(
                'admin_notices', function () use ($theme, $container) {
                    $class   = 'notice notice-error is-dismissible';
                    $message = sprintf('<b>%s</b> requires <b>%s</b> theme to be installed and activated.', $container['plugin_name'], $theme);

                    printf('<div class="%1$s"><p>%2$s</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>', $class, $message);
                }
            );
        }
    }

    public function theme_enqueue_styles() {
        $cdn_enabled = $this->container['settings']->isCdnEnabled();
        if ($cdn_enabled) {
            wp_enqueue_style('divi-fa-brands', 'https://use.fontawesome.com/releases/v5.12.0/css/brands.css');
            wp_enqueue_style('divi-fa', 'https://use.fontawesome.com/releases/v5.12.0/css/fontawesome.css');
        } else {
            wp_enqueue_style('divi-fa-brands', $this->container['plugin_url'] . '/css/brands.min.css');
            wp_enqueue_style('divi-fa', $this->container['plugin_url'] . '/css/fontawesome.min.css');
        }
    }

    public function render_extra_social_icons() {
        include $this->container['plugin_dir'] . '/templates/includes/social_icons.php';
    }
}

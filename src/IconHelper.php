<?php
namespace MRKWP_SOCIAL_ICONS;

/**
 * IconHelper.
 */
class IconHelper {
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container) {
        $this->container = $container;
    }

    public function get_brands() {
        $brands = [
            'fa-instagram'      => 'Instagram',
            'fa-youtube-square' => 'YouTube',
            'fa-pinterest'      => 'Pinterest',
            'fa-linkedin'       => 'Linked In',
            'fa-skype'          => 'Skype',
            'fa-flickr'         => 'Flickr',
            'fa-dribbble'       => 'Dribble',
            'fa-vimeo'          => 'Vimeo',
            'fa-500px'          => '500px',
            'fa-behance'        => 'Behance',
            'fa-github'         => 'Github',
            'fa-bitbucket'      => 'Bit Bucket',
            'fa-deviantart'     => 'Deviant Art',
            'fa-medium'         => 'Medium',
            'fa-meetup'         => 'Meetup',
            'fa-slack'          => 'Slack',
            'fa-snapchat'       => 'Snap Chat',
            'fa-tripadvisor'    => 'Trip Advisor',
            'fa-twitch'         => 'Twitch',
            'fa-xing'           => 'Xing',
            'fa-vk'             => 'VK',
            'fa-soundcloud'     => 'Sound Cloud',
            'fa-whatsapp'       => 'Whatsapp',
            'fa-telegram'       => 'Telegram',
        ];

        $brands = apply_filters('df_update_social_icons', $brands);

        return $brands;
    }

    public function dns_prefetch() {
        echo "<link rel='dns-prefetch' href='//use.fontawesome.com'/>";
    }
}

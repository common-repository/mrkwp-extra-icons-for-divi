=== Extra Icons Plugin for Divi ===
Contributors: diviframework, mrkdevelopment
Donate link: https://www.mrkwp.com
Tags: divi, icons
Requires at least: 4.9
Tested up to: 5.3.2
Stable tag: 2.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Extra Icons Plugin for Divi helps to add social icons to the divi header and footer.

== Description ==

Extra Icons Plugin for Divi helps to add social icons to the divi header and footer.

Get extra Social Media Link Support for your Divi Theme.

The standard Divi Theme supports 4 link types. They are Facebook, Twitter, Google Plus and your RSS Feed.

Pinterest, YouTube and Instagram social media links are not currently supported in the default theme.

Our plugin adds support for additional icons and social media as well as providing the support to add any other social media icon support by Font Awesome.

This means you can show the icon links you need for you site.

19 Extended Icons Give You Great Coverage.

The full list includes:
* Instagram
* YouTube
* Pinterest
* Linked In
* Skype
* Flickr
* Dribble
* Vimeo
* 500px
* Behance
* Github
* Bit Bucket
* Deviant Art
* Medium
* Meetup
* Slack
* Snap Chat
* Trip Advisor
* Twitch
* Xing
* VK
* Sound Cloud
* Whatsapp
* Telegram

Based on the nature of your business, you would like to have social profiles. This is very common and we have come across it many times. The existing solution involves adding extra social icons by writing code in the child theme. Our solution removes that technical skill and it's free!

== Screenshots ==
1. Settings area: Enabled/disable CDN for font awesome.

== Frequently Asked Questions ==

= I already have font awesome loaded. What should I do to avoid loading it twice? =
You would need to dequeue the stylesheets using wp_dequeue_style.

We recommend that you keep the latest version of font awesome. To dequeue the font awesome files used in this plugin, dequeue the divi-fa and divi-fa-brands handle in your child theme.

wp_dequeue_style("divi-fa");
wp_dequeue_style("divi-fa-brands");

= Which version of Font Awesome is used? =
We use version 5.12.0

= Where do I set the plugin to use locally hosted fontawesome =
Please visit **WordPress Admin > Settings > Divi Extra Icons**

== Changelog ==

= 2.1.1 =
* Added Xing, VK, Sound Cloud, Whatsapp, Telegram icons as default

= 2.1.0 =
* Upgraded fontawesome version to 5.12.0
* Adding settings page. Font awesome files can be served locally.

= 1.3 =
* WordPress.org version with no license details required.
* Removed Divi Framework Authentication and Usage tracking

= 1.2.1 =
* March 18, 2019
* Fix for licensing code check bug

= 1.2.0 =
* October 16, 2018
* Added fontawesome CDN and DNS prefetch for the CDN

= 1.1.0 =
*August 13, 2018
*Added df_update_social_icons filter. Using this filter you can add additional font awesome social icons to the pre-configured list

= 1.0.0 =
* August 3, 2018
* Initial Version

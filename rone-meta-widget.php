<?php
/**
 * RO Meta Widget
 *
 * @package   RO Meta Widget
 * @author    Tim Russell <tim@timrussell.com>
 * @author    Raging One <tim@ragingone.com>
 * @copyright Copyright (c) 2014, Raging One, Inc.
 * @license   GPL-2.0+
 *
 *
 * @wordpress-plugin
 * Plugin Name:     RO Meta Widget
 * Plugin URI:      http://www.ragingone.com/wordpress-plugins/
 * Description:     This plugin adds a widget that's almost like the vanilla meta widget, but it lets you choose what items to show.
 * Version:         20150722.1
 * Author:          Tim Russell
 * Author URI:      http://timrussell.com/
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     rone-meta-widget
 * Domain Path:     /languages
 *
 * GitHub Plugin URI: https://github.com/tdavidrussell/rone-meta-widget
 * GitHub Branch:   master
 *
 * Requires WP:       3.9
 * Requires PHP:      5.3
 *
 * Support URI:       http://ragingone.com/support
 * Documentation URI: http://ragingone.com/codex
 *
 * Tags: widget, login widget
 */

/*  Copyright 2007-2014 Tim Russell (email: tim at ragingone.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
/*
 * TODO:
 *  1. add icons for the RSS Feed and Comments RSS
 *  2. if plain user (not Admin/Contributor) change link name 
 *      to "User Profile", instead of "Admin".....
 *  3. Add / Finish Localization
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/** initial constants **/
define( 'ROMW_PLUGIN_VERSION', '20150722.1' );
define( 'ROMW_PLUGIN_DEBUG', false );
//
define( 'ROMW_PLUGIN_URI', plugin_dir_url( __FILE__ ) ); //Does contain trailing slash
define( 'ROMW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) ); //Does contain trailing slash
//
define( 'ROMW_THEME_DIR', get_stylesheet_directory() );    //Does NOT contain a trailing slash
define( 'ROMW_THEME_URI', get_stylesheet_directory_uri() ); //Does not contain a trailing slash

/**
 * Include the widget class.
 */
include( ROMW_PLUGIN_PATH . 'includes/class.rone-meta-widget.php' );

/**
 * Register widget.
 *
 * @since 20150701.1
 */
function rone_load_meta_widget() {
	register_widget( 'rone_meta_widget' );
}

/**
 * Add function (hook action) to widgets_init that'll load widget.
 * @since 20150701.1
 */
add_action( 'widgets_init', 'rone_load_meta_widget' );


?>
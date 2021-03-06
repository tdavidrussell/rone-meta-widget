<?php
/**
 * @category            WordPress_Plugin
 * @package             RO_Meta_Widget
 * @author              Tim Russell <githubber@timrussell.com>
 * @copyright           Copyright (c) 2017-2018.
 * @license             GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:         RO Meta Widget
 * Plugin URI:          https://gitlab.com/tdavidrussell/rone-meta-widget
 * Description:         This plugin adds a widget that's almost like the vanilla meta widget, but it lets you choose what items to show.
 * Version:             20181205.1
 * Author:              Tim Russell
 * Author URI:          https://timrussell.com/
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         rone-meta-widget
 * Domain Path:         /languages
 *
 * GitLab Plugin URI:   https://gitlab.com/tdavidrussell/rone-meta-widget
 * GitLab Branch:       master
 *
 * Requires WP:         4.8
 * Requires PHP:        5.6
 *
 * Support URI:         https://gitlab.com/tdavidrussell/rone-meta-widget
 * Documentation URI:   https://gitlab.com/tdavidrussell/rone-meta-widget
 *
 * Tags: widget, login widget
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * https://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

/*
 * @TODO:
 *  1. add icons for the RSS Feed and Comments RSS
 *  2. if plain user (not Admin/Contributor) change link name 
 *      to "User Profile", instead of "Admin".....
 *  3. Add / Finish Localization
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/** initial constants **/
define( 'ROMW_PLUGIN_VERSION', '20181205.1' );
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

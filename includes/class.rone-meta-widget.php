<?php
/**
 * Widgets
 *
 * @categry     WordPress_Plugin
 * @package     RO_Meta_Widget
 * @subpackage  Widgets
 * @copyright   Copyright (c) 2015, Tim Russell
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       20150702.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * RONE Customized Meta Widget Class
 */
class rone_meta_widget extends WP_Widget {

	// Setup Widget
	function __construct() {

		// Widget settings.
		$widget_ops = array( 'classname' => 'rone-meta-widget', 'description' => __( 'Custom Meta Widget, controls what meta links are displayed.', 'rone-meta-widget' ) );

		//
		$widget_settings = $this->wsettings();
		//
		//$this->WP_Widget( 'rone-meta-widget', __( 'Raging One Meta Widget', 'rone-meta-widget' ), $widget_ops, $widget_settings );
		parent::__construct( 'rone-meta-widget', __( 'Raging One Meta Widget', 'rone-meta-widget' ), $widget_ops, $widget_settings );

	}

	// Default Settings
	function wsettings() {
		//
		$widget_settings = array(
			'title'             => "Raging One Meta Widget",
			'show_registration' => true,
			'show_loginout'     => true,
			'show_rss'          => true,
			'show_rssc'         => true,
			'show_wplink'       => true,
			'id_base'           => 'rone-meta-widget',
		);

		// Return
		return $widget_settings;

	}

	/**
	 * Display the user side widget
	 *
	 * @param mixed $args
	 * @param mixed $instance
	 */
	function widget( $args, $instance ) {

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );
		?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>
        <ul>
			<?php if ( $instance['show_registration'] ) {
				wp_register();
			} ?>
			<?php if ( $instance['show_loginout'] ) { ?>
                <li><?php wp_loginout(); ?></li><?php } ?>
			<?php if ( $instance['show_rss'] ) { ?>
                <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php echo esc_attr( __( 'Syndicate this site using RSS 2.0' ) ); ?>"><?php _e( 'Entries <abbr title="Really Simple Syndication">RSS</abbr>' ); ?></a></li><?php } ?>
			<?php if ( $instance['show_rssc'] ) { ?>
                <li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="<?php echo esc_attr( __( 'The latest comments to all posts in RSS' ) ); ?>"><?php _e( 'Comments <abbr title="Really Simple Syndication">RSS</abbr>' ); ?></a></li><?php } ?>
			<?php if ( $instance['show_wplink'] ) { ?>
                <li><a href="http://wordpress.org/" title="<?php echo esc_attr( __( 'Powered by WordPress, state-of-the-art semantic personal publishing platform.' ) ); ?>">WordPress.org</a></li><?php } ?>
			<?php wp_meta(); ?>
        </ul>
		<?php echo $after_widget; ?>
		<?php
	}

	/**
	 * Update the Widget, form the admin side
	 *
	 * @param mixed $new_instance
	 * @param mixed $old_instance
	 *
	 * @return string
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		//$instance['name'] = strip_tags( $new_instance['name'] );

		/* No need to strip tags */
		$instance['show_loginout']     = $new_instance['show_loginout'];
		$instance['show_registration'] = $new_instance['show_registration'];
		$instance['show_rss']          = $new_instance['show_rss'];
		$instance['show_rssc']         = $new_instance['show_rssc'];
		$instance['show_wplink']       = $new_instance['show_wplink'];

		//
		return $instance;
	}

	/**
	 * Admin side widget form
	 *
	 * @param array $instance
	 *
	 * @return string|void
	 */
	function form( $instance ) {
		$default_settings = $this->wsettings();

		$instance = wp_parse_args( (array) $instance, $default_settings );
		// Clean the Title var....
		$title = esc_attr( $instance['title'] );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
                <input class="widefat" id="title" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>"/>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_registration' ); ?>">
                <input id="<?php echo $this->get_field_id( 'show_registration' ); ?>" name="<?php echo $this->get_field_name( 'show_registration' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_registration'], true ); ?> /> Show "Register/Site Admin"
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_loginout' ); ?>">
                <input id="<?php echo $this->get_field_id( 'show_loginout' ); ?>" name="<?php echo $this->get_field_name( 'show_loginout' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_loginout'], true ); ?> /> Show "Log in/Log out"
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_rss' ); ?>">
                <input id="<?php echo $this->get_field_id( 'show_rss' ); ?>" name="<?php echo $this->get_field_name( 'show_rss' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_rss'], true ) ?> /> Show "Entries RSS"
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_rssc' ); ?>">
                <input id="<?php echo $this->get_field_id( 'show_rssc' ); ?>" name="<?php echo $this->get_field_name( 'show_rssc' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_rssc'], true ); ?> /> Show "Comments RSS"
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_wplink' ); ?>">
                <input id="<?php echo $this->get_field_id( 'show_wplink' ); ?>" name="<?php echo $this->get_field_name( 'show_wplink' ); ?>" type="checkbox" value="1" <?php checked( $instance['show_wplink'], true ); ?> /> Show "WordPress.org"
            </label>
        </p>
		<?php

	}
}// End of Class

<?php
/**
 * Remove inline Recent Comment Styles from wp_head()
 *
 * @package Brass Tacks
 */

/**
 * Remove recent_comments_style from wp_head
 */
function bt_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action(
		'wp_head',
		array(
			$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
			'recent_comments_style',
		)
	);
}

add_action( 'widgets_init', 'bt_remove_recent_comments_style' );

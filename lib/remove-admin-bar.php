<?php
/**
 * Remove the WordPress admin bar.
 *
 * @package Brass Tacks
 */

/**
 * Will remove the admin bar.
 */
function remove_admin_bar() {
	return false;
}

add_filter( 'show_admin_bar', 'remove_admin_bar' );

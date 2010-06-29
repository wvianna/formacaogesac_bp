<?php

/* Load the default BuddyPress AJAX functions */
require_once( BP_PLUGIN_DIR . '/bp-themes/bp-default/_inc/ajax.php' );

/*****
 * Add support for showing the activity stream as the front page of the site
 */

/* Filter the dropdown for selecting the page to show on front to include "Activity Stream" */
function bp_tpack_wp_pages_filter( $page_html ) {
	if ( 'page_on_front' != substr( $page_html, 14, 13 ) )
		return $page_html;

	$selected = false;
	$page_html = str_replace( '</select>', '', $page_html );

	if ( bp_tpack_page_on_front() == 'activity' )
		$selected = ' selected="selected"';

	$page_html .= '<option class="level-0" value="activity"' . $selected . '>' . __( 'Activity Stream', 'buddypress' ) . '</option></select>';
	return $page_html;
}
add_filter( 'wp_dropdown_pages', 'bp_tpack_wp_pages_filter' );

/* Hijack the saving of page on front setting to save the activity stream setting */
function bp_tpack_page_on_front_update( $oldvalue, $newvalue ) {
	if ( !is_admin() || !is_site_admin() )
		return false;

	if ( 'activity' == $_POST['page_on_front'] )
		return 'activity';
	else
		return $oldvalue;
}
add_action( 'pre_update_option_page_on_front', 'bp_tpack_page_on_front_update', 10, 2 );

/* Load the activity stream template if settings allow */
function bp_tpack_page_on_front_template( $template ) {
	global $wp_query;

	if ( empty( $wp_query->post->ID ) )
		return locate_template( array( 'activity/index.php' ), false );
	else
		return $template;
}
add_filter( 'page_template', 'bp_tpack_page_on_front_template' );

/* Return the ID of a page set as the home page. */
function bp_tpack_page_on_front() {
	if ( 'page' != get_option( 'show_on_front' ) )
		return false;

	return apply_filters( 'bp_tpack_page_on_front', get_option( 'page_on_front' ) );
}

/* Force the page ID as a string to stop the get_posts query from kicking up a fuss. */
function bp_tpack_fix_get_posts_on_activity_front() {
	global $wp_query;

	if ( !empty($wp_query->query_vars['page_id']) && 'activity' == $wp_query->query_vars['page_id'] )
		$wp_query->query_vars['page_id'] = '"activity"';
}
add_action( 'pre_get_posts', 'bp_tpack_fix_get_posts_on_activity_front' );

?>
<?php
/*
Plugin Name: BP-Registration-Options
Plugin URI: http://wordpress.org/extend/plugins/bp-registration-options/
Description: BuddyPress plugin that allows for new member moderation, if moderation is switched on any new members will be blocked from interacting with any buddypress elements (except editing their own profile and uploading their avatar) and will not be listed in any directory until an admin approves or denies their account.
Version: 4.2
Author: Brian Messenlehner of WebDevStudios & Jibbius
Author URI: http://webdevstudios.com/about/brian-messenlehner/
Licence: GPLv3
Text Domain: bp-registration-options
*/

define( 'BP_REGISTRATION_OPTIONS_VERSION', '4.2' );

/**
 * Loads BP Registration Options files only if BuddyPress is present
 *
 * @package BP-Registration-Options
 *
 */
function wds_bp_registration_options_init() {

	if ( function_exists( 'buddypress' ) ) {
		$bp = buddypress();
	}

	if ( function_exists( 'bbpress' ) ) {
		$bbp = bbpress();
	}

	if (
	    ( isset( $bp ) && version_compare( $bp->version, '1.7.0', '>=' ) ) ||
	    ( isset( $bbp ) && version_compare( $bbp->version, '2.0.0', '>=' ) )
	   ) {
		require( dirname( __FILE__ ) . '/bp-registration-options.php' );
		$bp_registration_options = new BP_Registration_Options;
	}

}
add_action( 'init', 'wds_bp_registration_options_init' );

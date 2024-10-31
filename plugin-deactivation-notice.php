<?php
/**
Plugin Name: Plugin Deactivation Notice
Plugin URI: https://wordpress.org/plugins/plugin-deactivation-notice/
Description: A simple plugin for showing Alert,Message when deactivating plugins
Author: Akhtarujjaman Shuvo
Author URI: https://devshuvo.com
Tags: plugin-deatcivation-notice, deatcivation-notice, deatcivate-notice, deatcivate-alert
Version: 1.0.0
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 *	Plugin Deactivate Confirmation
 *
 */
if( !function_exists('asr_plugin_deactivate_notice') ){
	function asr_plugin_deactivate_notice(){
		ob_start();
		?>
		<script type="text/javascript">
			jQuery('.plugins .deactivate a').on('click', function(e){

				e.preventDefault();

				var urlRedirect = jQuery(this).attr('href');
				var label = jQuery(this).attr('aria-label');

			    if ( confirm( 'Are you sure '+label+' ?' ) ) {
			        window.location.href = urlRedirect;
			    } else {
			        //what else ?
			    }
			    
			});
		</script>
		<?php
		echo ob_get_clean();

	}
}
add_action( 'admin_footer', 'asr_plugin_deactivate_notice' );
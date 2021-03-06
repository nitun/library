<?php
/*
 * Plugin Name: Easy Digital Downloads - Show Terms By Default
 * Description: Show the terms of agreement open on the checkout page by default
 * Author: Andrew Munro, Sumobi
 * Author URI: http://sumobi.com/
 * Version: 1.0
 */

function sumobi_edd_show_terms_agreement() {
	global $edd_options;
	if ( isset( $edd_options['show_agree_to_terms'] ) ) {
?>
		<fieldset id="edd_terms_agreement">
			<div id="edd_terms">
				<?php
					do_action( 'edd_before_terms' );
					echo wpautop( stripslashes( $edd_options['agree_text'] ) );
					do_action( 'edd_after_terms' );
				?>
			</div>

			<label for="edd_agree_to_terms"><?php echo isset( $edd_options['agree_label'] ) ? stripslashes( $edd_options['agree_label'] ) : __( 'Agree to Terms?', 'edd' ); ?></label>
			<input name="edd_agree_to_terms" class="required" type="checkbox" id="edd_agree_to_terms" value="1" />
		</fieldset>
<?php
	}
}
remove_action( 'edd_purchase_form_before_submit', 'edd_terms_agreement' );
add_action( 'edd_purchase_form_before_submit', 'sumobi_edd_show_terms_agreement' );
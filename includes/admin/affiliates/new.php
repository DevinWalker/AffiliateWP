<?php
$default_rate = affiliate_wp()->settings->get( 'referral_rate', 20 );
$default_rate = affwp_abs_number_round( $default_rate );
?>
<div class="wrap">

	<h2><?php _e( 'New Affiliate', 'affiliate-wp' ); ?></h2>

	<form method="post" id="affwp_add_affiliate">

		<?php do_action( 'affwp_new_affiliate_top' ); ?>

		<p><?php printf( __( 'Use this screen to register a new affiliate. Each affiliate is tied directly to a user account, so if the user account for the affiliate does not yet exist, <a href="%s" target="_blank">create one</a>.', 'affiliate-wp' ), admin_url( 'user-new.php' ) ); ?></p>

		<table class="form-table">

			<tr class="form-row form-required">

				<th scope="row">
					<label for="user_name"><?php _e( 'User', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<span class="affwp-ajax-search-wrap">
						<input type="text" name="user_name" id="user_name" class="affwp-user-search" data-affwp-status="none" autocomplete="off" />
						<img class="affwp-ajax waiting" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" style="display: none;"/>
					</span>
					<div id="affwp_user_search_results"></div>
					<p class="description"><?php _e( 'Begin typing the name of the affiliate to perform a search for their associated user account.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="status"><?php _e( 'Affiliate Status', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<select name="status" id="status">
						<option value="active"><?php _e( 'Active', 'affiliate-wp' ); ?></option>
						<option value="inactive"><?php _e( 'Inactive', 'affiliate-wp' ); ?></option>
						<option value="pending"><?php _e( 'Pending', 'affiliate-wp' ); ?></option>
					</select>
					<p class="description"><?php _e( 'The status assigned to the affiliate\'s account.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="rate_type"><?php _e( 'Referral Rate Type', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<select name="rate_type" id="rate_type">
						<option value=""><?php _e( 'Site Default', 'affiliate-wp' ); ?></option>
						<?php foreach( affwp_get_affiliate_rate_types() as $key => $type ) : ?>
							<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $type ); ?></option>
						<?php endforeach; ?>
					</select>
					<p class="description"><?php _e( 'The affiliate\'s referral rate type.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="rate"><?php _e( 'Referral Rate', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="small-text" type="number" name="rate" id="rate" step="0.01" min="0" max="999999" placeholder="<?php echo esc_attr( $default_rate ); ?>" />
					<p class="description"><?php _e( 'The affiliate\'s referral rate, such as 20 for 20%. If left blank, the site default will be used.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="payment_email"><?php _e( 'Payment Email', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="text" name="payment_email" id="payment_email" />
					<p class="description"><?php _e( 'Affiliate\'s payment email for systems such as PayPal, Moneybookers, or others. Leave blank to use the affiliate\'s user email.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row" id="affwp-welcome-email-row">

				<th scope="row">
					<label for="welcome_email"><?php _e( 'Welcome Email', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<label class="description">
						<input type="checkbox" name="welcome_email" id="welcome_email" value="1"/>
						<?php _e( 'Send welcome email after registering affiliate?', 'affiliate-wp' ); ?>
					</label>
				</td>

			</tr>

			<?php do_action( 'affwp_new_affiliate_end' ); ?>

		</table>

		<?php do_action( 'affwp_new_affiliate_bottom' ); ?>

		<input type="hidden" name="user_id" id="user_id" value="" />
		<input type="hidden" name="affwp_action" value="add_affiliate" />

		<?php submit_button( __( 'Add Affiliate', 'affiliate-wp' ) ); ?>

	</form>

</div>

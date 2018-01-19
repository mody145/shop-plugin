<?php 

function view_option__callback() { ?>

	<?php settings_errors(); ?>
	<form method="POST" action="options.php">
		<?php settings_fields( 'shop-settings-group' ); ?>
		<?php do_settings_sections( 'status' );  ?>
		<?php submit_button(); ?>
	</form>

<?php } ?>
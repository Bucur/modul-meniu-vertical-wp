<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('admin_menu', 'meniu_plugin_create_menu');

function meniu_plugin_create_menu() {
    // https://developer.wordpress.org/reference/functions/add_submenu_page/
	add_menu_page('Plugin Settings', 'Meniu Vertical', 'administrator', __FILE__, 'my_cool_plugin_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}

function register_my_cool_plugin_settings() {
	//register our settings
	register_setting( 'meniu-plugin-settings-group', 'new_option_name' );
	register_setting( 'meniu-plugin-settings-group', 'some_other_option' );
	register_setting( 'meniu-plugin-settings-group', 'option_etc' );
}

function my_cool_plugin_settings_page() {
?>
<div class="wrap">
<h1>Optiuni</h1>

<form method="post" action="options.php">

    <?php settings_fields( 'meniu-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'meniu-plugin-settings-group' ); ?>
    <table class="form-table">

       <tr valign="top">
        <th>Folosire shortcode in pagina [meniuvertical]</th>
       </tr>

        <tr valign="top">
        <th scope="row">Width (Ex: 270px) default 260px</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>

    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php
}


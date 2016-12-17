<?php 

function wpcp_settings_setup() {

	add_options_page('WPCP Settings', 'WPCP Settings', 'manage_options', 'wpcp-setting', 'wpcp_render_options_page');
}

add_action('admin_menu', 'wpcp_settings_setup');

function wpcp_render_options_page()
{
	global $wpcp_options;

	?>
		
	<div class="wrap">

	    <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            }
            else {
                $active_tab = 'content_options';
            }
        ?>
			<h2><?php _e('WPCP Settings', 'complete-popup'); ?></h2>

			 <h2 class="nav-tab-wrapper">
                <a href="?page=complete-popup&tab=content_options" class="nav-tab <?php echo $active_tab == 'content_options' ? 'nav-tab-active' : ''; ?>">Content</a>
                <a href="?page=complete-popup&tab=appearance_options" class="nav-tab <?php echo $active_tab == 'appearance_options' ? 'nav-tab-active' : ''; ?>">Appearance</a>
                <a href="?page=gncountdown&tab=social_media_options" class="nav-tab <?php echo $active_tab == 'social_media_options' ? 'nav-tab-active' : ''; ?>">Social Media Options</a>
            </h2>

            <form action="options.php" method="post" enctype="multipart/form-data">
            <?php
            if( $active_tab == 'content_options' ) {
            ?>
            <h2>Page Settings</h2>
            <?php settings_fields( 'wpcp_content_setting_group' ); ?>
            <?php do_settings_sections( 'wpcp_content_setting_group' ); ?>
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row"> Enter Title </th>
                        <td><input type="text" name="wpcp_page_title" id="show_title" value="<?php echo esc_attr( get_option('wpcp_page_title') ) ?>" required>
                    </td>

                    </tr>
                    <tr valign="top">
                    <th scope="row"> Enter Description </th>
                        <td>
                            <textarea name="wpcp_desc" id="show_desc" value="" required><?php echo esc_attr( get_option('wpcp_desc'));?></textarea>
                        </td>
                    </tr>
                </table>
                <?php submit_button();?>
        	<pre id="shortcode-label">[gn-countdown]</pre>
        	<p>use the above code to use shortcode</p>

        </form>
        </div>
        <?php 

        }  ?>

        <?php
            if ( $active_tab == 'appearance_options' ) {
            ?>
            <div class="wrap">
            <form action="options.php" method="post">
            
            <h2>Appearance Settings</h2>
            <?php settings_fields( 'maintenance_appearance_setting_group' ); ?>
            <?php do_settings_sections( 'maintenance_appearance_setting_group' ); ?>
            <?php wp_enqueue_script( 'cpa_custom_js', plugins_url( 'admin/js/jquery.custom.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '', true  ); ?>
       
                <table class="form-table">

                    <tr valign="top">
                    <th scope="row"> Select Title Color </th>
                    <td><input type="text" name="maintenance_mode_title_color" class="cpa-color-picker" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_title_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Description Color </th>
                    <td><input type="text" name="maintenance_mode_desc_color" class="cpa-color-picker" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_desc_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Countdown Color </th>
                    <td><input type="text" name="maintenance_mode_countdown_color" class="cpa-color-picker" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Background Image </th>
                    <td><input type="text" name="maintenance_mode_background_image" class="cpa-color-picker" id="show_desc" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_color') ) ?>" required></td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Title Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_title_size" value="<?php echo esc_attr( get_option('maintenance_mode_title_size') ) ?>"" onchange="show_title(this.value);">
                            <span id="slider_title" style="color:red;"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                    <th scope="row"> Select Countdown Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_desc_size" value="<?php echo esc_attr( get_option('maintenance_mode_desc_size') ) ?>"" onchange="show_description(this.value);">
                            <span id="slider_desc" style="color:red;"></span>
                        </td>
                    </tr>

                    <tr valign="top">
                    <th scope="row"> Select Countdown Font Size </th>
                        <td><input width="400" type="range" min="12" max="100" name="maintenance_mode_countdown_size" value="<?php echo esc_attr( get_option('maintenance_mode_countdown_size') ) ?>"" onchange="show_countdown(this.value);">
                            <span id="slider_countdown" style="color:red;"></span>
                        </td>
                    </tr>
                    <tr valign="top">
                    <th scope="row"> Select container opacity </th>
                        <td><input width="400" type="range" min="0" max="1" step="0.1" name="maintenance_mode_container_opacity" value="<?php echo esc_attr( get_option('maintenance_mode_container_opacity') ) ?>"" onchange="show_container(this.value);">
                            <span id="slider_container" style="color:red;"></span>
                        </td>
                    </tr>

                </table>
                <?php submit_button();?>
        
        </form>
        </div>
        <?php } ?>
          
	</div>
	<?php 
}

    function gncd_register_setting() {

        // we register the content fields with WordPress

        register_setting(
            'wpcp_content_setting_group',
            'maintenance_mode_toggle'
        );

        register_setting(
            'wpcp_content_setting_group',
            'wpcp_page_title'
        );
        register_setting(
            'wpcp_content_setting_group',
            'wpcp_desc'
        );
     
    }

    add_action( 'admin_init', 'gncd_register_setting' );

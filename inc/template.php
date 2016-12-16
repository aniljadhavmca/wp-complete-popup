<?php
	add_action( 'init', 'wpcp_genereate_shortcode_init', 11 );
		function wpcp_genereate_shortcode_init()
		{
		    add_shortcode( 'show_page_content', 'wpcp_genereate_shortcode' );
		}

		function wpcp_genereate_shortcode( $atts )
		{
		    $output = '';
		    $atts = shortcode_atts(
				array(
					'id' => '',
				), $atts, 'show_page_content' );
		    if ($atts['id']===""){
		    	return "Enter Id";
		    }
		    else {
			    $page_id = $atts['id']; // the ID of the Bio page
			    $page_data = get_page( $page_id );
				$output .= '<div id="single-image">';
				$output .= '<span>Read More</span></div>';
				$output .= '<div id="cp-social-share" class="social-share-modal">';
				$output .= '<div class="cp-social-share-content">';
				$output .= '<div class="wpcp-modal-header">';
				$output .= '<h2>' . $page_data->post_title . '</h2>';
				$output .= '</div>';
				$output .= '<div class="wpcp-content">';
				$output .= $page_data->post_content;
				$output .= '</div>';
				$output .= '</div>';
				$output .= '<span class="close-image close">&times</span>';
				$output .= '</div>';
				return $output;
			}
		}


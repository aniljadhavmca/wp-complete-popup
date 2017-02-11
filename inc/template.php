<?php
	add_action( 'init', 'wpcp_genereate_shortcode_init', 11 );
		function wpcp_genereate_shortcode_init()
		{
		    add_shortcode( 'show_page_content', 'wpcp_genereate_shortcode' );
		}


		function wpcp_genereate_shortcode( $atts )
		{
		  extract(shortcode_atts( array(
			   'page_id'   => '',
			   
			), $atts ));

		  		// var_dump( $atts );

		  	// echo $atts['page_id'] . "Anil";
		   
				    $page_data = get_post( $atts['page_id'] );
					$output .= '<div data-role="page" id="wpcp-popup-'.$atts['page_id'].'" class="read-more">';
					$output .= '<span>Read More</span></div>';
					$output .= '<div id="wpcp-page" class="page-modal">';
					$output .= '<div class="wpcp-page-content">';
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


// <div class="section_block">
// <a class="block" href="#""
// 	<h3> Subscribe Form </h3>
// </a>

// <a class="block" href="#""
// 	<h3> Subscribe Form </h3>
// </a>

// <a class="block" href="#""
// 	<h3> Subscribe Form </h3>
// </a>
// </div>

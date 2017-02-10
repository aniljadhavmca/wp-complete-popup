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
		    //var_dump($atts);
		    foreach ( $atts as $key => $get_page_id ) {
		    //   var_dump($key);
			  echo "$get_page_id <br>";
		   			

				    $page_data = get_page( $get_page_id);
					$output .= '<div class="read-more">';
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
			    	ob_get_clean($get_page_id);
				
			}
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

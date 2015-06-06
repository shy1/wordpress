<?php

function seths_featured_product( $atts ){
	global $fposts;
	extract(shortcode_atts( array(
		'index' => 0,
		'row' => '1'
	), $atts ) );
	$product = get_post($fposts[$index]->ID, ARRAY_A); 
	$custom = get_post_custom($fposts[$index]->ID);
	$img = wp_get_attachment_image($custom[_thumbnail_id][0], 'medium');
	switch ($row) {
	case "1":
		ob_start();
		$html = '<div class="row bodycont960"><a href=' . $product[guid] . '><div class="col-lg-7 col-md-7 col-xs-12 col-sm-12">' . $img . '</div><div class="col-lg-5 col-md-5 col-xs-12 col-sm-12"><h5 class="upper">' . $product[post_title] . '</h5><p class="price">£' . $custom[_price][0] . '</p><hr class="hline" /><p>' . $product[post_excerpt] . '</p></div></a></div>';
		$output = ob_get_clean();
		return $html . $output;
	case "2":
		ob_start();
		$html = '<div class="row bodycont960"><a href=' . $product[guid] . '><div class="col-lg-5 col-md-5 col-xs-12 col-sm-12"><h5 class="upper">' . $product[post_title] . '</h5><p class="price">£' . $custom[_price][0] . '</p><hr class="hline" /><p>' . $product[post_excerpt] . '</p></div><div class="col-lg-7 col-md-7 col-xs-12 col-sm-12">' . $img . '</div></a></div>';
		$output = ob_get_clean();
		return $html . $output;
	case "3":
		ob_start();
		$html = '<div class="row botcont960"><a href=' . $product[guid] . '><div class="col-lg-7 col-md-7 col-xs-12 col-sm-12">' . $img . '</div><div class="col-lg-5 col-md-5 col-xs-12 col-sm-12"><h5 class="upper">' . $product[post_title] . '</h5><p class="price">£' . $custom[_price][0] . '</p><hr class="hline" /><p>' . $product[post_excerpt] . '</p></div></a></div>';
		$output = ob_get_clean();
		return $html . $output;
	}
}

add_shortcode('featuredp', 'seths_featured_product');
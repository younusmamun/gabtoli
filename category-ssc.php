<?php

single_cat_title();

$gabtoli_current_term = get_queried_object();

$gabtoli_term_thumbnail_id = get_field('thumbnail',$gabtoli_current_term);


if($gabtoli_term_thumbnail_id){
	$file_thumbnail_url = wp_get_attachment_image_src($gabtoli_term_thumbnail_id);
	echo "<br/><img src='".esc_url($file_thumbnail_url[0])."'/>" ;
}






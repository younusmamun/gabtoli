<?php 
/**
 * 
 * Template Name: Custom Query Author posts
 * 
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?> >
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
	<?php
	$paged = get_query_var('paged')? get_query_var('paged') : 1;
	//$post_ids = array(45,49,42,15,51,6,1);
	$posts_per_page = 2;
	$total = 9;

	$_p = get_posts(array(
		'posts_per_page' => $posts_per_page,
		'author__in' => array(1),
		'numberposts'=>$total,
		//'post__in'=> $post_ids,
		
		//'order'=>'asc',
		'orderby'=>'post__in',
		'paged' => $paged
	));
	foreach ( $_p as $p ) {
		//setup_postdata($post);
		// echo '<pre>';
		// print_r($p);
		// echo '</pre>';

		?>
        <h2 class="post-title">
			<a href="<?php echo esc_url($p->guid); ?>">
			<?php echo apply_filters('the_title',$p->post_title); ?> 
			<?php //echo $p->post_title; ?> 
			</a>
        </h2><?php
	}
	//wp_reset_postdata();
	//the_title();
	?>
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
				<?php
					echo paginate_links(array(
						//'total'=> ceil(count($post_ids) / $posts_per_page);
						'total'=> ceil( $total / $posts_per_page)	
					));
				?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>



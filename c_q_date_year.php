<?php 
/**
 * 
 * Template Name: Custom Query WP date_year_post_status
 * 
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?> >
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
	<?php
	$paged = get_query_var('paged')? get_query_var('paged') : 1;
	//$post_ids = array(45,49,42,15,1,51);
	//$cat_name = ;
	$posts_per_page = 4;

	$_p = new WP_Query(array(
		 'posts_per_page' => $posts_per_page,
		// //'category_name' => 'ssc',
		// //'tag' => 'hsc',
		// 'orderby'=>'post__in',
		 'paged' => $paged,
		// 'tax_query'=>array(
		// 	'relation'=>'OR',
		// 	array(
		// 		'taxonomy'=>'category',
		// 		'field'=>'slug',
		// 		'terms'=>array('ssc')
		// 	),
		// 	array(
		// 		'taxonomy'=>'post_tag',
		// 		'field'=>'slug',
		// 		'terms'=>array('hsc')
		// 	)
		// )

		// 'monthnum'=>6,
		// 'year'=>2019,
		//'post_status' => 'publish',
		//'post_status' => 'draft'

		'post_status' => 'future',
	));
	while ( $_p->have_posts() ) {
		$_p->the_post();
		?>
        <h2 class="post-title">
        <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
        </h2><?php
	}
	wp_reset_query();
	the_title();
	?>
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-12">
				<?php
					echo paginate_links(array(
						'total' => $_p->max_num_pages,
						'current' => $paged,
						//'prev_next'=>false,
						'prev_text'=>__('Old Posts','gabtoli'),
						'next_text'=>__('New Posts','gabtoli'),
					));
				?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>



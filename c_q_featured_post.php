<?php 
/**
 * 
 * Template Name: Custom Query WP featured post
 * 
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?> >
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
	<?php
	$paged = get_query_var('paged')? get_query_var('paged') : 1;
	$posts_per_page = 4;

	$_p = new WP_Query(array(
		'posts_per_page' => $posts_per_page,
		'orderby'=>'post__in',
		'paged' => $paged,

		// 'meta_key'=>'featured',
		// 'meta_value'=>'1'
		
		'meta_query' =>array(
			'relation'=>'AND',
			array(
				'key'=>'featured',
				'value'=>'1',
				'compare'=>'='
			),
			array(
				'key'=>'homepage',
				'value'=>'1',
				'compare'=>'='
			)
		)


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



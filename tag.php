<?php get_header(); ?>

<body <?php body_class(); ?> >

<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts">
    <h1>Posts Under: <?php single_tag_title(); ?> </h1>
	<?php
	while ( have_posts() ) {
		the_post();
		?>
        <h2 class="post-title">
        <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
        </h2><?php

	}
	?>
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
				<?php
				the_posts_pagination( array(
					"mid_size"           => 4,
					"screen_reader_text" => ' ',
					"prev_text"          => "New post",
					"next_text"          => "Old post"

				) );

				?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>



<?php get_header(); ?>

<body <?php body_class(); ?> >

<?php get_template_part("/template-parts/common/hero"); ?>
<div class="container">
    <div class="col-md-12">
        <div class="authorsection authorpage">
            <div class="row">
                <div class="col-md-2 authorimage">
					<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </div>
                <div class="col-md-10">
                    <h4>
						<?php echo get_the_author_meta( 'display_name' ); ?>
                    </h4>
                    <p>
						<?php echo get_the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="posts">

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



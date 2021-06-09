<?php get_header(); ?>

<body <?php body_class(); ?> >

<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts">
    <h1>Posts In:
    <?php
    if(is_month()){
        $month = get_query_var('monthnum');
        $dateobj = Datetime::createFromFormat('!m',$month);
        echo $dateobj->format("F");
    }else if(is_year()){
        echo esc_html(get_query_var('year'));
    }else if(is_day()){
        //echo get_query_var('day'),'/'.get_query_var('monthnum'),'/'.get_query_var('year');
        //printf('%s/%s/%s',get_query_var('day'),get_query_var('monthnum'),get_query_var('year'));

        //printf('%s/%s/%s',esc_html(get_query_var('day')),esc_html(get_query_var('monthnum')),esc_html(get_query_var('year'));

        $day = esc_html(get_query_var('day'));
        $month = esc_html(get_query_var('monthnum'));
        $year = esc_html(get_query_var('year'));
        printf('%s/%s/%s',$day,$month,$year);

    }

    ?>
    </h1>
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



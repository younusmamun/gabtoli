<?php

/*
 * Template Name: About-team-testimonial-team Template
 */
?>

<?php get_header(); ?>
<body <?php body_class(); ?> >
<?php get_template_part("/template-parts/about-page/hero-page"); ?>
    <div class="posts">
        <?php
        while(have_posts()){
            the_post();
            ?>
            <div class="post" <?php post_class(); ?> >
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="post-title text-center">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-center">
                                <strong><?php the_author(); ?></strong><br/>
                                <?php echo get_the_date("jS F Y"); ?>
                            </p>
                        </div>
                    </div>
                      
                    <div class="row">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">

                                <?php $attachments = new Attachments( 'testimonials' ); ?>
                                <?php if(class_exists( 'Attachments' ) && $attachments->exist() ){ ?> 
                                
                                <h3 class="text-center">
                                    <?php _e('Testimonials','gabtoli') ?>
                                </h3>
                                <?php } ?>
                                <div class="testimonials slider text-center">
                                    <?php
                                    if(class_exists( 'Attachments' )){
                                        
                                        if( $attachments->exist() ) : ?>

                                            <?php while( $attachment = $attachments->get() ) : ?>
                                                <div>
                                                    <?php echo $attachments->image('thumbnail'); ?>
                                                    <h4><?php echo esc_html($attachments->field('name')); ?></h4>
                                                    <p><?php echo esc_html($attachments->field('testimonial')); ?></p>
                                                    <p>
                                                        <?php echo esc_html($attachments->field('position')); ?>
                                                        <strong>
                                                            <?php echo esc_html($attachments->field('company')); ?>
                                                        </strong>
                                                    </p>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            </div>   

                        </div>

                        <?php if(class_exists( 'Attachments' )){ ?>
                            <div class="row">
                                <?php 
                                $attachments = new Attachments( 'team' );
                                if( $attachments->exist() ) : ?>

                                    <?php while( $attachment = $attachments->get() ) : ?>
                                        <div class="col-md-4">
                                            <?php echo $attachments->image('medium'); ?>
                                            <h4><?php echo esc_html($attachments->field('name')); ?></h4>
                                            <p><?php echo esc_html($attachments->field('position')); ?></p>
                                            <p><?php echo esc_html($attachments->field('company')); ?></p>
                                            <p><?php echo esc_html($attachments->field('bio')); ?></p>
                                            <p><?php echo esc_html($attachments->field('email')); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>                                                            
                            </div>        
                        <?php } ?> 

                        <div class="col-md-10 offset-md-1">
                                <p>
                                    <?php
                                    if(has_post_thumbnail()){
                                        //$thumbnail_url = get_the_post_thumbnail_url(null,"large");
                                        //printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
                                        echo '<a class="popup" href="#" data-featherlight="image">';
                                        the_post_thumbnail("large",array("class"=>"img-fluid"));
                                        echo '</a>';
                                    }
                                    ?>
                                </p>
                                <?php
                                the_content();
                                ?>
                            </div>
                    </div> 
                              
                      
                </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php get_footer(); ?>



<?php
$gabtoli_sidebar_class      = 'col-md-8';
$gabtoli_sidebar_meta_class = '';
if ( ! is_active_sidebar( 'sidebar-1' ) ):
	$gabtoli_sidebar_class      = 'col-md-10 offset-md-1';
	$gabtoli_sidebar_meta_class = 'text-center';
endif;

?>
<?php get_header(); ?>
<body <?php body_class( array( 'first_class', 'second_class' ) ); ?> >
<?php get_template_part( "/template-parts/common/hero" ); ?>
<div class="container">
    <div class="row">
        <div class="<?php echo $gabtoli_sidebar_class; ?> ">
            <div class="posts">
				<?php
				while ( have_posts() ) {
				the_post();
				?>
                <div <?php post_class( array( 'first_class', 'second_class' ) ); ?> >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="post-title <?php echo $gabtoli_sidebar_meta_class; ?>  ">
									<?php the_title(); ?>
                                </h2>
                                <p class="<?php echo $gabtoli_sidebar_meta_class; ?>">
                                    <strong><?php the_author(); ?></strong><br/>
                                    <strong><?php the_author_posts_link(); ?></strong><br/>
									<?php echo get_the_date( "jS F Y" ); ?>
                                </p>
                            </div>

                        </div>
                        <div class="row">
							<div class="col-md-12">
								<div class="slider">
									<?php
									if ( class_exists( 'Attachments' ) ) {
										$attachments = new Attachments( 'slider' );
										if ( $attachments->exist() ) : ?>
											<?php while ( $attachment = $attachments->get() ) : ?>
												<div>
													<?php echo $attachments->image( 'large' ); ?>
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php } ?>

								</div>
							</div>
                            <div class="col-md-12 text-center">
                                <p>
									<?php
									if ( ! class_exists( 'Attachments' ) ) {
										if ( has_post_thumbnail() ) {
											//$thumbnail_url = get_the_post_thumbnail_url(null,"large");
											//printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
											echo '<a class="popup" href="#" data-featherlight="image">';
											the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
											echo '</a>';
										}
									}
									?>
                                </p>
								<?php
								the_content();

								if ( get_post_format() == 'image' && function_exists( 'the_field' ) ):
									$camera_model = get_post_meta( get_the_ID(), 'camera_model', true );
									$related_posts = get_post_meta( get_the_ID(), 'related_posts', true );
									//print_r($related_posts);
									?>
                                    <div class="metainfo">
                                        <strong>Camera Model: </strong><?php the_field( 'camera_model' ); ?><br/>
                                        <strong>Camera Model: </strong><?php echo esc_html( $camera_model ); ?><br/>
                                        <strong>Location: </strong>
										<?php
										$gabtoli_location = get_field( 'location' );
										echo esc_html( $gabtoli_location );
										?>
                                        <br/>
                                        <strong>Date: </strong><?php the_field( 'date' ); ?><br/>
										<?php if ( get_field( 'licensed' ) ): ?>
                                            <!-- <P>
                                                        <?php //the_field('license')?>
                                                    </p> -->
											<?php echo apply_filters( 'the_content', get_field( 'license_information' ) ); ?>
										<?php endif; ?>
                                    </div>
                                    <p>
										<?php
										$gabtoli_image         = get_field( 'image' );
										$gabtoli_image_details = wp_get_attachment_image_src( $gabtoli_image, 'gabtoli-square' );
										//print_r($gabtoli_image_details);
										//echo esc_url($gabtoli_image_details[0]);

										echo "<img src='" . esc_url( $gabtoli_image_details[0] ) . "'/>";


										// echo '<pre>';
										// print_r($gabtoli_image);
										// echo '</pre>';
										?>
                                    </p>

                                    <p>
										<?php
										//the_field('attachment');
										?>

                                    <pre>
                                                <?php
                                                //print_r(get_field('attachment'));
                                                ?>
                                                </pre>

									<?php
									$file = get_field( 'attachment' );
									if ( $file ) {
										$file_url   = wp_get_attachment_url( $file );
										$file_thumb = get_field( 'thumbnail', $file );
										if ( $file_thumb ) {
											$file_thumb_details = wp_get_attachment_image_src( $file_thumb );
											echo "<a target='_blank' href='{$file_url}'>
                                                                    <img src='" . esc_url( $file_thumb_details[0] ) . "'/>
                                                                </a>";
										} else {
											echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
										}
									}
									?>
                                    </p>

                                    <pre>
                                                <?php //print_r( get_field( 'related_posts' ) );
                                                ?>
                                            </pre>
									<?php if ( function_exists( 'the_field' ) ): ?>
                                    <div>
                                        <h1><?php _e( 'Related Posts', 'gabtoli' ) ?></h1>
										<?php
										$related_posts = get_field( 'related_posts' );
										$gabtoli_rp    = new WP_Query( array(
											'post__in' => $related_posts,
											'orderby'  => 'post__in'
										) );
										while ( $gabtoli_rp->have_posts() ) {
											$gabtoli_rp->the_post();
											?>
                                            <h4 class="post-title">
                                            <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
                                            </h4><?php
										}
										wp_reset_query();
										?>

                                    </div>

								<?php endif ?>


								<?php
								endif;
								// 2nd test

								if ( get_post_format() == 'image' && class_exists( 'CMB2' ) ):
									$gabtoli_camera_model = get_post_meta( get_the_ID(), '_gabtoli_camera_model', true );
									$gabtoli_location = get_post_meta( get_the_ID(), '_gabtoli_location', true );
									$gabtoli_date = get_post_meta( get_the_ID(), '_gabtoli_date', true );
									$gabtoli_licensed = get_post_meta( get_the_ID(), '_gabtoli_licensed', true );
									$gabtoli_licensed_information = get_post_meta( get_the_ID(), '_gabtoli_licensed_information', true );
									?>
                                    <div class="metainfo">
                                        <strong>Camera Model: </strong><?php echo esc_html( $gabtoli_camera_model ); ?>
                                        <br/>
                                        <strong>Location: </strong>
										<?php
										echo esc_html( $gabtoli_location );
										?>
                                        <br/>
                                        <strong>Date: </strong><?php echo esc_html( $gabtoli_date ); ?><br/>
										<?php if ( $gabtoli_licensed ) : ?>
											<?php echo apply_filters( 'the_content', $gabtoli_licensed_information ); ?>
										<?php endif; ?>
                                        <p>
											<?php
											$gabtoli_image         = get_post_meta( get_the_ID(), '_gabtoli_image_id', true );
											$gabtoli_image_details = wp_get_attachment_image_src( $gabtoli_image, 'gabtoli-square' );
											echo "<img src='" . esc_url( $gabtoli_image_details[0] ) . "'/>";
											?>
                                        </p>
                                        <p>
											<?php
											$gabtoli_file = get_post_meta( get_the_ID(), '_gabtoli_resume', true );
											echo esc_url( $gabtoli_file );
											echo "<a href='{$gabtoli_file}' >click</a>";
											?>
                                        </p>
                                    </div>

								<?php endif ?>
								<?php
								// the_post_thumbnail('gabtoli-square');
								// echo '<br/>';
								// the_post_thumbnail('gabtoli-portrait');
								// echo '<br/>';
								// the_post_thumbnail('gabtoli-landscape');
								// echo '<br/>';
								// the_post_thumbnail('gabtoli-landscape-hard-cropped');


								wp_link_pages();

								next_post_link();
								echo "</br>";
								previous_post_link();
								?>

                            </div>
                            <div class="col-md-12">
                                <div class="authorsection">
                                    <div class="row">
                                        <div class="col-md-2 authorimage">
											<?php echo get_avatar( get_the_author_meta( 'ID') );
											?>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>
												<?php echo get_the_author_meta( 'display_name' ); ?>
                                            </h4>
                                            <p>
												<?php echo get_the_author_meta( 'description' ); ?>
                                            </p>
											<?php if ( function_exists( 'the_field' ) ) : ?>
                                                <p>
                                                    Facebook: <?php the_field( 'facebook', 'user_' . get_the_author_meta( 'ID' ) ) ?>
                                                    <br/>
                                                    Twitter: <?php the_field( 'twitter', 'user_' . get_the_author_meta( 'ID' ) ) ?>
                                                    <br/>
                                                </p>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


							<?php if ( ! post_password_required() ): ?>
                                <div class="col-md-12">
									<?php
									comments_template();
									?>
                                </div>
							<?php endif; ?>
                        </div>
						<?php
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
                </div>
				<?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>
                    <div class="col-md-4">
						<?php
						if ( is_active_sidebar( "sidebar-1" ) ) {
							dynamic_sidebar( "sidebar-1" );
						}
						?>
                    </div>
				<?php endif; ?>
            </div>
        </div>

		<?php get_footer(); ?>



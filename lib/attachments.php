<?php

define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function gabtoli_attachments($attachments){
	$fields         = array(
		array(
			'name'      => 'title',
			'type'      => 'text',
			'label'     => __( 'Title', 'gabtoli' ),
		),
		array(
			'name'      => 'caption',
			'type'      => 'wysiwyg',
			'label'     => __( 'caption', 'gabtoli' ),
		)
	);

	$args = array(

		'label'         => 'Featured Slider',
		'post_type'     => array( 'post' ),
		'filetype'      => array('image'),
		'note'          => 'Add slider images',
		'button_text'   => __( 'Attach Files', 'gabtoli' ),
		'fields'        => $fields,

	);


	$attachments->register( 'slider', $args );
}

add_action( 'attachments_register', 'gabtoli_attachments' );

function gabtoli_testimonial_attachments($attachments){
	$fields         = array(
		array(
			'name'      => 'name',
			'type'      => 'text',
			'label'     => __( 'Name', 'gabtoli' ),
		),
		array(
			'name'      => 'position',
			'type'      => 'text',
			'label'     => __( 'Position', 'gabtoli' ),
		),
		array(
			'name'      => 'company',
			'type'      => 'text',
			'label'     => __( 'Company', 'gabtoli' ),
		),
		array(
			'name'      => 'testimonial',
			'type'      => 'textarea',
			'label'     => __( 'Testimonial', 'gabtoli' ),
		)
	);

	$args = array(

		'label'         => 'Testimonial',
		'post_type'     => array( 'page' ),
		'filetype'      => array('image'),
		'note'          => 'Add testimonial',
		'button_text'   => __( 'Attach Files', 'gabtoli' ),
		'fields'        => $fields,

	);


	$attachments->register( 'testimonials', $args );
}

add_action( 'attachments_register', 'gabtoli_testimonial_attachments' );

function gabtoli_team_attachments($attachments){
	$fields         = array(
		array(
			'name'      => 'name',
			'type'      => 'text',
			'label'     => __( 'Name', 'gabtoli' ),
		),
		array(
			'name'      => 'position',
			'type'      => 'text',
			'label'     => __( 'Position', 'gabtoli' ),
		),
		array(
			'name'      => 'company',
			'type'      => 'text',
			'label'     => __( 'Company', 'gabtoli' ),
		),
		array(
			'name'      => 'bio',
			'type'      => 'text',
			'label'     => __( 'Bio', 'gabtoli' ),
		),
		array(
			'name'      => 'email',
			'type'      => 'text',
			'label'     => __( 'Email', 'gabtoli' ),
		)
	);

	$args = array(

		'label'         => 'Team members',
		'post_type'     => array( 'page' ),
		'filetype'      => array('image'),
		'note'          => 'Add Team',
		'button_text'   => __( 'Attach Files', 'gabtoli' ),
		'fields'        => $fields,

	);


	$attachments->register( 'team', $args );
}

add_action( 'attachments_register', 'gabtoli_team_attachments' );
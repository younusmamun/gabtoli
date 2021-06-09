<?php
add_action( 'cmb2_init', 'cmb2_add_image_info_metabox' );
function cmb2_add_image_info_metabox() {

	$prefix = '_gabtoli_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'gabtoli' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'gabtoli' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
		'default' => 'canon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'gabtoli' ),
		'id' => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'gabtoli' ),
		'id' => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed', 'gabtoli' ),
		'id' => $prefix . 'licensed',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed Information', 'gabtoli' ),
		'id' => $prefix . 'licensed_information',
		'type' => 'textarea',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'licensed',
	) ) );
	$cmb->add_field( array(
		'name' => __( 'Image', 'gabtoli' ),
		'id' => $prefix . 'image',
		'type' => 'file',
	) );
	$cmb->add_field( array(
		'name' => __( 'Upload Resume', 'gabtoli' ),
		'id' => $prefix . 'resume',
		'type' => 'file',
		'text' => array(
			'add_upload_file_text' => __('Upload PDF File','alpha')
		),
		'query_args' => array(
			'type' => array('application/pdf')
		),
		'options' => array(
			'url' => false
		)
	) );

}


function cmb2_add_pricingtable() {

	$prefix = '_gabtoli_pt_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'gabtoli' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Pricing Table', 'gabtoli' ),
		'id' => $prefix . 'pricing_table',
		'type' => 'group',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Caption', 'gabtoli' ),
		'id' => $prefix . 'pricing_caption',
		'type' => 'text',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Option', 'gabtoli' ),
		'id' => $prefix . 'pricing_option',
		'type' => 'text',
		'repeatable' => true
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Price', 'gabtoli' ),
		'id' => $prefix . 'price',
		'type' => 'text',
	) );

}
add_action( 'cmb2_init', 'cmb2_add_pricingtable' );

/*
 * services
 *
 * */

function gabtoli_add_services_metabox() {

	$prefix = '_gabtoli_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services',
		'title'        => __( 'Services', 'gabtoli' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Service', 'gabtoli' ),
		'id' => $prefix . 'service',
		'type' => 'group',
	) );

	$cmb->add_group_field( $group, array(
		'name' => __( 'Icon', 'gabtoli' ),
		'id' => $prefix . 'icon',
		'type' => 'text',
	) );

	$cmb->add_group_field( $group,  array(
		'name' => __( 'Title', 'gabtoli' ),
		'id' => $prefix . 'title',
		'type' => 'text',
	) );

	$cmb->add_group_field( $group,  array(
		'name' => __( 'Content', 'gabtoli' ),
		'id' => $prefix . 'content',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'gabtoli_add_services_metabox' );
<?php
/**
 * Template Name: Pricing Table
 */
get_header();
?>
    <pre>
	<?php
	$pricing = get_post_meta( get_the_ID(),"_gabtoli_pt_pricing_table",true);
	$services = get_post_meta(get_the_ID(),'_gabtoli_service',true);
	//print_r($pricing);
	print_r($services);
	?>
</pre>
    <div class="container">
        <div class="row">
            <?php
            foreach ($pricing as $ptc):
            ?>
            <div class="col-md-4">
                <h2><?php echo esc_html($ptc['_gabtoli_pt_pricing_caption']) ?></h2>
                <ul>
		            <?php foreach ( $ptc['_gabtoli_pt_pricing_option'] as $pto): ?>
			            <li><?php echo esc_html($pto); ?></li>
		            <?php endforeach; ?>
                </ul>
                <h3><?php echo esc_html($ptc['_gabtoli_pt_price']) ?></h3>
            </div>

            <?php endforeach; ?>
        </div>
        <div class="row mt10">
            <?php
            foreach ($services as $service):
            $gabtoli_service_icon = $service['_gabtoli_icon'];
            ?>
            <div class="col-md-4">
                <i class="<?php echo esc_attr($gabtoli_service_icon); ?>"></i>
                <h2><?php echo esc_html($service['_gabtoli_title']); ?></h2>

                <p><?php echo esc_html($service['_gabtoli_content']); ?></p>
                <?php echo apply_filters('the_content', $service['_gabtoli_content']); ?>
            </div>
            <?php
            endforeach
            ?>
        </div>
    </div>


<?php
get_footer();






















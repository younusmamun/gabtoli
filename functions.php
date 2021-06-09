<?php
//echo 'hello';

require_once get_theme_file_path('/inc/tgm.php');
//require_once get_theme_file_path('/inc/acf-mb.php');
require_once get_theme_file_path('/inc/cmb2-mb.php');

if (  class_exists( 'Attachments' ) ) {
    require_once 'lib/attachments.php';
}

/*
function change_case($text){
	return strtoupper($text);
}
*/
//die(site_url());

if(site_url() == "http://demo.lwhh.com"){
	define("VERSION",time());
}else{
	define("VERSION",wp_get_theme()->get("Version"));
}



function gabtoli_bootstraping(){
	load_theme_textdomain("gabtoli");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
	add_theme_support( 'html5', array( 'search-form' ) );
	$gabtoli_custom_header_details = array(
	        'header-text'           => true,
            'default-text-color'    => '#222',
            'width'                 =>1200,
            'height'                =>600,
            'flex-width'            =>true,
            'flex-height'           =>true,
    );
	add_theme_support("custom-header",$gabtoli_custom_header_details);
	$gabtoli_custom_logo_defaults = array(
	        "width" => '100',
	        "height" => '100',
    );
	add_theme_support("custom-logo",$gabtoli_custom_logo_defaults);
	add_theme_support("custom-background");
	add_theme_support('post-formats',array('audio','video','quote','image'));

	add_image_size('gabtoli-square',400,400,true); // center center
	add_image_size('gabtoli-portrait',401,401,array('left','top'));
	add_image_size('gabtoli-landscape',500,500,array('center','center'));
	add_image_size('gabtoli-landscape-hard-cropped',600,400,array('right','center'));

	// add_image_size('gabtoli-square',400,400,true);
	// add_image_size('gabtoli-portrait',400,9999);
	// add_image_size('gabtoli-landscape',9999,400);
	// add_image_size('gabtoli-landscape-hard-cropped',600,400);

	register_nav_menu("topmenu",__("Top Menu"));
	register_nav_menu("footermenu",__("Footer Menu"));
}
add_action("after_setup_theme","gabtoli_bootstraping");

function gabtoli_assets(){
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style("tys-style","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css");
	wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	wp_enqueue_style("fontawesome","//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css");
	wp_enqueue_style("featherlight-css","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css");
	wp_enqueue_style('alpha-style',get_template_directory_uri().'/assets/css/alpha.css');
	//wp_enqueue_style('alpha-style',get_theme_file_uri('/assets/css/alpha.css'));

	//wp_enqueue_style("gabtoli",get_template_directory_uri().'/style.css',null, VERSION);
	//wp_enqueue_style("gabtoli",get_theme_file_uri('/style.css'),null, VERSION);
	wp_enqueue_style("gabtoli",get_stylesheet_uri(),null, VERSION);

	wp_enqueue_script("tns-js","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.js",null,"0.0.1",true);
	wp_enqueue_script("featherlight-js","//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js",array('jquery'),"0.0.1",true);
	//wp_enqueue_script("gabtoli-main-js",get_template_directory_uri()."/assets/js/main.js",null,"0.0.1",true);
	wp_enqueue_script("gabtoli-main-js",get_theme_file_uri("/assets/js/main.js"),array("jquery","featherlight-js"),VERSION,true);

}
add_action("wp_enqueue_scripts","gabtoli_assets");

function gabtoli_sidebar(){
	register_sidebar(
		array(
			'name'          => __('single post sidebar','gabtoli'),
			'id'            => 'sidebar-1',
			'description'   => __('right sidebar','gabtoli'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',

		)
	);
	register_sidebar(
		array(
			'name'          => __('Footer left widget','gabtoli'),
			'id'            => 'footer_left',
			'description'   => __('Widget area footer left','gabtoli'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',

		)
	);
	register_sidebar(
		array(
			'name'          => __('Footer middle widget','gabtoli'),
			'id'            => 'footer_middle',
			'description'   => __('Widget area footer middle','gabtoli'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',

		)
	);
}
add_action("widgets_init","gabtoli_sidebar");

function gabtoli_the_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	}else{
		echo get_the_password_form();
	}
}
add_filter("the_excerpt","gabtoli_the_excerpt");


function gabtoli_protected_title_change(){
	return "%s";
}
add_filter("protected_title_format","gabtoli_protected_title_change");

function gabtoli_menu_item_class($classes, $item){
	$classes[]="list-inline-item";
	return $classes;
}
add_filter("nav_menu_css_class","gabtoli_menu_item_class",10,2);


if(!function_exists('gabtoli_about_page_template_banner')){
	function gabtoli_about_page_template_banner(){
		if(is_page()) {
			$gabtoli_feat_image = get_the_post_thumbnail_url( null, "large" );
			?>
			<style>
				.page-header {
					background-image: url(<?php echo $gabtoli_feat_image;?>);
				}
			</style>
			<?php
		}
		if(is_front_page()){
			if(current_theme_supports("custom-header")){
				?>
				<style>
					.header{
						background-image:url(<?php echo header_image(); ?>);
						margin-bottom: 50px;
					}
	
					.header h1.heading a, h3.tagline{
						color: #<?php echo get_header_textcolor(); ?> ;
						<?php
						if(!display_header_text()){
							echo "display:none;"; 
						}
						?>
					}
					<?php
						if(!display_header_text()){ ?>
							.header h1.heading{
								border-bottom: none;
							}
						<?php
						}
	
					?>
				</style>
				<?php
			}
		}
	
	}
	add_action("wp_head","gabtoli_about_page_template_banner",11);
}



function gabtoli_body_class($classes){
unset($classes[array_search('first_class',$classes)]);
return $classes;
}
add_filter('body_class','gabtoli_body_class');

function gabtoli_post_class($classes){
	unset($classes[array_search('first_class',$classes)]);
	return $classes;
}
add_filter('post_class','gabtoli_post_class');

function gabtoli_highlight_search_results($text){
	if(is_search()){
		$pattern = '/('.join('|',explode(' ',get_search_query())).')/i';
		$text = preg_replace($pattern,'<span class="search-highlight">\0</span>', $text);
	}
	return $text;
}
add_filter('the_content','gabtoli_highlight_search_results');
add_filter('the_excerpt','gabtoli_highlight_search_results');
add_filter('the_title','gabtoli_highlight_search_results'); 


function gabtoli_image_srcset(){
	return null;
}
add_filter('wp_calculate_image_srcset','gabtoli_image_srcset');

if(!function_exists('gabtoli_today_date')){
	function gabtoli_today_date(){
	echo date('d/m/y');
	}
}

function gabtoli_modify_main_query($wpq){
	if(is_home() && $wpq->is_main_query()){
		
		//$wpq->set('post__not_in',array(181));

		$wpq->set('tag__not_in',array(22));
	}
	
}
add_action('pre_get_posts','gabtoli_modify_main_query');

//add_filter('acf/settings/show_admin','__return_false');

function gabtoli_admin_assets($hook){
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_id'] ) ) {
        $post_id = empty( $_REQUEST['post_id'] ) ? $_REQUEST['post'] : $_REQUEST['post_id'];
		echo $_REQUEST['post'];
		echo $post_id;
    }
    if('post.php' == $hook){
        $post_format = get_post_format($post_id);
	    wp_enqueue_script('admin-js',get_theme_file_uri('/assets/js/admin.js'),array('jquery'),VERSION,true);
	    wp_localize_script('admin-js','gabtoli_pf',array('format'=>$post_format));
    }
}
add_action('admin_enqueue_scripts','gabtoli_admin_assets');



if(!function_exists('sayHello')){
	function sayHello(){
		echo '<br/>';
		echo "hello world";
	}
}

// function sayHello(){
// 	echo '<br/>';
// 	echo "hello world";
// }




























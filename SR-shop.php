<?php 
/*
Plugin Name: SR-Shop
Plugin URI: http://www.BasicPlugin.com
Description: Customise WordPress with powerful, professional and intuitive fields
Version: 4.4.11
Author: Elliot Condon
Author URI: http://www.elliotcondon.com/
License: GPL
Copyright: Elliot Condon
*/

//require 'controller/Database.class.php';
require 'controller/custom_function.php';

require 'view/status.php';
require 'view/option.php';

require 'view/all-product.php';
require 'view/add-product.php';
require 'view/edit-product.php';

require 'view/all-category.php';
require 'view/add-category.php';
require 'view/edit-category.php';

require 'view/all-members.php';
require 'view/add-member.php';
require 'view/edit-member.php';

require 'view/all-comments.php';

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Add Option To Toolbar
** Version 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

function dww_add_google_links() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array(
	    'id' 		=> 'shop',
	    'title' 	=> '<span class="ab-icon"></span><span class="ab-label">'.__( 'SR-Shop', 'some-textdomain' ).'</span>',
	    'href' 		=> '#',
	    'meta' 		=> array(
	    	'class' 		=> 'james-link',
	    	)
		) );
}
add_action('wp_before_admin_bar_render', 'dww_add_google_links');

function visit_shop_modify_admin_bar() {
	global $wp_admin_bar;
	
	$wp_admin_bar->add_menu( array(
		'id' 		=> 'visit_shop',
		'title' 	=> 'Visit Shop',
		'href' 		=> '#',
		'parent' 	=> 'shop'

		) );	
}
add_action( 'admin_bar_menu', 'visit_shop_modify_admin_bar' );

function settings_modify_admin_bar() {
	global $wp_admin_bar;
	
	$wp_admin_bar->add_menu( array(
		'id' 		=> 'settings_shop',
		'title' 	=> 'Settings',
		'href' 		=> '#',
		'parent' 	=> 'shop'

		) );	
}
add_action( 'admin_bar_menu', 'settings_modify_admin_bar' );

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Add Option To Sidebar
** ( POST Type )
** Version 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/* ----||   Status Section ( POST TYPE )   ||---- */
function dwwp_register_post_type_status() {
	$args = array(
		'label' 			 => 'SR-Status',
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-editor-indent',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'rewrite' 			 => array('slug' => 'all-status'),
		'capability_type' 	=> 'post',
			'capabilities' 		=> array(
			'edit_posts' 		=> false,
			'create_posts' 		=> false, 
			),
		);

	register_post_type('status', $args);
}
add_action('init', 'dwwp_register_post_type_status');

/* ----||   Products Section ( POST TYPE )   ||---- */
function dwwp_register_post_type() {
	$args = array(
		'label' 			 => 'SR-Product',
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-cart',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'rewrite' 			 => array('slug' => 'all-product'),
		'capability_type' 	=> 'post',
		'capabilities' 		=> array(
		'edit_posts' 		=> false,
		'create_posts' 		=> false, 
			),
		);

	register_post_type('product', $args);
}
add_action('init', 'dwwp_register_post_type');

/* ----||   Catecory Section ( POST TYPE )   ||---- */
function dwwp_register_post_type_category() {
	$args = array(
		'label' 			 => 'SR-Catecory',
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-category',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'rewrite' 			 => array('slug' => 'categories'),
		'capability_type' 	=> 'post',
		'capabilities' 		=> array(
		'edit_posts' 		=> false,
		'create_posts' 		=> false, 
			),
		);

	register_post_type('category', $args);
}
add_action('init', 'dwwp_register_post_type_category');

/* ----||   Members Section ( POST TYPE )   ||---- */
function dwwp_register_post_type_members() {
	$args = array(
		'label' 			 => 'SR-Members',
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-universal-access',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'rewrite' 			 => array('slug' => 'members'),
		'capability_type' 	=> 'post',
		'capabilities' 		=> array(
		'edit_posts' 		=> false,
		'create_posts' 		=> false, 
			),
		);

	register_post_type('members', $args);
}
add_action('init', 'dwwp_register_post_type_members');

/* ----||   Comments Section ( POST TYPE )   ||---- */
function dwwp_register_post_type_comments() {
	$args = array(
		'label' 			 => 'SR-Comments',
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'menu_icon'			 => 'dashicons-format-chat',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'rewrite' 			 => array('slug' => 'comments-product'),
		'capability_type' 	=> 'post',
		'capabilities' 		=> array(
		'edit_posts' 		=> false,
		'create_posts' 		=> false, 
			),
		);

	register_post_type('comments', $args);
}
add_action('init', 'dwwp_register_post_type_comments');

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Get Style Css File
** Version 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

function ft_get_style_files_plugin() {
	global $pagenow, $typenow;

	wp_enqueue_style('public', plugins_url('/css/public-admin.css', __FILE__));
	wp_enqueue_style('public', plugins_url('/css/shop.css', __FILE__));

	if (isset($_GET['page'])) {

		if ($_GET['page'] == 'add_Product' || $_GET['page'] == 'all_category' || $_GET['page'] == 'all_members' || $_GET['page'] == 'all_comments' || $_GET['page'] == 'status_Product' || $_GET['page'] == 'add_category' || $_GET['page'] == 'add_members' || $_GET['page'] == 'edit_category' || $_GET['page'] == 'edit_members' || $_GET['page'] == 'view_Product' || $typenow == 'product') {

			wp_enqueue_style('bootstrap', plugins_url('/css/bootstrap.css', __FILE__));	
			wp_enqueue_style('style1', plugins_url('/css/style_plugin.css', __FILE__));

			wp_enqueue_script( 'main-js', plugins_url('/js/main-admin.js', __FILE__), array('jquery'), '', true );	
			wp_enqueue_script( 'bootstrap-js', plugins_url('/js/bootstrap.min.js', __FILE__), array('jquery'), '', true );
		}	
	}
}
add_action('admin_enqueue_scripts', 'ft_get_style_files_plugin');

function dwwp_styles_and_scripts_shop() {
	wp_enqueue_style( 'admin-custom-css', get_template_directory_uri() . '/layout/css/shop.css' );
}
add_action( 'wp_enqueue_scripts', 'dwwp_styles_and_scripts_shop' );

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Add New Submenu Page
** For ( Pages Plugin )
** Version 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/* ----||   All Status Page   ||---- */
function dwwp_view_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=status', 
		'Status',
		'Status', 
		'manage_options', 
		'status_Product', 
		'view_status_my_custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_view_status_submenu_bage');

/* ----||   Option Page   ||---- */
function dwwp_option_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=status', 
		'Options',
		'Options', 
		'manage_options', 
		'custom_option_Product', 
		'view_option__callback' );
}
add_action('admin_menu', 'dwwp_option_status_submenu_bage');

/* ----||   All Products Page   ||---- */
function dwwp_view_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=product', 
		'All Products',
		'All Product', 
		'manage_options', 
		'view_Product', 
		'view_product_my_custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_view_submenu_bage');

/* ----||   Add Product Page   ||---- */
function dwwp_add_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=product', 
		'Add Products',
		'Add Products', 
		'manage_options',
		'add_Product', 
		'add_product_my_custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_add_submenu_bage');

/* ----||   Edit Product Page   ||---- */
function dwwp_edit_product_submenu_bage() {

	add_submenu_page(
		null, 
		'Edit Product',
		'Edit Product', 
		'edit_private_posts',
		'edit_Product', 
		'edit_product_my_custom_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_edit_product_submenu_bage');

/* ----||   All Categories Page   ||---- */
function dwwp_category_dash_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=category', 
		'All Categories',
		'All Categories', 
		'manage_options', 
		'all_category', 
		'custom_category_dash_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_category_dash_status_submenu_bage');

/* ----||   Add Categories Page   ||---- */
function dwwp_add_category_dash_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=category', 
		'Add Category',
		'Add Category', 
		'manage_options', 
		'add_category', 
		'custom_add_category_dash_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_add_category_dash_status_submenu_bage');

/* ----||   Edit Categories Page   ||---- */
function dwwp_edit_category_dash_status_submenu_bage() {

	add_submenu_page(
		null, 
		'Edit Category',
		'Edit Category', 
		'manage_options', 
		'edit_category', 
		'custom_edit_category_dash_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_edit_category_dash_status_submenu_bage');

/* ----||   All Members Page   ||---- */
function dwwp_members_all_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=members', 
		'All Members',
		'All Members', 
		'manage_options', 
		'all_members', 
		'custom_members_all_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_members_all_status_submenu_bage');

/* ----||   Add Members Page   ||---- */
function dwwp_members_add_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=members', 
		'Add Member',
		'Add Member', 
		'manage_options', 
		'add_members', 
		'custom_members_add__callback' );
}
add_action('admin_menu', 'dwwp_members_add_status_submenu_bage');

/* ----||   Edit Members Page   ||---- */
function dwwp_members_edit_status_submenu_bage() {

	add_submenu_page(
		null, 
		'Edit Member',
		'Edit Member', 
		'manage_options', 
		'edit_members', 
		'custom_edit_member_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_members_edit_status_submenu_bage');

/* ----||   Comments Products Page   ||---- */
function dwwp_comments_all_status_submenu_bage() {

	add_submenu_page(
		'edit.php?post_type=comments', 
		'All Comments',
		'All Comments', 
		'manage_options', 
		'all_comments', 
		'custom_comments_all_submenu_page_callback' );
}
add_action('admin_menu', 'dwwp_comments_all_status_submenu_bage');

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Creat Shortcode
** Vesion 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

function dwwp_sample_shortcode( $atts, $content = null ) {

	$atts = shortcode_atts( array(
		'title' => 'Default Title',
		'src' 	=> 'www.google.com.eg'
		), $atts );

	return '<h1>' . $atts['title'] . '</h1>';
}
add_shortcode( 'uniqed_name' , 'dwwp_sample_shortcode' );

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Add Swttings Page
** Vesion 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

add_action( 'admin_init', 'dwwp_register_custom_settings' );

function dwwp_register_custom_settings() {
	register_setting( 'shop-settings-group','shop_name' );
	register_setting( 'shop-settings-group','description' );

	add_settings_section( 'main-info-shop', 'Shop Main Options', 'shop_main__options', 'status' );

	add_settings_field( 'shop_name', 'Shop Name', 'costum_setting_shop_name', 'status', 'main-info-shop' );
	add_settings_field( 'shop_description', 'Shop Description', 'costum_setting_shop_description', 'status', 'main-info-shop' );
}

function shop_main__options() {

	echo 'Main Options';
}

function costum_setting_shop_name() {

	$firstName = esc_attr( get_option( 'shop_name' ) );
	echo '<input type="text" name="shop_name" value="' . $firstName . '" />';
}

function costum_setting_shop_description() {

	$description = esc_attr( get_option( 'description' ) );
	echo '<input type="text" name="description" value="' . $description . '" />';
}

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

/*
** Register Widget Top Liked Items
** Vesion 1.0.0
*/

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= */

function ourWidgetsInit_shop() {

	register_sidebar(array(
		'name' 			=> 'Shop Sidebar',
		'id' 			=> 'shop-sidebar',
		'description' 	=> 'This Widget Will Be Show If Plugin Shop Is Avtive',
		'class' 		=> 'shop-sidebar-class',
		'before_widget' => '<div class="custom-sidebar-widget">',
		'after_widget' 	=> "</div>\n",
		'before_title' 	=> '<h4>',
		'after_title' 	=> "</h4>\n",
		));

	register_widget( 'top_items_in_shop' );
}
add_action('widgets_init', 'ourWidgetsInit_shop');




           	/* --|| Top Items In Shop Widget ||-- */          	 
class top_items_in_shop extends WP_Widget {

	public function __construct() {
		parent::__construct('top_items', 'Top Items', array(
				'description' => 'Top Items In Shop',
			));
	}
	/* ---||  Form In Admin Page  ||--- */
	public function form($instace) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id('Title_top'); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id('Title_top'); ?>" 
			value="<?php echo $instace['Title_top'] ?>" 
			name="<?php echo $this->get_field_name('Title_top'); ?>" 
			type="text" 
			class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('Items'); ?>">Count Of Items : </label>
			<input id="<?php echo $this->get_field_id('Items'); ?>" 
			value="<?php echo $instace['Items'] ?>" 
			name="<?php echo $this->get_field_name('Items'); ?>" 
			type="text" 
			class="widefat" />
		</p>		
		<?php
	}

	/* ---||  Template Widget In site  ||--- */
	public function Widget($args, $instace) {

		echo $args['before_widget'];
		echo '<div class="top-items-shop-widget">';

		echo $args['before_title'];
		echo '<i class="icon-thumbs-up"> </i> ' . $instace['Title_top'];
		echo $args['after_title'];

		global $wpdb;
		$getRows = $wpdb->get_results( "SELECT * FROM items ORDER BY Likes DESC LIMIT " . $instace['Items'] . "" );

		?>
		<div id="top_items_widget" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

			<?php $i = 0; ?>

			<!-- Loop All Info For Item -->
			<?php foreach ($getRows as $Row) { ?>

				<?php if ($i == 0) { ?>

				<!-- Add Class Active -->
				<div class="item <?php echo 'active'; ?>">
				<?php }else { ?>
				<div class="item <?php echo ''; ?>">
				<?php } ?>
					<a href="#"><img src="http://placehold.it/300/444" alt="Test"></a>

						<?php if ($Row->i_price != 0 && $Row->i_price != NULL ) { ?>
						<span class="sale"><i class="icon-sale"></i></span>
						<?php } else { echo ''; } ?>

					<div class="info-item">
						<span class="likes"><div class="numberCircle"><?php echo $Row->Likes ?></div><div class="numberCircle"><i class="icon-thumbs-up"></i></div></span>
							<span class="price"><?php echo  '<span class="main-price"><div class="numberCircle"><i class="icon-usd"></i></div>' . $Row->Price . '</span>'; ?>
							<?php if ($Row->i_price != 0 && $Row->i_price != NULL ) { echo "<span class='price-without-disc'> " . $Row->i_price . " </span>"; } else { echo ''; } ?>
						</span>
					</div>
					<div class="carousel-caption">
						<a href="#"><h5><?php echo $Row->Name ?></h5></a>
						<?php if ($Row->i_price != 0 && $Row->i_price != NULL ) { ?>
						<span class='discount-number'>This Item Have Discount <div class='numberCircle'><?php $discount = (($Row->i_price - $Row->Price) * 100) / $Row->i_price; echo floor($discount) . "%"; ?></div></span>
						<?php } else { echo ''; } ?>

						<!-- Get Count Comments -->
						<?php $countComments =  $wpdb->get_results( "SELECT * FROM comments WHERE item_id = " . $Row->Item_ID . "" ); ?>

						<!-- Get Category Name -->
						<?php $db = new Database(); ?>
						<?php $getRows = $db->getRow( "SELECT items.*, categories.Name AS new_name FROM items INNER JOIN categories ON categories.ID = items.Cat_ID WHERE Item_ID = $Row->Item_ID" ); ?>

						<!-- Get Outher Item -->
						<?php $UserItem = $db->getRow( "SELECT items.*, categories.Name AS cate_name, users.Username AS user_name FROM items INNER JOIN categories ON categories.ID = items.Cat_ID INNER JOIN users ON users.UserID = items.Member_ID WHERE Item_ID = $Row->Item_ID" ); ?>

						<p class="decsription"><?php echo $str = substr(filter_var($Row->Full_dis, FILTER_SANITIZE_STRING), 0, 70) . ' ... <a href="#">Read More</a>'; ?></p>
						<p class="info-for-the-post"><span class="bold"><i class="icon-user2"> </i> By : </span> <?php echo $UserItem['user_name'] ?> | <span class="bold"><i class="icon-bubble"> </i> Commments : </span><?php echo count($countComments); ?></p>
						<p class="info-for-the-post"><span class="bold"><i class="icon-stack"> </i> Category : </span> <?php echo $getRows['new_name']; ?> | <span class="bold"><i class="icon-tag"> </i> discount : </span><?php if ($Row->i_price != 0 && $Row->i_price != NULL ) {  echo floor($discount) . "%"; }else{ echo "No"; } ?></p>
					</div>
				</div>

				<?php $i++; ?>

				<?php } ?>

			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#top_items_widget" role="button" data-slide="prev">
				<i class="icon-chevron-left2"></i>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#top_items_widget" role="button" data-slide="next">
				<i class="icon-chevron-right2"></i>
				<span class="sr-only">Next</span>
			</a>

		</div>
		<?php
		echo '</div>';
		echo $args['after_widget'];
	}
}

/*=========  End of Top Items In Shop Widget  ==========*/

 ?>

<?php
//about theme info
add_action( 'admin_menu', 'food_restaurant_elementor_gettingstarted' );
function food_restaurant_elementor_gettingstarted() {
	add_theme_page( esc_html__('Food Restaurant Elementor', 'food-restaurant-elementor'), esc_html__('Food Restaurant Elementor', 'food-restaurant-elementor'), 'edit_theme_options', 'food_restaurant_elementor_about', 'food_restaurant_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function food_restaurant_elementor_admin_theme_style() {
	wp_enqueue_style('food-restaurant-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('food-restaurant-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'food_restaurant_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'FOOD_RESTAURANT_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'FOOD_RESTAURANT_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function food_restaurant_elementor_changelog_screen() {	
	global $wp_filesystem;
	$food_restaurant_elementor_changelog_file = apply_filters( 'food_restaurant_elementor_changelog_file', FOOD_RESTAURANT_ELEMENTOR_CHANGELOG_URL );
	if ( $food_restaurant_elementor_changelog_file && is_readable( $food_restaurant_elementor_changelog_file ) ) {
		WP_Filesystem();
		$food_restaurant_elementor_changelog = $wp_filesystem->get_contents( $food_restaurant_elementor_changelog_file );
		$food_restaurant_elementor_changelog_list = food_restaurant_elementor_parse_changelog( $food_restaurant_elementor_changelog );
		echo wp_kses_post( $food_restaurant_elementor_changelog_list );
	}
}

function food_restaurant_elementor_parse_changelog( $food_restaurant_elementor_content ) {
	$food_restaurant_elementor_content = explode ( '== ', $food_restaurant_elementor_content );
	$food_restaurant_elementor_changelog_isolated = '';
	foreach ( $food_restaurant_elementor_content as $key => $food_restaurant_elementor_value ) {
		if (strpos( $food_restaurant_elementor_value, 'Changelog ==') === 0) {
	    	$food_restaurant_elementor_changelog_isolated = str_replace( 'Changelog ==', '', $food_restaurant_elementor_value );
	    }
	}
	$food_restaurant_elementor_changelog_array = explode( '= ', $food_restaurant_elementor_changelog_isolated );
	unset( $food_restaurant_elementor_changelog_array[0] );
	$food_restaurant_elementor_changelog = '<div class="changelog">';
	foreach ( $food_restaurant_elementor_changelog_array as $food_restaurant_elementor_value) {
		$food_restaurant_elementor_value = preg_replace( '/\n+/', '</span><span>', $food_restaurant_elementor_value );
		$food_restaurant_elementor_value = '<div class="block"><span class="heading">= ' . $food_restaurant_elementor_value . '</span></div><hr>';
		$food_restaurant_elementor_changelog .= str_replace( '<span></span>', '', $food_restaurant_elementor_value );
	}
	$food_restaurant_elementor_changelog .= '</div>';
	return wp_kses_post( $food_restaurant_elementor_changelog );
}

//guidline for about theme
function food_restaurant_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$food_restaurant_elementor_return = add_query_arg( array()) ;
	$food_restaurant_elementor_theme = wp_get_theme( 'food-restaurant-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Food Restaurant Elementor', 'food-restaurant-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'food-restaurant-elementor' ); ?>: <?php echo esc_html($food_restaurant_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="food_restaurant_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'food-restaurant-elementor' ); ?></button>
				<button class="tablinks" onclick="food_restaurant_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'food-restaurant-elementor' ); ?></button>
				<button class="tablinks" onclick="food_restaurant_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'food-restaurant-elementor' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$food_restaurant_elementor_plugin_ins = Food_Restaurant_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$food_restaurant_elementor_actions = $food_restaurant_elementor_plugin_ins->food_restaurant_elementor_recommended_actions;
					?>
					<div class="food-restaurant-elementor-recommended-plugins ">
							<div class="food-restaurant-elementor-action-list">
								<?php if ($food_restaurant_elementor_actions): foreach ($food_restaurant_elementor_actions as $food_restaurant_elementor_key => $food_restaurant_elementor_actionValue): ?>
										<div class="food-restaurant-elementor-action" id="<?php echo esc_attr($food_restaurant_elementor_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($food_restaurant_elementor_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($food_restaurant_elementor_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($food_restaurant_elementor_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'food-restaurant-elementor'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'food-restaurant-elementor'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'food-restaurant-elementor'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'food-restaurant-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'food-restaurant-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'food-restaurant-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'food-restaurant-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'food-restaurant-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'food-restaurant-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'food-restaurant-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'food-restaurant-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'food-restaurant-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'food-restaurant-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'food-restaurant-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'food-restaurant-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'food-restaurant-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','food-restaurant-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','food-restaurant-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','food-restaurant-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','food-restaurant-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php food_restaurant_elementor_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'food-restaurant-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Food Restaurant Elementor WordPress Theme', 'food-restaurant-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'food-restaurant-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'food-restaurant-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'food-restaurant-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'food-restaurant-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'food-restaurant-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'food-restaurant-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'food-restaurant-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'food-restaurant-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'food-restaurant-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'food-restaurant-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'food-restaurant-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( FOOD_RESTAURANT_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'food-restaurant-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'food-restaurant-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>
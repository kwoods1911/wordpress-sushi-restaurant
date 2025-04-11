<?php
if ( ! class_exists( 'Food_Restaurant_Elementor_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Food_Restaurant_Elementor_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Food_Restaurant_Elementor_Plugin_Activation_WPElemento_Importer {

        private static $food_restaurant_elementor_instance;
        public $food_restaurant_elementor_action_count;
        public $food_restaurant_elementor_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$food_restaurant_elementor_instance) ) {
            self::$food_restaurant_elementor_instance = new self();
          }
          return self::$food_restaurant_elementor_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'food_restaurant_elementor_recommended_plugins', array($this, 'food_restaurant_elementor_recommended_elemento_importer_plugins_array') );

            $food_restaurant_elementor_actions                   = $this->food_restaurant_elementor_get_recommended_actions();
            $this->food_restaurant_elementor_action_count        = $food_restaurant_elementor_actions['count'];
            $this->food_restaurant_elementor_recommended_actions = $food_restaurant_elementor_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function food_restaurant_elementor_recommended_elemento_importer_plugins_array($food_restaurant_elementor_plugins){
            $food_restaurant_elementor_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'food-restaurant-elementor'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'food-restaurant-elementor'),               
            );
            return $food_restaurant_elementor_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'food-restaurant-elementor-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('food-restaurant-elementor-plugin-activation-script', 'food_restaurant_elementor_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'food-restaurant-elementor'),
                    'activating' => esc_html__('Activating', 'food-restaurant-elementor'),
                    'error' => esc_html__('Error', 'food-restaurant-elementor'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'food-restaurant-elementor-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function food_restaurant_elementor_get_recommended_actions() {

            $food_restaurant_elementor_act_count  = 0;
            $food_restaurant_elementor_actions_todo = get_option( 'recommending_actions', array());

            $food_restaurant_elementor_plugins = $this->food_restaurant_elementor_get_recommended_plugins();

            if ($food_restaurant_elementor_plugins) {
                foreach ($food_restaurant_elementor_plugins as $food_restaurant_elementor_key => $food_restaurant_elementor_plugin) {
                    $food_restaurant_elementor_action = array();
                    if (!isset($food_restaurant_elementor_plugin['slug'])) {
                        continue;
                    }

                    $food_restaurant_elementor_action['id']   = 'install_' . $food_restaurant_elementor_plugin['slug'];
                    $food_restaurant_elementor_action['desc'] = '';
                    if (isset($food_restaurant_elementor_plugin['desc'])) {
                        $food_restaurant_elementor_action['desc'] = $food_restaurant_elementor_plugin['desc'];
                    }

                    $food_restaurant_elementor_action['name'] = '';
                    if (isset($food_restaurant_elementor_plugin['name'])) {
                        $food_restaurant_elementor_action['title'] = $food_restaurant_elementor_plugin['name'];
                    }

                    $food_restaurant_elementor_link_and_is_done  = $this->food_restaurant_elementor_get_plugin_buttion($food_restaurant_elementor_plugin['slug'], $food_restaurant_elementor_plugin['name'], $food_restaurant_elementor_plugin['function']);
                    $food_restaurant_elementor_action['link']    = $food_restaurant_elementor_link_and_is_done['button'];
                    $food_restaurant_elementor_action['is_done'] = $food_restaurant_elementor_link_and_is_done['done'];
                    if (!$food_restaurant_elementor_action['is_done'] && (!isset($food_restaurant_elementor_actions_todo[$food_restaurant_elementor_action['id']]) || !$food_restaurant_elementor_actions_todo[$food_restaurant_elementor_action['id']])) {
                        $food_restaurant_elementor_act_count++;
                    }
                    $food_restaurant_elementor_recommended_actions[] = $food_restaurant_elementor_action;
                    $food_restaurant_elementor_actions_todo[]        = array('id' => $food_restaurant_elementor_action['id'], 'watch' => true);
                }
                return array('count' => $food_restaurant_elementor_act_count, 'actions' => $food_restaurant_elementor_recommended_actions);
            }

        }

        public function food_restaurant_elementor_get_recommended_plugins() {

            $food_restaurant_elementor_plugins = apply_filters('food_restaurant_elementor_recommended_plugins', array());
            return $food_restaurant_elementor_plugins;
        }

        public function food_restaurant_elementor_get_plugin_buttion($slug, $name, $function) {
                $food_restaurant_elementor_is_done      = false;
                $food_restaurant_elementor_button_html  = '';
                $food_restaurant_elementor_is_installed = $this->is_plugin_installed($slug);
                $food_restaurant_elementor_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $food_restaurant_elementor_is_activeted = (class_exists($function)) ? true : false;
                if (!$food_restaurant_elementor_is_installed) {
                    $food_restaurant_elementor_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $food_restaurant_elementor_plugin_install_url = wp_nonce_url($food_restaurant_elementor_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $food_restaurant_elementor_button_html        = sprintf('<a class="food-restaurant-elementor-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($food_restaurant_elementor_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'food-restaurant-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'food-restaurant-elementor')
                    );
                } elseif ($food_restaurant_elementor_is_installed && !$food_restaurant_elementor_is_activeted) {

                    $food_restaurant_elementor_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($food_restaurant_elementor_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $food_restaurant_elementor_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $food_restaurant_elementor_button_html = sprintf('<a class="food-restaurant-elementor-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($food_restaurant_elementor_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'food-restaurant-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'food-restaurant-elementor')
                    );
                } elseif ($food_restaurant_elementor_is_activeted) {
                    $food_restaurant_elementor_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'food-restaurant-elementor'));
                    $food_restaurant_elementor_is_done     = true;
                }

                return array('done' => $food_restaurant_elementor_is_done, 'button' => $food_restaurant_elementor_button_html);
            }
        public function is_plugin_installed($slug) {
            $food_restaurant_elementor_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $food_restaurant_elementor_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($food_restaurant_elementor_installed_plugins[$food_restaurant_elementor_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $food_restaurant_elementor_keys = array_keys($this->get_installed_plugins());
            foreach ($food_restaurant_elementor_keys as $food_restaurant_elementor_key) {
                if (preg_match('|^' . $slug . '/|', $food_restaurant_elementor_key)) {
                    return $food_restaurant_elementor_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Food_Restaurant_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
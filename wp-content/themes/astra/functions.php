<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.11.13' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.11.6' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-memory-limit-notice.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-elementor-editor-settings.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

/**
 * Enqueue global header and footer styling overrides.
 */
if ( ! function_exists( 'bengpt_uniform_header_footer_assets' ) ) {
        /**
         * Load the custom stylesheet that keeps header and footer styling consistent.
         *
         * @since 1.0.0 bengpt customization.
         */
        function bengpt_uniform_header_footer_assets() {
                wp_enqueue_style(
                        'bengpt-header-footer',
                        ASTRA_THEME_URI . 'assets/css/custom-header-footer.css',
                        array( 'astra-theme-css' ),
                        ASTRA_THEME_VERSION
                );
        }
}
add_action( 'wp_enqueue_scripts', 'bengpt_uniform_header_footer_assets', 20 );

if ( ! function_exists( 'bengpt_build_pages_menu_items' ) ) {
        /**
         * Build a navigation list that contains every published page so menus stay in sync automatically.
         *
         * @param WP_Nav_Menu_Args $context_args The arguments passed to wp_nav_menu().
         *
         * @return string
         */
        function bengpt_build_pages_menu_items( $context_args ) {
                $list_args = array(
                        'title_li'           => '',
                        'echo'               => false,
                        'sort_column'        => 'menu_order,post_title',
                        'link_before'        => '',
                        'link_after'         => '',
                        'depth'              => 0,
                        'bengpt_global_menu' => true,
                );

                if ( class_exists( 'Astra_Walker_Page' ) ) {
                        $list_args['walker'] = new Astra_Walker_Page();
                }

                $current_id = get_queried_object_id();
                if ( $current_id ) {
                        $list_args['current_page'] = $current_id;
                }

                /**
                 * Allow customization of the page query used to build the automatic navigation.
                 *
                 * @param array           $list_args    Arguments passed into wp_list_pages().
                 * @param WP_Nav_Menu_Args $context_args Original nav menu arguments.
                 */
                $list_args = apply_filters( 'bengpt_global_pages_menu_args', $list_args, $context_args );

                $pages_markup = trim( wp_list_pages( $list_args ) );

                if ( '' === $pages_markup ) {
                        return '';
                }

                $include_home = apply_filters( 'bengpt_global_pages_menu_include_home', 'page' !== get_option( 'show_on_front' ), $context_args );
                $home_markup  = '';

                if ( $include_home ) {
                        $home_label = apply_filters( 'bengpt_global_pages_menu_home_label', __( 'Home', 'astra' ), $context_args );

                        $home_classes = array(
                                'menu-item',
                                'menu-item-type-custom',
                                'menu-item-object-custom',
                                'menu-item-home',
                                'page_item',
                                'page-item-home',
                        );

                        if ( is_front_page() && ! is_paged() ) {
                                $home_classes[] = 'current-menu-item';
                                $home_classes[] = 'current_page_item';
                        }

                        $home_markup = sprintf(
                                '<li class="%1$s"><a class="menu-link" href="%2$s">%3$s</a></li>',
                                esc_attr( implode( ' ', array_unique( $home_classes ) ) ),
                                esc_url( home_url( '/' ) ),
                                esc_html( $home_label )
                        );
                }

                return $home_markup . $pages_markup;
        }
}

if ( ! function_exists( 'bengpt_force_all_pages_in_navigation' ) ) {
        /**
         * Replace targeted WordPress menus with an automatically generated list of all pages.
         *
         * @param string          $items Existing menu items markup.
         * @param WP_Nav_Menu_Args $args  Menu arguments.
         *
         * @return string
         */
        function bengpt_force_all_pages_in_navigation( $items, $args ) {
                if ( empty( $args->theme_location ) ) {
                        return $items;
                }

                $target_locations = apply_filters( 'bengpt_global_pages_menu_locations', array( 'primary', 'mobile_menu' ), $args );

                if ( ! in_array( $args->theme_location, $target_locations, true ) ) {
                        return $items;
                }

                // Respect any menu items that have already been assigned to the location.
                if ( '' !== trim( $items ) ) {
                        return $items;
                }

                if ( function_exists( 'has_nav_menu' ) && has_nav_menu( $args->theme_location ) ) {
                        return $items;
                }

                $pages_items = bengpt_build_pages_menu_items( $args );

                if ( '' === $pages_items ) {
                        return $items;
                }

                return $pages_items;
        }
}
add_filter( 'wp_nav_menu_items', 'bengpt_force_all_pages_in_navigation', 20, 2 );

if ( ! function_exists( 'bengpt_mark_pages_as_menu_items' ) ) {
        /**
         * Ensure automatically generated page links inherit menu item styling classes.
         *
         * @param array $css_class    Array of CSS classes to apply to the page menu item.
         * @param WP_Post $page       The current page object.
         * @param int   $depth        Menu depth.
         * @param mixed $args         Arguments passed to wp_list_pages().
         * @param int   $current_page Current page ID.
         *
         * @return array
         */
        function bengpt_mark_pages_as_menu_items( $css_class, $page, $depth, $args, $current_page ) {
                $is_global_menu = false;

                if ( is_array( $args ) && ! empty( $args['bengpt_global_menu'] ) ) {
                        $is_global_menu = true;
                } elseif ( is_object( $args ) && ! empty( $args->bengpt_global_menu ) ) {
                        $is_global_menu = true;
                }

                if ( ! $is_global_menu ) {
                        return $css_class;
                }

                $css_class[] = 'menu-item';
                $css_class[] = 'menu-item-type-page';
                $css_class[] = 'menu-item-object-page';

                return array_values( array_unique( $css_class ) );
        }
}
add_filter( 'page_css_class', 'bengpt_mark_pages_as_menu_items', 10, 5 );

if ( ! function_exists( 'bengpt_force_uniform_page_template' ) ) {
        /**
         * Force every page to load the theme's default page template for visual consistency.
         *
         * @param string $template The path to the template WordPress resolved.
         *
         * @return string
         */
        function bengpt_force_uniform_page_template( $template ) {
                if ( is_page() ) {
                        $default_template = locate_template( 'page.php' );

                        if ( $default_template && $default_template !== $template ) {
                                return $default_template;
                        }
                }

                return $template;
        }
}
add_filter( 'template_include', 'bengpt_force_uniform_page_template', 50 );

if ( ! function_exists( 'bengpt_map_request_to_existing_page' ) ) {
        /**
         * Populate request vars for pretty permalinks when rewrite rules are broken.
         *
         * @param array $query_vars Parsed query vars from WP::parse_request().
         *
         * @return array
         */
        function bengpt_map_request_to_existing_page( $query_vars ) {
                if ( is_admin() ) {
                        return $query_vars;
                }

                foreach ( array( 'page_id', 'pagename', 'name', 'post_type' ) as $protected_key ) {
                        if ( ! empty( $query_vars[ $protected_key ] ) ) {
                                return $query_vars;
                        }
                }

                $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
                $path        = trim( parse_url( $request_uri, PHP_URL_PATH ), '/' );

                if ( '' === $path ) {
                        return $query_vars;
                }

                $home_path = trim( parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );

                if ( '' !== $home_path && 0 === strpos( $path, $home_path ) ) {
                        $path = trim( substr( $path, strlen( $home_path ) ), '/' );
                }

                if ( '' === $path ) {
                        return $query_vars;
                }

                $candidate = get_page_by_path( $path );

                if ( ! $candidate && false !== strpos( $path, '/' ) ) {
                        $candidate = get_page_by_path( basename( $path ) );
                }

                if ( ! $candidate || 'page' !== $candidate->post_type || 'publish' !== $candidate->post_status ) {
                        return $query_vars;
                }

                $query_vars['page_id']  = (int) $candidate->ID;
                $query_vars['pagename'] = get_page_uri( $candidate );

                if ( isset( $query_vars['error'] ) && '404' === $query_vars['error'] ) {
                        unset( $query_vars['error'] );
                }

                return $query_vars;
        }
}
add_filter( 'request', 'bengpt_map_request_to_existing_page', 5 );

if ( ! function_exists( 'bengpt_rescue_page_from_404' ) ) {
        /**
         * Try to resolve pretty permalink 404s by matching the request path to a published page.
         *
         * This helps when the site's rewrite rules fall out of sync so friendly page URLs start
         * returning a 404 even though the page exists.
         *
         * @param bool     $preempt  Whether to short-circuit default 404 handling.
         * @param WP_Query $wp_query The main query instance.
         *
         * @return bool
         */
        function bengpt_rescue_page_from_404( $preempt, $wp_query ) {
                if ( $preempt || is_admin() || ! $wp_query instanceof WP_Query || ! $wp_query->is_main_query() || ! $wp_query->is_404() ) {
                        return $preempt;
                }

                $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
                $path        = trim( parse_url( $request_uri, PHP_URL_PATH ), '/' );

                if ( '' === $path ) {
                        return $preempt;
                }

                $home_path = trim( parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );

                if ( '' !== $home_path && 0 === strpos( $path, $home_path ) ) {
                        $path = trim( substr( $path, strlen( $home_path ) ), '/' );
                }

                if ( '' === $path ) {
                        return $preempt;
                }

                $candidate = get_page_by_path( $path );

                if ( ! $candidate && false !== strpos( $path, '/' ) ) {
                        $candidate = get_page_by_path( basename( $path ) );
                }

                if ( ! $candidate || 'page' !== $candidate->post_type || 'publish' !== $candidate->post_status ) {
                        return $preempt;
                }

                $wp_query->queried_object    = $candidate;
                $wp_query->queried_object_id = (int) $candidate->ID;
                $wp_query->is_page           = true;
                $wp_query->is_singular       = true;
                $wp_query->is_single         = false;
                $wp_query->is_attachment     = false;
                $wp_query->is_404            = false;

                $wp_query->set( 'page_id', (int) $candidate->ID );
                $wp_query->set( 'pagename', get_page_uri( $candidate ) );

                $wp_query->posts         = array( $candidate );
                $wp_query->post          = $candidate;
                $wp_query->found_posts   = 1;
                $wp_query->post_count    = 1;
                $wp_query->max_num_pages = 1;

                status_header( 200 );
                nocache_headers();

                return true;
        }
}
add_filter( 'pre_handle_404', 'bengpt_rescue_page_from_404', 10, 2 );

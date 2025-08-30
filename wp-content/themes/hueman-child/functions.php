<?php
/**
 * Custom functions for the Rozaje Municipality WordPress news portal.
 *
 * @package Rozaje_Municipality
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access.
}

/**
 * Define theme version.
 */
define( 'ROZAJE_THEME_VERSION', '1.0.0' );

/**
 * Load theme textdomain for translations.
 *
 * @since 1.0.0
 */
function rozaje_load_textdomain() {
    load_child_theme_textdomain(
        'rozaje-municipality',
        get_stylesheet_directory() . '/languages'
    );
}
add_action( 'after_setup_theme', 'rozaje_load_textdomain' );

/**
 * Enqueue custom login page styles.
 *
 * @since 1.0.0
 */
function rozaje_enqueue_login_styles() {
    wp_enqueue_style(
        'rozaje-login-style',
        get_stylesheet_directory_uri() . '/custom-login.css',
        [],
        ROZAJE_THEME_VERSION
    );
}
add_action( 'login_enqueue_scripts', 'rozaje_enqueue_login_styles' );

/**
 * Enqueue custom login page scripts.
 *
 * @since 1.0.0
 */
function rozaje_enqueue_login_scripts() {
    wp_enqueue_script(
        'rozaje-login-script',
        get_stylesheet_directory_uri() . '/custom-login.js',
        [],
        ROZAJE_THEME_VERSION,
        true
    );

    wp_localize_script(
        'rozaje-login-script',
        'rozajeLoginData',
        [
            'logoTitle' => esc_js( __( 'Opština Rožaje', 'rozaje-municipality' ) ),
        ]
    );
}
add_action( 'login_enqueue_scripts', 'rozaje_enqueue_login_scripts' );

/**
 * Add heading under login page logo.
 *
 * @since 1.0.0
 * @param string $message Default login message.
 * @return string Custom message.
 */
function rozaje_login_heading( $message ) {
    $heading = sprintf(
        '<h2 style="text-align: center; margin: 10px 0 20px; font-size: 1.5em; color: #333;">%s</h2>',
        esc_html__( 'Dobrodošli na admin panel web aplikacije Opštine Rožaje', 'rozaje-municipality' )
    );
    return $heading . $message;
}
add_filter( 'login_message', 'rozaje_login_heading', 10 );

/**
 * Enqueue parent theme stylesheet.
 *
 * @since 1.0.0
 */
function rozaje_enqueue_parent_styles() {
    wp_enqueue_style(
        'rozaje-parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'rozaje_enqueue_parent_styles', 10 );

/**
 * Customize login page logo URL.
 *
 * @since 1.0.0
 * @return string Home URL.
 */
function rozaje_login_logo_url() {
    return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'rozaje_login_logo_url', 100 );

/**
 * Customize login page logo title text.
 *
 * @since 1.0.0
 * @return string Custom title.
 */
function rozaje_login_logo_headertext() {
    return esc_attr__( 'Opština Rožaje', 'rozaje-municipality' );
}
add_filter( 'login_headertext', 'rozaje_login_logo_headertext', 100 );

/**
 * Remove WordPress logo from admin bar.
 *
 * @since 1.0.0
 */
function rozaje_remove_logo_wp_admin() {
    global $wp_admin_bar;
    if ( is_a( $wp_admin_bar, 'WP_Admin_Bar' ) ) {
        $wp_admin_bar->remove_menu( 'wp-logo' );
    }
}
add_action( 'wp_before_admin_bar_render', 'rozaje_remove_logo_wp_admin', 0 );

/**
 * Enqueue custom admin scripts.
 *
 * @since 1.0.0
 * @param string $hook Current admin page.
 */
function rozaje_enqueue_admin_scripts( $hook ) {
    wp_enqueue_script(
        'rozaje-admin-script',
        get_stylesheet_directory_uri() . '/admin-custom.js',
        [],
        ROZAJE_THEME_VERSION,
        true
    );
}
add_action( 'admin_enqueue_scripts', 'rozaje_enqueue_admin_scripts' );

/**
 * Customize admin footer text.
 *
 * @since 1.0.0
 * @return string Custom footer text.
 */
function rozaje_custom_footer_text() {
    return sprintf(
        '<span id="footer-thankyou">%s</span>',
        esc_html__( 'Developed by Ervin Pepic', 'rozaje-municipality' )
    );
}
add_filter( 'admin_footer_text', 'rozaje_custom_footer_text', 100 );

/**
 * Shortcode to display last edit date of a post.
 *
 * Usage: [edit_date format="F j, Y"]
 *
 * @since 1.0.0
 * @param array $atts Shortcode attributes.
 * @return string Formatted date.
 */
function rozaje_get_last_edit_date_shortcode( $atts ) {
    $atts = shortcode_atts(
        [
            'format' => 'F j, Y',
        ],
        $atts,
        'edit_date'
    );

    $format   = sanitize_text_field( $atts['format'] );
    $post_id  = get_the_ID();

    if ( ! $post_id ) {
        return '';
    }

    $last_edit_timestamp = get_post_modified_time( 'U', false, $post_id );

    if ( ! $last_edit_timestamp ) {
        return '';
    }

    return esc_html( wp_date( $format, $last_edit_timestamp ) );
}
add_shortcode( 'edit_date', 'rozaje_get_last_edit_date_shortcode' );

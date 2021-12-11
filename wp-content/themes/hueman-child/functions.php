<?php
//* code goes here

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


function wpb_login_logo() { ?>
   <style type="text/css">
       #login h1 a, .login h1 a {
           background-image: url(https://www.rozaje.me/wp-content/uploads/2021/11/login-site-logo.svg);
       height:100px;
       width:300px;
       background-size: 300px 100px;
       background-repeat: no-repeat;
       padding-bottom: 10px;
       }
   </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

function wpb_login_logo_url() {
   return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );

function wpb_login_logo_url_title() {
   return 'Opstina Rozaje';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );


function remove_logo_wp_admin() {
   global $wp_admin_bar;
   $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'remove_logo_wp_admin', 0 );

function custom_footer_copyright() {
   echo '<span id="footer-thankyou">Developed by Ervin Pepic </span>';
}
add_filter('admin_footer_text', 'custom_footer_copyright');

#Overwrite files in subdriectories


<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/favicons/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GKK31Y0GRM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GKK31Y0GRM');
</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
//see https://github.com/presscustomizr/hueman/issues/784
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}
?>
<div id="wrapper">
<?php if ( apply_filters( 'hu_skip_link', true ) ) : ?>
  <a class="screen-reader-text skip-link" href="<?php echo apply_filters( 'hu_skip_link_anchor', '#content' ); ?>"><?php esc_html_e( 'Skip to content', 'hueman' ) ?></a>
<?php endif ?>
  <?php do_action('__before_header') ; ?>

  <?php hu_get_template_part('parts/header-main'); ?>

  <?php do_action('__after_header') ; ?>

  <div class="container" id="page">
    <div class="container-inner">
      <?php do_action('__before_main') ; ?>
      <div class="main">
        <div class="main-inner group">
          <?php do_action('__before_content') ; ?>
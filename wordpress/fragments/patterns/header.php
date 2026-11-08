<?php
/**
 * Title: FragMENTS - header
 * Slug: fragments/header
 * Categories: fragments
 * Inserter: no
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!-- wp:html -->
<a class="skip-link" href="#content">Skip to content</a>
<!-- /wp:html --><!-- wp:group {"tagName":"header","className":"site-header","layout":{"type":"default"}} -->
<header class="wp-block-group site-header"><!-- wp:group {"className":"header-inner wrap","layout":{"type":"default"}} -->
<div class="wp-block-group header-inner wrap"><!-- wp:html -->
<a aria-label="FragMENTS home" class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="FragMENTS" height="82" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/project-logo.png' ) ); ?>" width="216"/></a>
<!-- /wp:html --><!-- wp:navigation {"overlayMenu":"mobile","className":"site-nav","layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"Project","url":"<?php echo esc_url( fragments_page_url( 'about' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Research","url":"<?php echo esc_url( fragments_page_url( 'research' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Team","url":"<?php echo esc_url( fragments_page_url( 'team' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Open Science","url":"<?php echo esc_url( fragments_page_url( 'open-science' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Contact","url":"<?php echo esc_url( fragments_page_url( 'contact' ) ); ?>","kind":"custom"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --><!-- wp:group {"className":"funding-strip","layout":{"type":"default"}} -->
<div class="wp-block-group funding-strip">
<!-- wp:group {"className":"wrap funding-inner","layout":{"type":"default"}} -->
<div class="wp-block-group wrap funding-inner">
<!-- wp:group {"className":"funding-copy","layout":{"type":"default"}} -->
<div class="wp-block-group funding-copy">
<!-- wp:paragraph {"className":"funding-label"} -->
<p class="funding-label">Funded by</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"funding-name"} -->
<p class="funding-name">Croatian Science Foundation</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"funding-link"} -->
<p class="funding-link"><a href="https://hrzz.hr/en/">Visit HRZZ <span aria-hidden="true">↗</span></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a aria-label="Croatian Science Foundation (HRZZ) website" class="hrzz-logo" href="https://hrzz.hr/en/"><img alt="Croatian Science Foundation (HRZZ)" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/institution-hrzz-en.png' ) ); ?>"/></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group --></header>
<!-- /wp:group -->
<?php
/**
 * Title: FragMENTS - Footer
 * Slug: fragments/footer
 * Categories: fragments
 * Inserter: no
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!-- wp:group {"className":"site-footer","tagName":"footer","layout":{"type":"default"}} -->
<footer class="wp-block-group site-footer">
<!-- wp:group {"className":"wrap footer-top","layout":{"type":"default"}} -->
<div class="wp-block-group wrap footer-top">
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a aria-label="FragMENTS home" class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="FragMENTS" height="82" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/project-logo.png' ) ); ?>" width="216"/></a></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"footer-institution institution-identity","layout":{"type":"default"}} -->
<div class="wp-block-group footer-institution institution-identity">
<!-- wp:group {"className":"institution-logo-pair","layout":{"type":"default"}} -->
<div class="wp-block-group institution-logo-pair">
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a class="faculty-zagreb" href="https://www.grad.unizg.hr/en"><img alt="University of Zagreb, Faculty of Civil Engineering" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/institution-zagreb-en.png' ) ); ?>"/></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a class="hcpi-link" href="https://gfzg.hcpi.hr/"><img alt="Croatian Centre for Earthquake Engineering (CCEE / HCPI)" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/institution-hcpi-en.png' ) ); ?>"/></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph -->
<p><strong>Croatian Centre for Earthquake Engineering</strong><br/>CCEE / HCPI<br/>Faculty of Civil Engineering, University of Zagreb</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"footer-funding","layout":{"type":"default"}} -->
<div class="wp-block-group footer-funding">
<!-- wp:paragraph {"className":"funding-label"} -->
<p class="funding-label">Funded by</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a aria-label="Croatian Science Foundation (HRZZ) website" class="hrzz-logo" href="https://hrzz.hr/en/"><img alt="Croatian Science Foundation (HRZZ)" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/institution-hrzz-en.png' ) ); ?>"/></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"funding-link"} -->
<p class="funding-link"><a href="https://hrzz.hr/en/">Visit HRZZ <span aria-hidden="true">↗</span></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"wrap footer-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group wrap footer-bottom">
<!-- wp:paragraph -->
<p>FragMENTS · Seismic fragility of historic masonry</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a href="<?php echo esc_url( fragments_page_url( 'contact' ) ); ?>">Contact ↗</a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</footer>
<!-- /wp:group -->

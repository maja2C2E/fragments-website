<?php
/**
 * Title: FragMENTS - Homepage
 * Slug: fragments/home
 * Categories: fragments
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!-- wp:group {"className":"home-page","anchor":"content","tagName":"main","layout":{"type":"default"}} -->
<main class="wp-block-group home-page" id="content">
<!-- wp:group {"className":"photo-hero","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group photo-hero">
<!-- wp:image {"className":"hero-photo","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full hero-photo"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/3d.png' ) ); ?>" alt="3D view of Zagreb buildings from the CCEE damage assessment database."/></figure>
<!-- /wp:image -->
<!-- wp:group {"className":"hero-shade","layout":{"type":"default"}} -->
<div class="wp-block-group hero-shade">

</div>
<!-- /wp:group -->
<!-- wp:group {"className":"wrap hero-content","layout":{"type":"default"}} -->
<div class="wp-block-group wrap hero-content">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">FragMENTS · Earthquake engineering</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"className":"hero-project-title"} -->
<h1 class="wp-block-heading hero-project-title"><span>A Non-Smooth Discrete Element Framework</span> <span>for Seismic Fragility Assessment</span> <span>of Historic Masonry Buildings</span></h1>
<!-- /wp:heading -->
<!-- wp:group {"className":"hero-actions","layout":{"type":"default"}} -->
<div class="wp-block-group hero-actions">
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a class="button-link" href="<?php echo esc_url( fragments_page_url( 'about' ) ); ?>">Discover the project <span aria-hidden="true">↗</span></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"link-row"} -->
<p class="link-row"><a class="button-link" href="<?php echo esc_url( fragments_page_url( 'research' ) ); ?>">Our research <span aria-hidden="true">↗</span></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"photo-credit"} -->
<p class="photo-credit">Source: damage assessment database, CCEE</p>
<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:shortcode -->
[fragments_latest_news]
<!-- /wp:shortcode -->

<!-- wp:group {"className":"home-intro wrap","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group home-intro wrap">
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Research at HCPI / CCEE</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Explore FragMENTS</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"home-context","layout":{"type":"default"}} -->
<div class="wp-block-group home-context">
<!-- wp:paragraph -->
<p>A Croatian Science Foundation project based at the <strong>Croatian Centre for Earthquake Engineering (CCEE / HCPI)</strong>, within the University of Zagreb, Faculty of Civil Engineering. Explore the methods, meet the researchers and access the tools as they become available.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"home-advisory-link"} -->
<p class="home-advisory-link"><a href="<?php echo esc_url( fragments_page_url( 'team' ) . '#international-advisory' ); ?>">Meet the International Advisory Team <span aria-hidden="true">↗</span></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"className":"home-destinations wrap","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group home-destinations wrap">
<!-- wp:html -->
<a class="destination" href="<?php echo esc_url( fragments_page_url( 'research' ) ); ?>"><span class="destination-number">01</span><h3>Research</h3><p>From masonry contacts to seismic fragility.</p><span aria-hidden="true" class="destination-arrow">↗</span></a>
<!-- /wp:html -->
<!-- wp:html -->
<a class="destination" href="<?php echo esc_url( fragments_page_url( 'open-science' ) ); ?>"><span class="destination-number">02</span><h3>Open Science</h3><p>Code, applications, data and publications.</p><span aria-hidden="true" class="destination-arrow">↗</span></a>
<!-- /wp:html -->
<!-- wp:html -->
<a class="destination" href="<?php echo esc_url( fragments_page_url( 'open-science' ) . '#applications' ); ?>"><span class="destination-number">03</span><h3>Applications</h3><p>A dedicated home for future research tools.</p><span aria-hidden="true" class="destination-arrow">↗</span></a>
<!-- /wp:html -->
</section>
<!-- /wp:group -->
</main>
<!-- /wp:group -->

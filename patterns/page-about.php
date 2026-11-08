<?php
/**
 * Title: FragMENTS - about
 * Slug: fragments/page-about
 * Categories: fragments
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!-- wp:group {"anchor":"content","tagName":"main","layout":{"type":"default"}} -->
<main class="wp-block-group" id="content">
<!-- wp:group {"className":"page-intro wrap","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group page-intro wrap">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">The project</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">FragMENTS</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"page-lead"} -->
<p class="page-lead">A Non-Smooth Discrete Element Framework for Seismic Fragility Assessment of Historic Masonry Buildings</p>
<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
<!-- wp:group {"className":"institution-strip","layout":{"type":"default"}} -->
<div class="wp-block-group institution-strip">

<!-- wp:group {"className":"wrap institution-inner","layout":{"type":"default"}} -->
<div class="wp-block-group wrap institution-inner">

<!-- wp:group {"className":"host-affiliation institution-identity","layout":{"type":"default"}} -->
<div class="wp-block-group host-affiliation institution-identity">
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
<p><strong>Croatian Centre for Earthquake Engineering (CCEE / HCPI)</strong><br/>Faculty of Civil Engineering<br/>University of Zagreb</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Croatian Science Foundation<br/><strong>Installation Research Project</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"duration"} -->
<p class="duration"><strong>36</strong><span>months of research<br/>planned project duration</span></p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
<!-- wp:group {"className":"section wrap about","anchor":"about","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group section wrap about" id="about">

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">

<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">About FragMENTS</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Seismic fragility of historic masonry</h2>
<!-- /wp:heading -->

</div>
<!-- /wp:group -->

<!-- wp:group {"className":"about-text","layout":{"type":"default"}} -->
<div class="wp-block-group about-text">
<!-- wp:paragraph {"className":"centre-context"} -->
<p class="centre-context">The project is based at the Croatian Centre for Earthquake Engineering (CCEE / HCPI), a research and professional branch of the University of Zagreb, Faculty of Civil Engineering.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"intro"} -->
<p class="intro">Historic masonry buildings are an integral part of Zagreb’s city centre. Assessing their seismic response requires understanding how cracks form, how parts of walls move and separate, and how these local mechanisms affect the stability of the building as a whole.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>FragMENTS develops and validates a computational framework for assessing the seismic fragility of historic unreinforced solid-brick masonry buildings with flexible timber diaphragms, a typology characteristic of central Zagreb.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The approach is based on <strong>non-smooth contact dynamics (NSCD)</strong>: masonry is represented as assemblies of rigid blocks whose contacts capture sliding, rocking, separation and progressive loss of connectivity. This allows the interaction between in-plane and out-of-plane wall behaviour to be represented explicitly, rather than treated as separate problems.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"official-title","layout":{"type":"default"}} -->
<div class="wp-block-group official-title">
<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Full project title</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>A Non-Smooth Discrete Element Framework for Seismic Fragility Assessment of Historic Masonry Buildings</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</section>
<!-- /wp:group -->
<!-- wp:group {"className":"origins wrap","tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group origins wrap">

<!-- wp:group {"className":"origins-copy","layout":{"type":"default"}} -->
<div class="wp-block-group origins-copy">

<!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Where it started</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"anchor":"origins-heading","level":2} -->
<h2 class="wp-block-heading" id="origins-heading">Research rooted in Zagreb</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The idea for FragMENTS grew out of the <strong>Study on Earthquake Consequence Mitigation — Phase XI</strong>, conducted in 2025 for the City of Zagreb under the leadership of Maja Baniček.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The study linked numerical simulations of local masonry collapse with estimates of debris distribution and the accessibility of evacuation routes in Zagreb's Lower Town. The models and experience gained with LMGC90 raised new research questions.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>FragMENTS addresses these questions through systematic discretisation, calibration and validation, and probabilistic fragility assessment, including buildings with pre-existing damage.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/study-collapse.png' ) ); ?>" alt="Numerical simulation showing local collapse of the upper facade, from the Phase XI study (2025)."/><figcaption class="wp-element-caption">Local facade collapse in a numerical simulation from the Phase XI study (2025), the research that inspired FragMENTS.</figcaption></figure>
<!-- /wp:image -->

</section>
<!-- /wp:group -->
</main>
<!-- /wp:group -->

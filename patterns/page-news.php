<?php
/**
 * Title: FragMENTS - News
 * Slug: fragments/page-news
 * Categories: fragments
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$news_category = fragments_news_category_id();
$news_query = array( 'queryId' => 28, 'query' => array( 'perPage' => 6, 'pages' => 0, 'offset' => 0, 'postType' => 'post', 'order' => 'desc', 'orderBy' => 'date', 'inherit' => false, 'taxQuery' => array( 'category' => array( $news_category ?: -1 ) ) ), 'className' => 'news-list' );
?>
<!-- wp:group {"tagName":"main","anchor":"content","layout":{"type":"default"}} -->
<main class="wp-block-group" id="content">
<!-- wp:group {"tagName":"section","className":"page-intro wrap","layout":{"type":"default"}} -->
<section class="wp-block-group page-intro wrap">
<!-- wp:paragraph {"className":"eyebrow"} --><p class="eyebrow">News</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":1} --><h1 class="wp-block-heading">From the project.</h1><!-- /wp:heading -->
<!-- wp:paragraph {"className":"page-lead"} --><p class="page-lead">Updates from FragMENTS: research activities, events, publications and collaborations.</p><!-- /wp:paragraph -->
</section><!-- /wp:group -->
<!-- wp:group {"tagName":"section","className":"wrap section news-section","layout":{"type":"default"}} -->
<section class="wp-block-group wrap section news-section">
<!-- wp:query <?php echo wp_json_encode( $news_query ); ?> -->
<div class="wp-block-query news-list">
<!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
<!-- wp:post-date {"format":"j F Y"} /-->
<!-- wp:post-title {"isLink":true,"level":2} /-->
<!-- wp:post-excerpt {"moreText":"Read more","excerptLength":35} /-->
<!-- /wp:post-template -->
<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous {"label":"Newer posts"} /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next {"label":"Older posts"} /-->
<!-- /wp:query-pagination -->
<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"news-empty"} --><p class="news-empty">Project updates will be published here as the work progresses.</p><!-- /wp:paragraph -->
<!-- /wp:query-no-results -->
</div><!-- /wp:query -->
</section><!-- /wp:group -->
</main><!-- /wp:group -->

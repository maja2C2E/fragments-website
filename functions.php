<?php
/** Theme setup. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
function fragments_setup() {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'fragments_setup' );
function fragments_styles() {
    wp_enqueue_style( 'fragments', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'fragments_styles' );
/** Project wall mark, unless the administrator has selected a custom Site Icon. */
function fragments_wall_site_icon() {
    if ( ! has_site_icon() ) {
        echo '<link rel="icon" type="image/png" href="' . esc_url( get_theme_file_uri( '/assets/images/favicon-wall.png' ) ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'fragments_wall_site_icon' );
function fragments_patterns() {
    register_block_pattern_category( 'fragments', array( 'label' => __( 'FragMENTS', 'fragments' ) ) );
}
add_action( 'init', 'fragments_patterns' );

/** Resolve real page URLs, including WordPress installations with plain permalinks. */
function fragments_page_url( $slug ) {
    $page = get_page_by_path( $slug );
    return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}
function fragments_project_pages() {
    return array( 'about' => 'Project', 'research' => 'Research', 'team' => 'Team',
        'open-science' => 'Open Science', 'news' => 'News', 'contact' => 'Contact' );
}
/** Create missing pages only. A two-pass setup resolves all navigation URLs. */
function fragments_create_pages() {
    $created = array();
    $errors = array();
    foreach ( fragments_project_pages() as $slug => $title ) {
        if ( get_page_by_path( $slug ) ) { continue; }
        $id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish',
            'post_title' => $title, 'post_name' => $slug ), true );
        if ( is_wp_error( $id ) ) { $errors[] = $title; continue; }
        $created[ $slug ] = $id;
    }
    foreach ( $created as $slug => $id ) {
        ob_start();
        include get_theme_file_path( '/patterns/page-' . $slug . '.php' );
        $content = ob_get_clean();
        $result = wp_update_post( array( 'ID' => $id, 'post_content' => wp_slash( $content ) ), true );
        if ( is_wp_error( $result ) ) { $errors[] = $slug; }
    }
    update_option( 'fragments_setup_errors', $errors );
}
add_action( 'after_switch_theme', 'fragments_create_pages' );

/** Existing installations can add missing pages without switching themes. */
function fragments_setup_menu() {
    add_theme_page( 'FragMENTS setup', 'FragMENTS setup', 'edit_theme_options', 'fragments-setup', 'fragments_setup_screen' );
}
add_action( 'admin_menu', 'fragments_setup_menu' );
function fragments_setup_screen() {
    if ( ! current_user_can( 'edit_theme_options' ) ) { return; }
    echo '<div class="wrap"><h1>FragMENTS website setup</h1><p>Add the project subpages. Existing pages and their content are preserved.</p>';
    $errors = get_option( 'fragments_setup_errors', array() );
    if ( $errors ) { echo '<p>Some pages could not be created: ' . esc_html( implode( ', ', $errors ) ) . '.</p>'; }
    echo '<ul>';
    foreach ( fragments_project_pages() as $slug => $title ) {
        $page = get_page_by_path( $slug );
        echo '<li>' . esc_html( $title ) . ': ';
        if ( $page ) { echo '<a href="' . esc_url( get_edit_post_link( $page->ID ) ) . '">Edit existing page</a>'; }
        else { echo 'Not created'; }
        echo '</li>';
    }
    echo '</ul><form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
    wp_nonce_field( 'fragments_create_pages' );
    echo '<input type="hidden" name="action" value="fragments_create_pages">';
    submit_button( 'Create missing pages' );
    echo '</form><p>To refresh an existing page, edit it and insert the corresponding FragMENTS page pattern. This is a manual choice; setup never replaces your text.</p></div>';
}
function fragments_setup_action() {
    if ( ! current_user_can( 'edit_theme_options' ) ) { wp_die( 'Not allowed.' ); }
    check_admin_referer( 'fragments_create_pages' );
    fragments_create_pages();
    wp_safe_redirect( admin_url( 'themes.php?page=fragments-setup' ) );
    exit;
}
add_action( 'admin_post_fragments_create_pages', 'fragments_setup_action' );

/** Preserve previous application links after merging the resource pages. */
function fragments_redirect_applications() {
    if ( is_page( 'applications' ) ) {
        wp_safe_redirect( fragments_page_url( 'open-science' ) . '#applications', 302 );
        exit;
    }
}
add_action( 'template_redirect', 'fragments_redirect_applications' );

/** Omit the retired section from pages saved before the pattern update. */
function fragments_remove_retired_principles( $content, $block ) {
    $classes = preg_split( '/\s+/', $block['attrs']['className'] ?? '' );
    if ( is_page( 'open-science' ) && in_array( 'open-principles', $classes, true ) ) {
        return '';
    }
    return $content;
}
add_filter( 'render_block_core/group', 'fragments_remove_retired_principles', 10, 2 );

/** Update the approved introduction on previously saved Project pages. */
function fragments_seismic_intro( $content ) {
    if ( is_page( 'about' ) ) { $content = str_replace( "Historic masonry buildings are an integral part of Zagreb’s city centre. Assessing their seismic response requires understanding how cracks form, how parts of walls move and separate, and how these local mechanisms affect the stability of the building as a whole.", "Historic masonry buildings are an integral part of Zagreb’s city centre. Assessing their seismic response requires understanding how cracks develop, how walls interact, and how local failure mechanisms affect the stability of the building as a whole.", $content ); }
    if ( is_page( 'about' ) ) {
        return str_replace( "Historic masonry is a defining part of Zagreb's downtown — and one of the hardest structural types to assess. Damage develops through contact: blocks separating, sliding and rocking against each other, not through smooth, continuous deformation.", "Historic masonry buildings are an integral part of Zagreb’s city centre. Assessing their seismic response requires understanding how cracks develop, how walls interact, and how local failure mechanisms affect the stability of the building as a whole.", $content );
    }
    return $content;
}
add_filter( 'render_block_core/paragraph', 'fragments_seismic_intro' );

/** Remove the retired full-size collage link from previously saved Research pages. */
function fragments_remove_collage_download( $content ) {
    if ( is_page( 'research' ) && strpos( $content, 'Explore the photographs at full size' ) !== false ) {
        return '';
    }
    return $content;
}
add_filter( 'render_block_core/paragraph', 'fragments_remove_collage_download' );

/** Create the dedicated news category without mixing in default blog posts. */
function fragments_news_category_id() {
    $term = get_term_by( 'slug', 'fragments-news', 'category' );
    if ( $term ) { return (int) $term->term_id; }
    $result = wp_insert_term( 'FragMENTS News', 'category', array( 'slug' => 'fragments-news' ) );
    return is_wp_error( $result ) ? 0 : (int) $result['term_id'];
}
/** Theme updates do not fire after_switch_theme; add only the missing News page. */
function fragments_install_news_page() {
    if ( ! current_user_can( 'edit_theme_options' ) || get_option( 'fragments_news_installed' ) ) { return; }
    if ( ! fragments_news_category_id() ) { return; }
    if ( ! get_page_by_path( 'news' ) ) {
        ob_start();
        include get_theme_file_path( '/patterns/page-news.php' );
        $content = ob_get_clean();
        $id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_name' => 'news', 'post_title' => 'News', 'post_content' => wp_slash( $content ) ), true );
        if ( is_wp_error( $id ) || ! $id ) { return; }
    }
    update_option( 'fragments_news_installed', 1 );
}
add_action( 'admin_init', 'fragments_install_news_page' );
/** Include News in previously saved theme navigation, without duplicate links. */
function fragments_news_navigation( $block ) {
    if ( 'core/navigation' !== $block['blockName'] || strpos( $block['attrs']['className'] ?? '', 'site-nav' ) === false ) { return $block; }
    // Referenced custom menus remain under the editor's control.
    if ( ! empty( $block['attrs']['ref'] ) ) { return $block; }
    foreach ( $block['innerBlocks'] as $child ) {
        if ( strtolower( $child['attrs']['label'] ?? '' ) === 'news' ) { return $block; }
    }
    $item = array( 'blockName' => 'core/navigation-link', 'attrs' => array( 'label' => 'News', 'url' => fragments_page_url( 'news' ), 'kind' => 'custom' ), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() );
    $block['innerBlocks'][] = $item;
    $block['innerContent'][] = null;
    return $block;
}
add_filter( 'render_block_data', 'fragments_news_navigation' );

/** Display the confirmed project dates on existing saved Project pages. */
function fragments_project_dates( $content, $block ) {
    $classes = preg_split( '/\s+/', $block['attrs']['className'] ?? '' );
    if ( is_page( 'about' ) && in_array( 'duration', $classes, true ) ) {
        return str_replace( 'planned project duration', '1 October 2026 –<br/>30 September 2029', $content );
    }
    return $content;
}
add_filter( 'render_block_core/paragraph', 'fragments_project_dates', 10, 2 );

/** Publish the supplied workshop announcement once; preserve subsequent editorial changes. */
function fragments_install_lmgc90_workshop() {
    if ( ! current_user_can( 'publish_posts' ) || get_option( 'fragments_lmgc90_workshop_installed' ) ) { return; }
    $existing = get_page_by_path( 'lmgc90-workshop-zagreb-2026', OBJECT, 'post' );
    if ( $existing ) {
        update_option( 'fragments_lmgc90_workshop_installed', (int) $existing->ID );
        return;
    }
    $category = fragments_news_category_id();
    if ( ! $category ) { return; }
    ob_start();
    include get_theme_file_path( '/patterns/workshop-lmgc90.php' );
    $content = ob_get_clean();
    $id = wp_insert_post( array(
        'post_type' => 'post', 'post_status' => 'publish',
        'post_name' => 'lmgc90-workshop-zagreb-2026',
        'post_title' => 'LMGC90 Workshop: Modelling masonry structures',
        'post_excerpt' => 'Join Frédéric Dubois in Zagreb on 2–4 December 2026 for three days of theory and guided practice in LMGC90, with a focus on contact mechanics and masonry modelling.',
        'post_content' => wp_slash( $content ),
        'post_category' => array( $category ),
        'comment_status' => 'closed', 'ping_status' => 'closed'
    ), true );
    if ( ! is_wp_error( $id ) && $id ) { update_option( 'fragments_lmgc90_workshop_installed', (int) $id ); }
}
add_action( 'admin_init', 'fragments_install_lmgc90_workshop', 20 );

/** Resolve the workshop post using this installation's permalink structure. */
function fragments_workshop_url() {
    $post = get_page_by_path( 'lmgc90-workshop-zagreb-2026', OBJECT, 'post' );
    return $post ? get_permalink( $post->ID ) : add_query_arg( 'name', 'lmgc90-workshop-zagreb-2026', home_url( '/' ) );
}
/** Add the training directory once, preserving existing Open Science content. */
function fragments_install_training_section() {
    if ( ! current_user_can( 'edit_pages' ) || get_option( 'fragments_training_added' ) ) { return; }
    $page = get_page_by_path( 'open-science' );
    if ( ! $page || ! current_user_can( 'edit_post', $page->ID ) ) { return; }
    if ( strpos( $page->post_content, 'id="training"' ) !== false ) {
        update_option( 'fragments_training_added', 1 );
        return;
    }
    ob_start();
    include get_theme_file_path( '/patterns/training.php' );
    $addition = ob_get_clean();
    $content = $page->post_content;
    $position = strrpos( $content, '</main>' );
    $content = false === $position ? $content . $addition : substr_replace( $content, $addition, $position, 0 );
    $result = wp_update_post( array( 'ID' => $page->ID, 'post_content' => wp_slash( $content ) ), true );
    if ( ! is_wp_error( $result ) && $result ) { update_option( 'fragments_training_added', 1 ); }
}
add_action( 'admin_init', 'fragments_install_training_section', 30 );

/** Add section illustrations to previously saved Open Science pages. */
function fragments_open_science_visuals( $content, $block ) {
    if ( ! is_page( 'open-science' ) || strpos( $content, 'open-visual' ) !== false ) { return $content; }
    $anchor = $block['attrs']['anchor'] ?? '';
    $visuals = array(
        'repositories' => array( 'workflow-parametric.svg', 'Parameters leading to a masonry block model', 'Scripts & workflows · From parameters to models' ),
        'applications' => array( 'workflow-model.png', 'Three-dimensional masonry building model', 'Research tools · Models and engineering applications' ),
        'resources' => array( 'workflow-fragility.svg', 'Schematic fragility curves, not project results', 'Sharing results · Data, publications and reproducible analysis' ),
        'training' => array( 'lmgc90-workshop-flyer.png', 'LMGC90 workshop flyer, Zagreb, 2–4 December 2026', 'Training & dissemination · LMGC90 workshop' ),
    );
    if ( ! isset( $visuals[$anchor] ) ) { return $content; }
    list( $file, $alt, $caption ) = $visuals[$anchor];
    $figure = '<figure class="wp-block-image open-visual open-visual-' . esc_attr( $anchor ) . '"><img src="' . esc_url( get_theme_file_uri( '/assets/images/' . $file ) ) . '" alt="' . esc_attr( $alt ) . '" loading="lazy" decoding="async"/><figcaption>' . esc_html( $caption ) . '</figcaption></figure>';
    $position = strpos( $content, '</div>' );
    return false === $position ? $content : substr_replace( $content, $figure, $position, 0 );
}
add_filter( 'render_block_core/group', 'fragments_open_science_visuals', 10, 2 );

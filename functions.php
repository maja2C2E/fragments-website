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
        'open-science' => 'Open Science', 'contact' => 'Contact' );
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

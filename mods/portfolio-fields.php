<?php

add_action( 'cmb2_admin_init', 'rs_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function rs_register_repeatable_group_field_metabox() {

    /**
     * Tevhnology stack
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => 'project_tech',
        'title'        => esc_html__( 'Technology Stack', 'cmb2' ),
        'object_types' => array( 'projects' ),
    ) );

    $group_field_id = $cmb_group->add_field( array(
        'id'          => 'tech',
        'type'        => 'group',
        'description' => esc_html__( 'Technology used in the project.', 'cmb2' ),
        'options'     => array(
            'group_title'    => esc_html__( 'Tech {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'     => esc_html__( 'Add Tech', 'cmb2' ),
            'remove_button'  => esc_html__( 'Remove Tech', 'cmb2' ),
            'sortable'       => true,
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Tech Used', 'cmb2' ),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );


}
add_action( 'cmb2_admin_init', 'rs_register_url_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function rs_register_url_field_metabox() {

    /**
     * Tevhnology stack
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => 'rs_url_metabox',
        'title'        => esc_html__( 'Project urls', 'cmb2' ),
        'object_types' => array( 'projects' ),
    ) );

    // $group_field_id is the field id string, so in this case: 'rs_group_demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => 'project_urls',
        'type'        => 'group',
        'description' => esc_html__( 'Project urls.', 'cmb2' ),
        'options'     => array(
            'group_title'    => esc_html__( 'Url {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'     => esc_html__( 'Add url', 'cmb2' ),
            'remove_button'  => esc_html__( 'Remove url', 'cmb2' ),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name'       => esc_html__( 'Url', 'cmb2' ),
        'id'         => 'url',
        'type'       => 'text'
    ) );

    $cmb_group->add_group_field($group_field_id, array(
        'name'    => esc_html__( 'Media Type', 'cmb2' ),
        'desc'    => esc_html__( 'Social media type', 'cmb2' ),
        'id'      => 'media_type',
        'type'    => 'radio',
        'options' => array(
            'website' => esc_html__( 'Website', 'cmb2' ),
            'github' => esc_html__( 'Github', 'cmb2' ),
        ),
    ) );



}

add_action( 'cmb2_admin_init', 'rs_register_theme_options_metabox' );
function rs_register_theme_options_metabox() {

    /**
     * Registers options page menu item and form.
     */
    $cmb_options = new_cmb2_box( array(
        'id'           => 'rs_theme_options_page',
        'title'        => esc_html__( 'Theme Options', 'cmb2' ),
        'object_types' => array( 'options-page' ),
        'option_key'      => 'rs_theme_options', // The option key and admin menu page slug.
        'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
        'autoload'                => false
    ) );

    /**
     * Options fields ids only need
     * to be unique within this box.
     * Prefix is not needed.
     */
    $cmb_options->add_field( array(
        'name'    => esc_html__( 'Name', 'cmb2' ),
        'desc'    => esc_html__( 'Portfolio author name', 'cmb2' ),
        'id'      => 'name',
        'type'    => 'text'
    ) );


    $cmb_options->add_field(  array(
        'name'       => esc_html__( 'Position en charge', 'cmb2' ),
        'id'         => 'position',
        'type'       => 'text',
    ) );

    $cmb_options->add_field(  array(
        'name'       => esc_html__( 'Twitter', 'cmb2' ),
        'id'         => 'twitter',
        'type'       => 'text',
    ) );


    $cmb_options->add_field(  array(
        'name'       => esc_html__( 'Github', 'cmb2' ),
        'id'         => 'github',
        'type'       => 'text'
    ) );


    $cmb_options->add_field(  array(
        'name'       => esc_html__( 'Linkedin', 'cmb2' ),
        'id'         => 'linkedin',
        'type'       => 'text'
    ) );




}

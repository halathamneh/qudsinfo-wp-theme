<?php
// Set Panel ID
$panel_id = 'illdy_panel_services';

// Set prefix
$prefix = 'qi-theme';

/***********************************************/
/****************** SERVICES  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 105,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Services', 'qi-theme' ),
        'description'       => __( 'Control various options for services section from front page.', 'qi-theme' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_services_general' ,
    array(
        'title'     => __( 'General', 'qi-theme' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_services_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_services_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'qi-theme' ),
        'section'   => $prefix . '_services_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_services_general_title',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'Services', 'qi-theme' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_title',
    array(
        'label'         => __( 'Title', 'qi-theme' ),
        'description'   => __( 'Add the title for this section.', 'qi-theme'),
        'section'       => $prefix . '_services_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_services_general_entry',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'qi-theme' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_services_general_entry',
    array(
        'label'         => __( 'Entry', 'qi-theme' ),
        'description'   => __( 'Add the content for this section.', 'qi-theme'),
        'section'       => $prefix . '_services_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);
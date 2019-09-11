<?php
// Set Panel ID
$panel_id = 'illdy_panel_counter';

// Set prefix
$prefix = 'qi-theme';

/***********************************************/
/******************* COUNTER  ******************/
/***********************************************/
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 107,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Counter', 'qi-theme' ),
        'description'       => __( 'Control various options for counter section from front page.', 'qi-theme' ),
    )
);

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_counter_general' ,
    array(
        'title'     => __( 'General', 'qi-theme' ),
        'panel'     => $panel_id,
        'priority'  => 1
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_counter_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_counter_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'qi-theme' ),
        'section'   => $prefix . '_counter_general',
        'priority'  => 1
    )
);

/***********************************************/
/**************** Background *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_counter_background' ,
    array(
        'title'     => __( 'Background', 'qi-theme' ),
        'panel'     => $panel_id,
        'priority'  => 2
    )
);

// Type of Background
$wp_customize->add_setting( $prefix . '_counter_background_type', array(
    'default'           => 'image',
    'sanitize_callback' => 'illdy_sanitize_radio_buttons',
    'transport'         => 'postMessage'
) );
$wp_customize->add_control( $prefix . '_counter_background_type', array(
    'label'     => __( 'Type of Background', 'qi-theme' ),
    'section'   => $prefix .'_counter_background',
    'settings'  => $prefix . '_counter_background_type',
    'type'      => 'radio',
    'choices'   => array(
        'image'     => __( 'Image', 'qi-theme' ),
        'color'     => __( 'Color', 'qi-theme' )
    ),
    'priority'  => 1
) );

// Image
$wp_customize->add_setting(
    $prefix . '_counter_background_image',
    array(
        'sanitize_callback' => 'esc_url_raw',
        'default'           => esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize, $prefix . '_counter_background_image',
        array(
            'label'     => __( 'Image', 'qi-theme' ),
            'section'   => $prefix .'_counter_background',
            'settings'  => $prefix . '_counter_background_image',
            'priority'  => 2
        )
    )
);

// Color
$wp_customize->add_setting(
    $prefix . '_counter_background_color',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#000000',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    $prefix . '_counter_background_color',
    array(
        'label'     => __( 'Color', 'qi-theme' ),
        'section'   => $prefix .'_counter_background',
        'settings'  => $prefix . '_counter_background_color',
        'priority'  => 3
    ) ) 
);
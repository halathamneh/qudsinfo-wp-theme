<?php
// Set Panel ID
$panel_id = 'illdy_panel_latest_info';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/*************** LATEST INFO ******************/
/***********************************************/
/*
$wp_customize->add_panel( $panel_id,
    array(
        'priority'          => 101,
        'capability'        => 'edit_theme_options',
        'theme_supports'    => '',
        'title'             => __( 'Latest News', 'illdy' ),
        'description'       => __( 'Control various options for latest news section from front page.', 'illdy' ),
    )
);
*/

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_latest_info_general' ,
    array(
        'title'         => __( 'Latest Info', 'illdy' ),
        'description'   => __( 'Control various options for latest info section from front page.', 'illdy' ),
        'priority'      => 106
        // 'title'       => __( 'General', 'illdy' ),
        // 'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_latest_info_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_latest_info_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_latest_info_general',
        'priority'  => 1
    )
);

// Title
$wp_customize->add_setting( $prefix .'_latest_info_general_title',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'Latest Info', 'illdy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_info_general_title',
    array(
        'label'         => __( 'Title', 'illdy' ),
        'description'   => __( 'Add the title for this section.', 'illdy'),
        'section'       => $prefix . '_latest_info_general',
        'priority'      => 2
    )
);

// Entry
$wp_customize->add_setting( $prefix .'_latest_info_general_entry',
    array(
        'sanitize_callback' => 'illdy_sanitize_html',
        'default'           => __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You’ve got nothing to loose!', 'illdy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_info_general_entry',
    array(
        'label'         => __( 'Entry', 'illdy' ),
        'description'   => __( 'Add the content for this section.', 'illdy'),
        'section'       => $prefix . '_latest_info_general',
        'priority'      => 3,
        'type'          => 'textarea'
    )
);

// Button Text
$wp_customize->add_setting( $prefix .'_latest_info_button_text',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => __( 'See blog', 'illdy' ),
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix .'_latest_info_button_text',
    array(
        'label'         => __( 'Button Text', 'illdy' ),
        'description'   => __( 'Add the button text for this section.', 'illdy'),
        'section'       => $prefix . '_latest_info_general',
        'priority'      => 4
    )
);

// Button URL
$wp_customize->add_setting( 'illdy_latest_info_button_url',
    array(
        'sanitize_callback'  => 'esc_url',
        'default'            => esc_url( '#' ),
        'transport'          => 'postMessage'
    )
);
$wp_customize->add_control( 'illdy_latest_info_button_url',
    array(
        'label'          => __( 'Button Text', 'illdy' ),
        'description'    => __( 'Add the button URL for this section.', 'illdy'),
        'section'        => $prefix . '_latest_info_general',
        'settings'       => 'illdy_latest_info_button_url',
        'priority'       => 5
    )
);

// Number of posts
$wp_customize->add_setting( $prefix .'_latest_info_number_of_posts',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 3,
    )
);
$wp_customize->add_control(
    $prefix .'_latest_info_number_of_posts',
    array(
        'label'         => __( 'Number of posts', 'illdy' ),
        'description'   => __( 'Add the number of posts to show in this section.', 'illdy'),
        'section'       => $prefix . '_latest_info_general',
        'priority'      => 5
    )
);
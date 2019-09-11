<?php
/***********************************************/
/*************** Sections Order  ***************/
/***********************************************/
$wp_customize->add_section( $prefix.'_general_sections_order' ,
    array(
        'title'       => __( 'Sections Order', 'qi-theme' ),
        'priority'    => 101
    )
);

// First section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_first_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 1
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_first_section',
    array(
        'label'         => __( 'First section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the first section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Second section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_second_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 2
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_second_section',
    array(
        'label'         => __( 'Second section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the second section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' )
        )
    )
);

// Third section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_third_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 3
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_third_section',
    array(
        'label'         => __( 'Third section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the third section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Fourth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 4
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fourth_section',
    array(
        'label'         => __( 'Fourth section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the fourth section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Fifth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 5
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_fifth_section',
    array(
        'label'         => __( 'Fifth section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the fifth section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Sixth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 6
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_sixth_section',
    array(
        'label'         => __( 'Sixth section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the sixth section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Seventh section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 7
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_seventh_section',
    array(
        'label'         => __( 'Seventh section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the seventh section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);

// Eighth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 9
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_eighth_section',
    array(
        'label'         => __( 'Eighth section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the eighth section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);


// Eighth section
$wp_customize->add_setting(
    $prefix . '_general_sections_order_ninth_section',
    array(
        'sanitize_callback' => 'illdy_sanitize_select',
        'default'           => 8
    )
);
$wp_customize->add_control(
    $prefix . '_general_sections_order_ninth_section',
    array(
        'label'         => __( 'Ninth section', 'qi-theme' ),
        'description'   => __( 'Please select what you want to display on the ninth section from front page.', 'qi-theme' ),
        'type'          => 'select',
        'section'       => $prefix . '_general_sections_order',
        'choices'       => array(
            1   => __( 'About', 'qi-theme' ),
            2   => __( 'Projects', 'qi-theme' ),
            3   => __( 'Testimonials', 'qi-theme' ),
            4   => __( 'Services', 'qi-theme' ),
            5   => __( 'Latest News', 'qi-theme' ),
            6   => __( 'Counter', 'qi-theme' ),
            7   => __( 'Team', 'qi-theme' ),
            8   => __( 'Contact us', 'qi-theme' ),
            9   => __( 'Latest Info', 'qi-theme' ),
            10   => __( 'Lectures', 'qi-theme' ),
        )
    )
);
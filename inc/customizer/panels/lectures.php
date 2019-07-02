<?php
// Set Panel ID
$panel_id = 'illdy_panel_latest_info';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/*************** Lectures ******************/
/***********************************************/


/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_lectures_general' ,
    array(
        'title'         => __( 'Lectures', 'illdy' ),
        'description'   => __( 'Control various options for Lectures section from front page.', 'illdy' ),
        'priority'      => 106
        // 'title'       => __( 'General', 'illdy' ),
        // 'panel' 	  => $panel_id
    )
);

// Show this section
$wp_customize->add_setting( $prefix . '_lectures_general_show',
    array(
        'sanitize_callback' => $prefix . '_sanitize_checkbox',
        'default'           => 1,
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    $prefix . '_lectures_general_show',
    array(
        'type'      => 'checkbox',
        'label'     => __( 'Show this section?', 'illdy' ),
        'section'   => $prefix . '_lectures_general',
        'priority'  => 1
    )
);

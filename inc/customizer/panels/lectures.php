<?php
// Set Panel ID
$panel_id = 'illdy_panel_latest_info';

// Set prefix
$prefix = 'qi-theme';

/***********************************************/
/*************** Lectures ******************/
/***********************************************/


/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_lectures_general' ,
    array(
        'title'         => __( 'Lectures', 'qi-theme' ),
        'description'   => __( 'Control various options for Lectures section from front page.', 'qi-theme' ),
        'priority'      => 106
        // 'title'       => __( 'General', 'qi-theme' ),
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
        'label'     => __( 'Show this section?', 'qi-theme' ),
        'section'   => $prefix . '_lectures_general',
        'priority'  => 1
    )
);

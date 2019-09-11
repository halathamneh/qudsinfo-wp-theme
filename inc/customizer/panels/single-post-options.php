<?php
    // Set Panel ID
    $panel_id = 'illdy_panel_blog';

    // Set prefix
    $prefix = 'qi-theme';

    /***********************************************/
    /************** BLOG OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority'          => 111,
            'capability'        => 'edit_theme_options',
            'theme_supports'    => '',
            'title'             => __( 'Single Post Options', 'qi-theme' ),
            'description'       => __( 'Control various blog options from here. Most of the options from this panel refer to the blog single page view. If you\'re not familiar with that term, please perform a Google search.', 'qi-theme' ),
        )
    );

    /***********************************************/
    /************** Global Blog Settings  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_blog_global_section' ,
        array(
            'title'       => __( 'Global', 'qi-theme' ),
            'description' => __( 'This section allows you to control how certain elements are displayed on the blog single page.', 'qi-theme' ),
            'panel' 	  => $panel_id
        )
    );

    /* Posted on on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'type'	         => 'checkbox',
            'label'         => __('Posted on meta on single blog post', 'qi-theme'),
            'description'   => __('This will disable the posted on zone as well as the author name', 'qi-theme'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Post Category on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_category_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_category_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => __('Category meta on single blog post', 'qi-theme'),
            'description'   => __('This will disable the posted in zone.', 'qi-theme'),
            // 'section'       => $prefix.'_blog_global_section',
        )
    );



    /* Post Tags on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_tags_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_tags_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => __('Tags meta on single blog post', 'qi-theme'),
            'description'   => __('This will disable the tagged with zone.', 'qi-theme'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Post Comments on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_comments_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_post_comments_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => __('Coments meta on single blog post', 'qi-theme'),
            'description'   => __('This will disable the comments header zone.', 'qi-theme'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Social Sharing on single blog posts */
    $wp_customize->add_setting(
        $prefix . '_enable_social_sharing_blog_posts',
        array(
            'sanitize_callback' => $prefix . '_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        $prefix . '_enable_social_sharing_blog_posts',
        array(
            'type'              => 'checkbox',
            'label'             => __( 'Social sharing?', 'qi-theme' ),
            'description'       => __('Displayed right under the post title', 'qi-theme'),
            'section'           => $prefix . '_blog_global_section',
        )
    );

    /* Author Info Box on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_author_box_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_author_box_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => __('Author info box on single blog post', 'qi-theme'),
            'description'   => __('Displayed right at the end of the post', 'qi-theme'),
            'section'       => $prefix.'_blog_global_section',
        )
    );

    /* Related posts on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_related_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default'           => 1,
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_related_blog_posts',
        array(
            'type'          => 'checkbox',
            'label'         => __('Related posts on single blog post', 'qi-theme'),
            'description'   => __('Displayed at the end of the post', 'qi-theme'),
            'section'       => $prefix.'_blog_global_section',
        )
    );


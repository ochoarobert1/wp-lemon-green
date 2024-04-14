<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package LemonGreenTheme
 * @author Robert Ochoa
 * @since 1.0.0
 *
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('LEMON_GREEN_CHILD_VERSION', '1.0.0');


if (! class_exists('LemonGreenTheme')) {
    /**
     * LemonGreenTheme
    */
    class LemonGreenTheme
    {
        /**
         * Method __construct
         *
         * @return void
         */
        public function __construct()
        {
            add_action('wp_enqueue_scripts', [$this, 'enqueueScriptsStyles'], 99);
        }

        /**
         * Method enqueueScriptsStyles
         *
         * @return void
         */
        public function enqueueScriptsStyles()
        {
            wp_enqueue_style(
                'lemongreen-child-style',
                get_stylesheet_directory_uri() . '/style.css',
                [],
                LEMON_GREEN_CHILD_VERSION,
                'all'
            );

            wp_enqueue_script(
                'lemongreen-child-script',
                get_stylesheet_directory_uri() . '/functions.js',
                [],
                LEMON_GREEN_CHILD_VERSION,
                ['in_footer' => true]
            );
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
        }
    }

    new LemonGreenTheme();
}

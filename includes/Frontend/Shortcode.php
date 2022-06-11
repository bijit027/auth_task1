<?php

namespace Library\System\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode
{
    /**
     * Initializes the class
     */
    function __construct()
    {
        add_shortcode('library-code', [$this, 'render_shortcode']);
    }

    public function loadAssets()
    {
        wp_enqueue_style(
            'library_frontends_css',
            WP_LIBRARY_BASE_DIR . 'assets/css/frontend.css',
        );
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_shortcode($atts = [], $content = '')
    {

        $this->loadAssets();

        global $wpdb;
        $atts = shortcode_atts(array(
            'genre' => ''
        ), $atts);
        $genre = $atts['genre'];

        if (!empty($atts['genre'])) {

            $items = lb_book_get_addresses_genre($genre);
            return $this->renderAttributesBasis($items);
        } else {
            $items = lb_book_get_addresses($atts);
            return $this->renderWithoutAttributes($items);
            //    return $this->renderWithoutAttributes($items);
        }
    }

    public function renderAttributesBasis($items)
    {

        ob_start();
        include_once WP_LIBRARY_PATH . '/includes/views/AttributeRender.php';
        $content = ob_get_clean();
        return $content;
    }

    public function renderWithoutAttributes($items)
    {
        ob_start();
        include_once WP_LIBRARY_PATH . '/includes/views/AttributeRender.php';
        $content = ob_get_clean();
        return $content;
    }
}

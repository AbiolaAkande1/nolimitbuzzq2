<?php

/**
 * Handles the portfolio shortcode functionality
 */
class Custom_Portfolio_Shortcode {
    public function render_shortcode( $atts ) {
        $output = '';
        
        $categories = get_terms( array(
            'taxonomy'   => 'portfolio_category',
            'hide_empty' => true,
        ) );
        
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= '<div class="portfolio-category">';
                $output .= '<h2>' . esc_html( $category->name ) . '</h2>';
                
                $args = array(
                    'post_type'      => 'portfolio',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'portfolio_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                        ),
                    ),
                );
                
                $query = new WP_Query( $args );
                
                if ( $query->have_posts() ) {
                    $output .= '<div class="portfolio-items">';
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        
                        $output .= '<div class="portfolio-item">';
                        if ( has_post_thumbnail() ) {
                            $output .= '<div class="portfolio-thumbnail">';
                            $output .= get_the_post_thumbnail( null, 'medium' );
                            $output .= '</div>';
                        }
                        $output .= '<h3>' . get_the_title() . '</h3>';
                        
                        // Get all categories for this portfolio item
                        $item_categories = get_the_terms( get_the_ID(), 'portfolio_category' );
                        if ( ! empty( $item_categories ) && ! is_wp_error( $item_categories ) ) {
                            $output .= '<div class="portfolio-categories">';
                            foreach ( $item_categories as $item_category ) {
                                $output .= sprintf(
                                    '<span class="portfolio-category-badge">%s</span>',
                                    esc_html( $item_category->name )
                                );
                            }
                            $output .= '</div>';
                        }
                        
                        $output .= '<div class="portfolio-excerpt">';
                        $output .= get_the_excerpt();
                        $output .= '</div>';
                        $output .= '<a href="' . get_permalink() . '" class="portfolio-link">' . 
                                 esc_html__( 'View Portfolio', 'custom-portfolio' ) . '</a>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                wp_reset_postdata();
                
                $output .= '</div>';
            }
        }
        
        return $output;
    }
}
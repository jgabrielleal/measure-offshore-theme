<?php
/** Pagination */
function pagination_funtion() {
    // Get total number of pages
    global $wp_query;
    $total = $wp_query->max_num_pages;
    // Only paginate if we have more than one page                   
    if ( $total > 1 )  {
        // Get the current page
        if ( !$current_page = get_query_var('paged') )
            $current_page = 1;
                               
            $big = 999999999;
            // Structure of "format" depends on whether we’re using pretty permalinks
            $permalink_structure = get_option('permalink_structure');
            $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
            echo paginate_links(array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => $format,
                'current' => $current_page,
                'total' => $total,
                'mid_size' => 2,
                'type' => 'list'
            ));
        }
    }
    /** END Pagination */
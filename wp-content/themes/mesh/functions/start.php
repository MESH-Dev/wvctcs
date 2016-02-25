<?php

//enqueue scripts and styles *use production assets. Dev assets are located in assets/css and assets/js
function loadup_scripts() {
    
    wp_enqueue_script( 'sidr', get_template_directory_uri().'/js/jquery.sidr.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mixItUp', get_template_directory_uri().'/js/jquery.mixitup.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri().'/js/jquery.parallax-1.1.3.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'sidr-css-bare', get_template_directory_uri().'/css/jquery.sidr.light.css', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');



//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

//Add shortcode functionality to homepage career panels.
add_shortcode('salary', 'my_shortcode_salary' );
   function my_shortcode_salary($atts, $content = null) {

        return '<span class="salary">' . $content . '</span>';
   }

add_shortcode('time', 'my_shortcode_time' );
   function my_shortcode_time($atts, $content = null) {

        return '<span class="time">' . $content . '</span>';
   }




function my_post_object_query( $args, $field, $post )
{
    // modify the order
    $args['orderby'] = 'title';

    return $args;
}

// filter for every field
add_filter('acf/fields/post_object/query', 'my_post_object_query', 10, 3);

// filter for a specific field based on it's name
add_filter('acf/fields/post_object/query/name=my_select', 'my_post_object_query', 10, 3);

// filter for a specific field based on it's key
add_filter('acf/fields/post_object/query/key=field_508a263b40457', 'my_post_object_query', 10, 3);


//Custom post types
function program_post_type() {

    $labels = array(
        'name'                => _x( 'Programs', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Programs', 'text_domain' ),
        'name_admin_bar'      => __( 'Programs', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Programs', 'text_domain' ),
        'add_new_item'        => __( 'Add New Program', 'text_domain' ),
        'add_new'             => __( 'Add Program', 'text_domain' ),
        'new_item'            => __( 'New Program', 'text_domain' ),
        'edit_item'           => __( 'Edit Program', 'text_domain' ),
        'update_item'         => __( 'Update Program', 'text_domain' ),
        'view_item'           => __( 'View Programs', 'text_domain' ),
        'search_items'        => __( 'Search Programs', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'programs', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'supports'            => array('title', 'author')
    );
    register_post_type( 'Program', $args );

}

add_action( 'init', 'program_post_type', 0 );

function job_post_type() {

    $labels = array(
        'name'                => _x( 'Jobs', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Job', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Jobs', 'text_domain' ),
        'name_admin_bar'      => __( 'Jobs', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
        'all_items'           => __( 'All Jobs', 'text_domain' ),
        'add_new_item'        => __( 'Add New Job', 'text_domain' ),
        'add_new'             => __( 'New Job', 'text_domain' ),
        'new_item'            => __( 'New Job', 'text_domain' ),
        'edit_item'           => __( 'Edit Job', 'text_domain' ),
        'update_item'         => __( 'Update Job', 'text_domain' ),
        'view_item'           => __( 'View Job', 'text_domain' ),
        'search_items'        => __( 'Search Jobs', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'jobs', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'supports'            => array('title', 'author')
    );
    register_post_type( 'Jobs', $args );

}

add_action( 'init', 'job_post_type', 0 );

// registration code for training_time taxonomy
        function register_training_time_tax() {
            $labels = array(
                'name'                  => _x( 'Training Time', 'taxonomy general name' ),
                'singular_name'         => _x( 'Training Time', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Training Time', 'Training Time'),
                'add_new_item'          => __( 'Add New Training Time' ),
                'edit_item'             => __( 'Edit Training Time' ),
                'new_item'              => __( 'New Training Time' ),
                'view_item'             => __( 'View Training Time' ),
                'search_items'          => __( 'Search Training Time' ),
                'not_found'             => __( 'No Training Time found' ),
                'not_found_in_trash'    => __( 'No Training Time found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Training Time'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'training_time', 'with_front' => false ),
             );
            register_taxonomy('training_time', $pages, $args);
        }
        add_action('init', 'register_training_time_tax');

        // registration code for salary taxonomy
        function register_salary_tax() {
            $labels = array(
                'name'                  => _x( 'Salaries', 'taxonomy general name' ),
                'singular_name'         => _x( 'Salary', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Salary', 'Salary'),
                'add_new_item'          => __( 'Add New Salary' ),
                'edit_item'             => __( 'Edit Salary' ),
                'new_item'              => __( 'New Salary' ),
                'view_item'             => __( 'View Salary' ),
                'search_items'          => __( 'Search Salaries' ),
                'not_found'             => __( 'No Salary found' ),
                'not_found_in_trash'    => __( 'No Salary found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Salary'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'salary', 'with_front' => false ),
             );
            register_taxonomy('salary', $pages, $args);
        }
        add_action('init', 'register_salary_tax');

        // registration code for location taxonomy
        function register_location_tax() {
            $labels = array(
                'name'                  => _x( 'Locations', 'taxonomy general name' ),
                'singular_name'         => _x( 'Location', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Location', 'Location'),
                'add_new_item'          => __( 'Add New Location' ),
                'edit_item'             => __( 'Edit Location' ),
                'new_item'              => __( 'New Location' ),
                'view_item'             => __( 'View Location' ),
                'search_items'          => __( 'Search Locations' ),
                'not_found'             => __( 'No Location found' ),
                'not_found_in_trash'    => __( 'No Location found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Location'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'location', 'with_front' => false ),
             );

           
            register_taxonomy('location', $pages, $args);
        }
        add_action('init', 'register_location_tax');

        function register_degree_type_tax() {
            $labels = array(
                'name'                  => _x( 'Degree Type', 'taxonomy general name' ),
                'singular_name'         => _x( 'Degree Type', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Degree Type', 'Training Time'),
                'add_new_item'          => __( 'Add New Degree Type' ),
                'edit_item'             => __( 'Edit Degree Type' ),
                'new_item'              => __( 'New Degree Type' ),
                'view_item'             => __( 'View Degree Type' ),
                'search_items'          => __( 'Search Degree Type' ),
                'not_found'             => __( 'No Degree Type found' ),
                'not_found_in_trash'    => __( 'No Degree Type found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Degree Type'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'degree_type', 'with_front' => false ),
             );
            register_taxonomy('degree_type', $pages, $args);
        }
        add_action('init', 'register_degree_type_tax');

        function register_tuition_cost_tax() {
            $labels = array(
                'name'                  => _x( 'Tuition Cost', 'taxonomy general name' ),
                'singular_name'         => _x( 'Tuition Cost', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Tuition Cost', 'Tuition Cost'),
                'add_new_item'          => __( 'Add New Tuition Cost' ),
                'edit_item'             => __( 'Edit Tuition Cost' ),
                'new_item'              => __( 'New Tuition Cost' ),
                'view_item'             => __( 'View Tuition Cost' ),
                'search_items'          => __( 'Search Tuition Cost' ),
                'not_found'             => __( 'No Tutiion Cost found' ),
                'not_found_in_trash'    => __( 'No Tuition Cost found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Tuition Cost'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'tuition_cost', 'with_front' => false ),
             );
            register_taxonomy('tuition_cost', $pages, $args);
        }
        add_action('init', 'register_tuition_cost_tax');

        add_action('init', 'location_register_meta');
        function location_register_meta(){
            register_meta('term', 'college','' );
            register_meta('term', 'address','' );
            register_meta('term', 'phone','' );
        }

        //  function location_get_term_college( $term_id ) {

        //     $college = get_term_meta( $term->term_id, 'college', true );
        //     var_dump($college);
        // //     $address = get_term_meta( $term_id, 'address', true );

        // //     //return $hash && $college ? "#{$college}" : $college;
        //     return $college;
        //  }



        add_action( 'location_add_form_fields', 'location_new_term_field' ); 
        function location_new_term_field() { 
            wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?> 
            <div class="form-field location-term-wrap"> <label for="location-term">
                <?php _e( 'College', 'location' ); ?></label> 
                <input type="text" name="location_term" id="location-term" value="" class="location-term-field" /> </div> 
            <div class="form-field location-term-wrap"> <label for="location-term">
                <?php _e( 'Address', 'location' ); ?></label> 
                <input type="text" name="location_term" id="location-term" value="" class="location-term-field" /> </div> 
            <div class="form-field location-term-wrap"> <label for="location-term">
                <?php _e( 'Phone', 'location' ); ?></label> 
                <input type="text" name="location_term" id="location-term" value="" class="location-term-field" /> </div> 

                <?php }

        add_action( 'location_edit_form_fields', 'location_edit_term_field' );

            function location_edit_term_field( $term ) {

                //$default = '#ffffff';
                //$location_term = location_get_term( $term->term_id, true );

                $college = get_term_meta( $term->term_id, 'college', true );
                $address = get_term_meta( $term->term_id, 'address', true );
                $phone = get_term_meta( $term->term_id, 'phone', true );

               //if ( ! $location_term )
                    //$color = $default; ?>

                <tr class="form-field location-term-wrap">
                    <th scope="row"><label for="location-term"><?php _e( 'College', 'location' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?>
                        <input type="text" name="location_term_college" id="location-term-college" value="<?php echo esc_attr( $college ); ?>" class="location-field" />
                    </td>
                </tr>
                <tr class="form-field location-term-wrap">
                    <th scope="row"><label for="location-term"><?php _e( 'Address', 'location' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?>
                        <input type="text" name="location_term_address" id="location-term-address" value="<?php echo esc_attr( $address ); ?>" class="location-field" />
                    </td>
                </tr>
                <tr class="form-field location-term-wrap">
                    <th scope="row"><label for="location-term"><?php _e( 'Phone', 'location' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?>
                        <input type="text" name="location_term_phone" id="location-term-phone" value="<?php echo esc_attr( $phone ); ?>" class="location-field" />
                    </td>
                </tr>
                <?php }


        add_action( 'edit_location',   'location_save_term_college' );
        add_action( 'create_location', 'location_save_term_college' );

        function location_save_term_college($term_id) {

            if ( ! isset( $_POST['location_term_nonce'] ) || ! wp_verify_nonce( $_POST['location_term_nonce'], basename( __FILE__ ) ) )
                return;

            $old_term = get_term_meta( $term_id, 'college', true );
            $new_term = $_POST['location_term_college'];

            if ( $old_term && '' === $new_term )
                delete_term_meta( $term_id, 'college' );

            else if ( $old_term !== $new_term )
                update_term_meta( $term_id, 'college', $new_term );

            // if ( $old_term && '' === $new_term )
            //     delete_term_meta( $term_id, 'address' );

            // else if ( $old_term !== $new_term )
            //     update_term_meta( $term_id, 'address', $new_term );
        }

        add_action( 'edit_location',   'location_save_term_address' );
        add_action( 'create_location', 'location_save_term_address' );

        function location_save_term_address( $term_id ) {

            if ( ! isset( $_POST['location_term_nonce'] ) || ! wp_verify_nonce( $_POST['location_term_nonce'], basename( __FILE__ ) ) )
                return;

            $old_term = get_term_meta( $term_id, 'address', true );
            $new_term = $_POST['location_term_address'];

            if ( $old_term && '' === $new_term )
                delete_term_meta( $term_id, 'address' );

            else if ( $old_term !== $new_term )
                update_term_meta( $term_id, 'address', $new_term );

            // if ( $old_term && '' === $new_term )
            //     delete_term_meta( $term_id, 'address' );

            // else if ( $old_term !== $new_term )
            //     update_term_meta( $term_id, 'address', $new_term );
        }

        add_action( 'edit_location',   'location_save_term_phone' );
        add_action( 'create_location', 'location_save_term_phone' );

        function location_save_term_phone( $term_id ) {

            if ( ! isset( $_POST['location_term_nonce'] ) || ! wp_verify_nonce( $_POST['location_term_nonce'], basename( __FILE__ ) ) )
                return;

            $old_term = get_term_meta( $term_id, 'phone', true );
            $new_term = $_POST['location_term_phone'];

            if ( $old_term && '' === $new_term )
                delete_term_meta( $term_id, 'phone' );

            else if ( $old_term !== $new_term )
                update_term_meta( $term_id, 'phone', $new_term );

            // if ( $old_term && '' === $new_term )
            //     delete_term_meta( $term_id, 'address' );

            // else if ( $old_term !== $new_term )
            //     update_term_meta( $term_id, 'address', $new_term );
        }

        //Add the meta tags into the management screen

        // add_filter( 'manage_edit-category_columns', 'location_edit_term_columns' );

        //     function location_edit_term_columns( $columns ) {

        //         $columns['college'] = __( 'College', 'location' );
        //         $columns['address'] = __( 'Address', 'location' );

        //         return $columns;
        //     }

        // add_filter( 'manage_category_custom_column', 'jt_manage_term_custom_column', 10, 3 );

        // function location_manage_term_custom_column( $out, $column, $term_id ) {

        //     if ( 'college' === $column ) {

        //         $college = location_get_term( $term_id, true );

        //         if ( ! $college )
        //             //$color = '#ffffff';

        //         $out = sprintf( '<span class="location-block" style="background:%s;">&nbsp;</span>', esc_attr( $colege ) );
        //     }

        //     if ( 'address' === $column ) {

        //         $address = location_get_term( $term_id, true );

        //         if ( ! $address )
        //             //$color = '#ffffff';

        //         $out = sprintf( '<span class="location-block" style="background:%s;">&nbsp;</span>', esc_attr( $address ) );
        //     }

        //     return $out;
        // }

        // registration code for transferable_skills taxonomy
        function register_transferable_skills_tax() {
            $labels = array(
                'name'                  => _x( 'Transferable Skills', 'taxonomy general name' ),
                'singular_name'         => _x( 'Transferable Skills', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Transferable Skills', 'Transferable Skills'),
                'add_new_item'          => __( 'Add New Transferable Skills' ),
                'edit_item'             => __( 'Edit Transferable Skills' ),
                'new_item'              => __( 'New Transferable Skills' ),
                'view_item'             => __( 'View Transferable Skills' ),
                'search_items'          => __( 'Search Transferable Skills' ),
                'not_found'             => __( 'No Transferable Skills found' ),
                'not_found_in_trash'    => __( 'No Transferable Skills found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Transferable Skills'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'transferable_skills', 'with_front' => false ),
             );
            register_taxonomy('transferable_skills', $pages, $args);
        }
        add_action('init', 'register_transferable_skills_tax');

        // registration code for sector taxonomy
        function register_sector_tax() {
            $labels = array(
                'name'                  => _x( 'Sectors', 'taxonomy general name' ),
                'singular_name'         => _x( 'Sector', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New Sector', 'Sector'),
                'add_new_item'          => __( 'Add New Sector' ),
                'edit_item'             => __( 'Edit Sector' ),
                'new_item'              => __( 'New Sector' ),
                'view_item'             => __( 'View Sector' ),
                'search_items'          => __( 'Search Sectors' ),
                'not_found'             => __( 'No Sector found' ),
                'not_found_in_trash'    => __( 'No Sector found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('Sector'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'sector', 'with_front' => false ),
             );
            register_taxonomy('sector', $pages, $args);
        }
        add_action('init', 'register_sector_tax');

        // registration code for college taxonomy
        function register_college_tax() {
            $labels = array(
                'name'                  => _x( 'College', 'taxonomy general name' ),
                'singular_name'         => _x( 'College', 'taxonomy singular name' ),
                'add_new'               => _x( 'Add New College', 'College'),
                'add_new_item'          => __( 'Add New College' ),
                'edit_item'             => __( 'Edit College' ),
                'new_item'              => __( 'New College' ),
                'view_item'             => __( 'View College' ),
                'search_items'          => __( 'Search College' ),
                'not_found'             => __( 'No College found' ),
                'not_found_in_trash'    => __( 'No College found in Trash' ),
            );
            
            $pages = array('program','jobs');
            
            $args = array(
                'labels'            => $labels,
                'singular_label'    => __('College'),
                'public'            => true,
                'show_ui'           => true,
                'hierarchical'      => true,
                'show_tagcloud'     => false,
                'show_in_nav_menus' => true,
                'rewrite'           => array('slug' => 'college', 'with_front' => false ),
             );
            register_taxonomy('college', $pages, $args);
        }
        add_action('init', 'register_college_tax');

//disable code editors
add_theme_support('html5');
add_theme_support('automatic-feed-links');

//Security and header clean-ups
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'wp_generator'); // remove WP version from header
remove_action( 'wp_head','wp_shortlink_wp_head');


?>

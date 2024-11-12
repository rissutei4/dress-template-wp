<?php
/**
 * Template Name: Home page
 */
?>
<?php
// get header.php file
get_header();
?>
    <section class="CarouselSection" id="shop-part">
        <div class="owl-carousel">
            <div class="slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xs-6 leftSlidePart">
                            <div class="slideHeading">
                                <?php
                                $carousel_heading_slide_1 = get_post_meta(get_the_ID(), 'carousel_heading_slide_1', true);
                                $carousel_content_slide1 = get_post_meta(get_the_ID(), 'carousel_content_slide1', true);
                                $carousel_change_button_text = get_post_meta(get_the_ID(), 'carousel_change_button_text', true);
                                ?>
                                <h3><?php echo esc_html($carousel_heading_slide_1); ?></h3>
                                <p><?php echo esc_html($carousel_content_slide1); ?></p>
                                <a href="#categories"
                                   class="moreBtn"><?php echo esc_html($carousel_change_button_text); ?></a>
                            </div>

                        </div>
                        <div class="col-md-6 col-xs-6 rightSlidePart">
                            <div class="gradientBlock"></div>
                            <div class="modelImage">
                                <?php
                                $carousel_image_slide_1 = get_post_meta(get_the_ID(), 'carousel_image_slide_1', true);
                                $carousel_image_slide_1_url = wp_get_attachment_url($carousel_image_slide_1);
                                $carousel_change_bubble_text = get_post_meta(get_the_ID(), 'carousel_change_bubble_text', true);
                                $carousel_change_bubble_link = get_post_meta(get_the_ID(), 'carousel_change_bubble_link', true);
                                ?>
                                <img src="<?php echo esc_url($carousel_image_slide_1_url); ?>" class="img-fluid"
                                     alt="modelImage">
                            </div>
                            <div class="buyButton">
                                <div class="circle">
                                    <a href="<?php echo esc_url($carousel_change_bubble_link); ?>"><?php echo esc_html($carousel_change_bubble_text); ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="slide secondsl">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 leftSlidePart">
                            <div class="slideHeading">
                                <?php
                                $carousel_heading_slide_2 = get_post_meta(get_the_ID(), 'carousel_heading_slide_2', true);
                                $carousel_content_slide2 = get_post_meta(get_the_ID(), 'carousel_content_slide2', true);
                                ?>
                                <h3><?php echo esc_html($carousel_heading_slide_2); ?></h3>
                                <p><?php echo esc_html($carousel_content_slide2); ?></p>
                                <a href="#categories"
                                   class="moreBtn"><?php echo esc_html($carousel_change_button_text); ?></a>
                            </div>
                        </div>
                        <div class="col-md-6 rightSlidePart">
                            <div class="gradientBlock"></div>
                            <div class="modelImage">
                                <?php
                                $carousel_image_slide_2 = get_post_meta(get_the_ID(), 'carousel_image_slide_2', true);
                                $carousel_image_slide_2_url = wp_get_attachment_url($carousel_image_slide_2);
                                ?>
                                <img src="<?php echo esc_url($carousel_image_slide_2_url); ?>" class="img-fluid"
                                     alt="modelImage">
                            </div>
                            <div class="buyButton">
                                <div class="circle">
                                    <a href="<?php echo esc_url($carousel_change_bubble_link); ?>"><?php echo esc_html($carousel_change_bubble_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 leftSlidePart">
                            <div class="slideHeading">
                                <?php
                                $carousel_heading_slide_3 = get_post_meta(get_the_ID(), 'carousel_heading_slide_3', true);
                                $carousel_content_slide3 = get_post_meta(get_the_ID(), 'carousel_content_slide3', true);
                                ?>
                                <h3><?php echo esc_html($carousel_heading_slide_3); ?></h3>
                                <p><?php echo esc_html($carousel_content_slide3); ?></p>
                                <a href="#categories"
                                   class="moreBtn"><?php echo esc_html($carousel_change_button_text); ?></a>
                            </div>
                        </div>
                        <div class="col-md-6 rightSlidePart">
                            <div class="gradientBlock"></div>
                            <div class="modelImage">
                                <?php
                                $carousel_image_slide_3 = get_post_meta(get_the_ID(), 'carousel_image_slide_3', true);
                                $carousel_image_slide_3_url = wp_get_attachment_url($carousel_image_slide_3);
                                ?>
                                <img src="<?php echo esc_url($carousel_image_slide_3_url); ?>" class="img-fluid"
                                     alt="modelImage">
                            </div>
                            <div class="buyButton">
                                <div class="circle">
                                    <a href="<?php echo esc_url($carousel_change_bubble_link); ?>"><?php echo esc_html($carousel_change_bubble_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 leftSlidePart">
                            <div class="slideHeading">
                                <?php
                                $carousel_heading_slide_4 = get_post_meta(get_the_ID(), 'carousel_heading_slide_4', true);
                                $carousel_content_slide4 = get_post_meta(get_the_ID(), 'carousel_content_slide4', true);
                                ?>
                                <h3><?php echo esc_html($carousel_heading_slide_4); ?></h3>
                                <p><?php echo esc_html($carousel_content_slide4); ?></p>
                                <a href="#categories"
                                   class="moreBtn"><?php echo esc_html($carousel_change_button_text); ?></a>
                            </div>
                        </div>
                        <div class="col-md-6 rightSlidePart">
                            <div class="gradientBlock"></div>
                            <div class="modelImage">
                                <?php
                                $carousel_image_slide_4 = get_post_meta(get_the_ID(), 'carousel_image_slide_4', true);
                                $carousel_image_slide_4_url = wp_get_attachment_url($carousel_image_slide_4);
                                ?>
                                <img src="<?php echo esc_url($carousel_image_slide_4_url); ?>" class="img-fluid"
                                     alt="modelImage">
                            </div>
                            <div class="buyButton">
                                <div class="circle">
                                    <a href="<?php echo esc_url($carousel_change_bubble_link); ?>"><?php echo esc_html($carousel_change_bubble_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ItemsInStock" id="categories">
    <div class="container d-flex flex-column justify-content-center">
    <div class="real-filters-container">
        <div class="filters-mobile">
            <button class="filtersClick">
                <span>FILTERS</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-down.svg"
                     class="img-fluid" alt="">
            </button>
        </div>

        <ul class="nav nav-pills mb-3 filters-mobile-cont" id="pills-tabs" role="tablist">
            <?php
            $dress_tabs_names = get_post_meta(get_the_ID(), 'dress_tabs_names', true);
            ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="wedding-dress-tab" data-toggle="pill"
                        data-target="#wedding-dress"
                        type="button" role="tab" data-filter="svadobne-saty" aria-controls="wedding-dress"
                        aria-selected="true">   <?php echo esc_html($dress_tabs_names[2]); ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="evening-dress-tab" data-toggle="pill"
                        data-target="#evening-dress"
                        type="button" role="tab" data-filter="vecerne-saty" aria-controls="evening-dress"
                        aria-selected="false">
                    <?php echo esc_html($dress_tabs_names[1]); ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="child-dress-tab" data-toggle="pill" data-target="#child-dress"
                        type="button" role="tab" data-filter="detske-saty" aria-controls="child-dress"
                        aria-selected="false">   <?php echo esc_html($dress_tabs_names[3]); ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="women-suit-tab" data-toggle="pill" data-target="#women-suit"
                        type="button" role="tab" data-filter="damsky-kostym" aria-controls="women-suit"
                        aria-selected="false">   <?php echo esc_html($dress_tabs_names[4]); ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="accesories-tab" data-toggle="pill" data-target="#accessories"
                        type="button" role="tab" data-filter="prislusenstvo" aria-controls="accesories"
                        aria-selected="false">   <?php echo esc_html($dress_tabs_names[5]); ?>
                </button>
            </li>
        </ul>
    </div>


    <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="wedding-dress" role="tabpanel"
         aria-labelledby="wedding-dress-tab">
        <div class="container product-cards-cont">
            <div class="row">
                <?php
                // Product type
                $product_type = 'wedding-dress';

                // First query: Fetch the shown cards
                $argsShown = array(
                    'post_type' => 'products',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'product_card',
                            'value' => 'Show',
                            'compare' => '='
                        ),
                        array(
                            'key' => 'product_type',
                            'value' => $product_type,
                            'compare' => '='
                        ),
                    )
                );

                $queryShown = new WP_Query($argsShown);

                // Second query: Fetch the hidden cards
                $argsHidden = array(
                    'post_type' => 'products',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'product_card',
                            'value' => 'Show',
                            'compare' => '!='
                        ),
                        array(
                            'key' => 'product_type',
                            'value' => $product_type,
                            'compare' => '='
                        ),
                    )
                );

                $queryHidden = new WP_Query($argsHidden);

                // Merge the two sets of posts
                $merged_posts = array_merge($queryShown->posts, $queryHidden->posts);

                // Check if there are posts
                if (!empty($merged_posts)) :
                    // Loop through the merged posts to display them
                    foreach ($merged_posts as $post) {
                        setup_postdata($post);

                        $product_card_status = get_post_meta(get_the_ID(), 'product_card', true);
                        $card_class = ($product_card_status == 'Show') ? 'shownCards' : 'hidden-prod';
                        $main_image = get_post_meta(get_the_ID(), 'main_image', true);
                        $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
                        $product_subheading = get_post_meta(get_the_ID(), 'product_subheading', true);
                        $product_price = get_post_meta(get_the_ID(), 'price', true);
                        $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
                        ?>
                        <div class="col-lg-4 col-md-6 col-6">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <div class="product-card <?php echo $card_class; ?>">
                                    <div class="product-image">
                                        <img src="<?php echo esc_url($main_image); ?>" class="img-fluid"
                                             alt="">
                                    </div>
                                    <div class="product-overlay">
                                        <div class="product-heading">
                                            <p><?php echo esc_html($product_subheading); ?></p>
                                            <h4><?php echo esc_html($product_heading); ?></h4>
                                        </div>
                                        <div class="price-sizes-container container">
                                            <div class="row flex-md-row flex-row align-items-md-center align-items-flex-start">
                                                <div class="col-xl-4 col-md-5 col-6 d-flex">
                                                    <div class="right-side">
                                                        <div class="price">
                                                            <p><?php
                                                                if (!empty($product_price)) {
                                                                    echo $product_price . '&euro;';
                                                                } ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8 col-md-7 col-6 divider">
                                                    <div class="sizes">
                                                        <h4>Dostupné veľkosti:</h4>
                                                        <ul>
                                                            <?php
                                                            if (isset($product_sizing) && is_array($product_sizing)) {
                                                                foreach ($product_sizing as $size) {
                                                                    echo '<li>';
                                                                    echo '<p>' . esc_html($size) . '</p>';
                                                                    echo '</li>';
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                else :
                    echo '<p class="no-products-message">No products found in this category.</p>';
                endif;

                // Always remember to reset the global post data after a custom loop!
                wp_reset_postdata();
                ?>
            </div>
            <div class="loadMoreButton d-flex justify-content-center">
                <?php
                $load_more_text = get_post_meta(get_the_ID(), 'load_more_text', true);
                ?>
                <button class="load-more"><?php echo esc_html($load_more_text); ?></button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="evening-dress">
    <div class="container product-cards-cont">
    <div class="row">
<?php
// Product type
$product_type = 'evening-dress';

// First query: Fetch the shown cards
$argsShown = array(
    'post_type' => 'products',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'product_card',
            'value' => 'Show',
            'compare' => '='
        ),
        array(
            'key' => 'product_type',
            'value' => $product_type,
            'compare' => '='
        ),
    )
);

$queryShown = new WP_Query($argsShown);

// Second query: Fetch the hidden cards
$argsHidden = array(
    'post_type' => 'products',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'product_card',
            'value' => 'Show',
            'compare' => '!='
        ),
        array(
            'key' => 'product_type',
            'value' => $product_type,
            'compare' => '='
        ),
    )
);

$queryHidden = new WP_Query($argsHidden);

// Merge the two sets of posts
$merged_posts = array_merge($queryShown->posts, $queryHidden->posts);

// Check if there are posts
if (!empty($merged_posts)) :
    // Loop through the merged posts to display them
    foreach ($merged_posts as $post) {
        setup_postdata($post);

        $product_card_status = get_post_meta(get_the_ID(), 'product_card', true);
        $card_class = ($product_card_status == 'Show') ? 'shownCards' : 'hidden-prod';
        $main_image = get_post_meta(get_the_ID(), 'main_image', true);
        $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
        $product_subheading = get_post_meta(get_the_ID(), 'product_subheading', true);
        $product_price = get_post_meta(get_the_ID(), 'price', true);
        $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
        ?>
        <div class="col-lg-4 col-md-6 col-6">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <div class="product-card <?php echo $card_class; ?>">
                    <div class="product-image">
                        <img src="<?php echo esc_url($main_image); ?>" class="img-fluid"
                             alt="">
                    </div>
                    <div class="product-overlay">
                        <div class="product-heading">
                            <p><?php echo esc_html($product_subheading); ?></p>
                            <h4><?php echo esc_html($product_heading); ?></h4>
                        </div>
                        <div class="price-sizes-container container">
                            <div class="row flex-md-row flex-row align-items-md-center align-items-flex-start">
                                <div class="col-xl-4 col-md-5 col-6 d-flex">
                                    <div class="right-side">
                                        <div class="price">
                                            <p><?php
                                                if (!empty($product_price)) {
                                                    echo $product_price . '&euro;';
                                                } ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-7 col-6 divider">
                                    <div class="sizes">
                                        <h4>Dostupné veľkosti:</h4>
                                        <ul>
                                            <?php
                                            if (isset($product_sizing) && is_array($product_sizing)) {
                                                foreach ($product_sizing as $size) {
                                                    echo '<li>';
                                                    echo '<p>' . esc_html($size) . '</p>';
                                                    echo '</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
else :
    echo '<p class="no-products-message">No products found in this category.</p>';
endif;

// Always remember to reset the global post data after a custom loop!
wp_reset_postdata();
?>
        </div>
        <div class="loadMoreButton d-flex justify-content-center">
            <?php
            $load_more_text = get_post_meta(get_the_ID(), 'load_more_text', true);
            ?>
            <button class="load-more"><?php echo esc_html($load_more_text); ?></button>
        </div>
        </div>
        </div>
        <div class="tab-pane fade" id="child-dress" role="tabpanel" aria-labelledby="child-dress-tab">
            <div class="container product-cards-cont">
                <div class="row">
                    <?php
                    // Product type
                    $product_type = 'child-dress';

                    // First query: Fetch the shown cards
                    $argsShown = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryShown = new WP_Query($argsShown);

                    // Second query: Fetch the hidden cards
                    $argsHidden = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '!='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryHidden = new WP_Query($argsHidden);

                    // Merge the two sets of posts
                    $merged_posts = array_merge($queryShown->posts, $queryHidden->posts);

                    // Check if there are posts
                    if (!empty($merged_posts)) :
                        // Loop through the merged posts to display them
                        foreach ($merged_posts as $post) {
                            setup_postdata($post);

                            $product_card_status = get_post_meta(get_the_ID(), 'product_card', true);
                            $card_class = ($product_card_status == 'Show') ? 'shownCards' : 'hidden-prod';
                            $main_image = get_post_meta(get_the_ID(), 'main_image', true);
                            $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
                            $product_subheading = get_post_meta(get_the_ID(), 'product_subheading', true);
                            $product_price = get_post_meta(get_the_ID(), 'price', true);
                            $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
                            ?>
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="product-card <?php echo $card_class; ?>">
                                        <div class="product-card <?php echo $card_class; ?>">
                                            <div class="product-image">
                                                <img src="<?php echo esc_url($main_image); ?>" class="img-fluid"
                                                     alt="">
                                            </div>
                                            <div class="product-overlay">
                                                <div class="product-heading">
                                                    <p><?php echo esc_html($product_subheading); ?></p>
                                                    <h4><?php echo esc_html($product_heading); ?></h4>
                                                </div>
                                                <div class="price-sizes-container container">
                                                    <div class="row flex-md-row flex-row align-items-md-center align-items-flex-start">
                                                        <div class="col-xl-4 col-md-5 col-6 d-flex">
                                                            <div class="right-side">
                                                                <div class="price">
                                                                    <p><?php
                                                                        if (!empty($product_price)) {
                                                                            echo $product_price . '&euro;';
                                                                        } ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-md-7 col-6 divider">
                                                            <div class="sizes">
                                                                <h4>Dostupné veľkosti:</h4>
                                                                <ul>
                                                                    <?php
                                                                    if (isset($product_sizing) && is_array($product_sizing)) {
                                                                        foreach ($product_sizing as $size) {
                                                                            echo '<li>';
                                                                            echo '<p>' . esc_html($size) . '</p>';
                                                                            echo '</li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                            </div>
                            <?php
                        }
                    else :
                        echo '<p class="no-products-message">No products found in this category.</p>';
                    endif;

                    // Always remember to reset the global post data after a custom loop!
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="loadMoreButton d-flex justify-content-center">
                    <?php
                    $load_more_text = get_post_meta(get_the_ID(), 'load_more_text', true);
                    ?>
                    <button class="load-more"><?php echo esc_html($load_more_text); ?></button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="women-suit" role="tabpanel" aria-labelledby="women-suit-tab">
            <div class="container product-cards-cont">
                <div class="row">
                    <?php
                    // Product type
                    $product_type = 'women-suit';

                    // First query: Fetch the shown cards
                    $argsShown = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryShown = new WP_Query($argsShown);

                    // Second query: Fetch the hidden cards
                    $argsHidden = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '!='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryHidden = new WP_Query($argsHidden);

                    // Merge the two sets of posts
                    $merged_posts = array_merge($queryShown->posts, $queryHidden->posts);

                    // Check if there are posts
                    if (!empty($merged_posts)) :
                        // Loop through the merged posts to display them
                        foreach ($merged_posts as $post) {
                            setup_postdata($post);

                            $product_card_status = get_post_meta(get_the_ID(), 'product_card', true);
                            $card_class = ($product_card_status == 'Show') ? 'shownCards' : 'hidden-prod';
                            $main_image = get_post_meta(get_the_ID(), 'main_image', true);
                            $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
                            $product_subheading = get_post_meta(get_the_ID(), 'product_subheading', true);
                            $product_price = get_post_meta(get_the_ID(), 'price', true);
                            $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
                            ?>
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="product-card <?php echo $card_class; ?>">
                                        <div class="product-image">
                                            <img src="<?php echo esc_url($main_image); ?>" class="img-fluid"
                                                 alt="">
                                        </div>
                                        <div class="product-overlay">
                                            <div class="product-heading">
                                                <p><?php echo esc_html($product_subheading); ?></p>
                                                <h4><?php echo esc_html($product_heading); ?></h4>
                                            </div>
                                            <div class="price-sizes-container container">
                                                <div class="row flex-md-row flex-row align-items-md-center align-items-flex-start">
                                                    <div class="col-xl-4 col-md-5 col-6 d-flex">
                                                        <div class="right-side">
                                                            <div class="price">
                                                                <p><?php
                                                                    if (!empty($product_price)) {
                                                                        echo $product_price . '&euro;';
                                                                    } ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-md-7 col-6 divider">
                                                        <div class="sizes">
                                                            <h4>Dostupné veľkosti:</h4>
                                                            <ul>
                                                                <?php
                                                                if (isset($product_sizing) && is_array($product_sizing)) {
                                                                    foreach ($product_sizing as $size) {
                                                                        echo '<li>';
                                                                        echo '<p>' . esc_html($size) . '</p>';
                                                                        echo '</li>';
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    else :
                        echo '<p class="no-products-message">No products found in this category.</p>';
                    endif;

                    // Always remember to reset the global post data after a custom loop!
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="loadMoreButton d-flex justify-content-center">
                    <?php
                    $load_more_text = get_post_meta(get_the_ID(), 'load_more_text', true);
                    ?>
                    <button class="load-more"><?php echo esc_html($load_more_text); ?></button>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="accessories" role="tabpanel" aria-labelledby="accesories-tab">
            <div class="container product-cards-cont">
                <div class="row">
                    <?php
                    // Product type
                    $product_type = 'accessories';

                    // First query: Fetch the shown cards
                    $argsShown = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryShown = new WP_Query($argsShown);

                    // Second query: Fetch the hidden cards
                    $argsHidden = array(
                        'post_type' => 'products',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'product_card',
                                'value' => 'Show',
                                'compare' => '!='
                            ),
                            array(
                                'key' => 'product_type',
                                'value' => $product_type,
                                'compare' => '='
                            ),
                        )
                    );

                    $queryHidden = new WP_Query($argsHidden);

                    // Merge the two sets of posts
                    $merged_posts = array_merge($queryShown->posts, $queryHidden->posts);

                    // Check if there are posts
                    if (!empty($merged_posts)) :
                        // Loop through the merged posts to display them
                        foreach ($merged_posts as $post) {
                            setup_postdata($post);

                            $product_card_status = get_post_meta(get_the_ID(), 'product_card', true);
                            $card_class = ($product_card_status == 'Show') ? 'shownCards' : 'hidden-prod';
                            $main_image = get_post_meta(get_the_ID(), 'main_image', true);
                            $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
                            $product_subheading = get_post_meta(get_the_ID(), 'product_subheading', true);
                            $product_price = get_post_meta(get_the_ID(), 'price', true);
                            $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
                            ?>
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <div class="product-card <?php echo $card_class; ?>">
                                        <div class="product-image">
                                            <img src="<?php echo esc_url($main_image); ?>" class="img-fluid"
                                                 alt="">
                                        </div>
                                        <div class="product-overlay">
                                            <div class="product-heading">
                                                <p><?php echo esc_html($product_subheading); ?></p>
                                                <h4><?php echo esc_html($product_heading); ?></h4>
                                            </div>
                                            <div class="price-sizes-container container">
                                                <div class="row flex-md-row flex-row align-items-md-center align-items-flex-start">
                                                    <div class="col-xl-4 col-md-5 col-6 d-flex">
                                                        <div class="right-side">
                                                            <div class="price">
                                                                <p><?php
                                                                    if (!empty($product_price)) {
                                                                        echo $product_price . '&euro;';
                                                                    } ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-md-7 col-6 divider">
                                                        <div class="sizes">
                                                            <h4>Dostupné veľkosti:</h4>
                                                            <ul>
                                                                <?php
                                                                if (isset($product_sizing) && is_array($product_sizing)) {
                                                                    foreach ($product_sizing as $size) {
                                                                        echo '<li>';
                                                                        echo '<p>' . esc_html($size) . '</p>';
                                                                        echo '</li>';
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    else :
                        echo '<p class="no-products-message">No products found in this category.</p>';
                    endif;

                    // Always remember to reset the global post data after a custom loop!
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="loadMoreButton d-flex justify-content-center">
                    <?php
                    $load_more_text = get_post_meta(get_the_ID(), 'load_more_text', true);
                    ?>
                    <button class="load-more"><?php echo esc_html($load_more_text); ?></button>
                </div>
            </div>
        </div>
        </div>
        </div>
        </section>
        <div class="back-image-sect">
            <?php
            $default_about_page_id = 39;
            $current_language_about_page_id = pll_get_post($default_about_page_id);

            if ($current_language_about_page_id !== null) {
                $about_page_id = $current_language_about_page_id;
            } else {
                // Handle the case when the translation is not found.
                echo "About page translation not found.";
                return;
            }

            $about_logo_image = get_post_meta($about_page_id, 'about_logo_image', true);
            $about_background_image = get_post_meta($about_page_id, 'about_background_image', true);
            $about_image_text = get_post_meta($about_page_id, 'about_image_text', true);
            ?>

            <div class="bg-image"
                 style="background-image: url('<?php echo esc_url($about_background_image); ?>');">
                <div class="container theflexes">
                    <div class="logo">
                        <img src="<?php echo esc_url($about_logo_image); ?>" class="img-fluid" alt="Logo">
                    </div>
                    <div class="text-block">
                        <?php echo esc_html($about_image_text); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-section">
            <?php
            $about_image_block = get_post_meta($about_page_id, 'about_image_block', true);
            $about_contact_info_block = get_post_meta($about_page_id, 'about_contact_info_block', true);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1 col-12 order-2">
                        <div class="photo-wrapper">
                            <img src="<?php echo esc_url($about_image_block); ?>"
                                 class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 col-12 d-flex align-items-center">
                        <div class="contact-info">
                            <?php echo wp_kses_post($about_contact_info_block); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="additional-section">
            <?php
            $about_section_block_1 = get_post_meta($about_page_id, 'about_section_block_1', true);
            $about_section_block_2 = get_post_meta($about_page_id, 'about_section_block_2', true);
            $about_end_page_image = get_post_meta($about_page_id, 'about_end_page_image', true);
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 order-md-2 col-12 order-1">
                        <div class="block-text-1">
                            <?php echo wp_kses_post($about_section_block_1); ?>
                        </div>
                        <div class="block-text-2">
                            <?php echo wp_kses_post($about_section_block_2); ?>
                        </div>
                        <div class="image-end-page">
                            <img src="<?php echo esc_url($about_end_page_image); ?>" class="img-fluid"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
// get footer.php file
        get_footer();
        ?>
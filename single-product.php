<?php
/*
Template Name: Product page template
*/
?>
<?php
// get header.php file
get_header();
?>
<div class="product">
    <div class="prod-container">
        <!-- Laptop part -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="product-image">
                    <?php
                    $main_image_url = get_post_meta(get_the_ID(), 'main_image', true);
                    if (!empty($main_image_url)) {
                        echo '<img src="' . esc_url($main_image_url) . '" class="img-fluid" alt="">';
                    }
                    ?>
                </div>
                <div class="mobile-lift-up-block"></div>
                <div class="carousel-mobile-dots">
                    <span class="active"></span>
                </div>
            </div>
            <div class="col-md-6 col-12 remove-relative">
                <div class="product-description">
                    <div class="mob-chevron-button">
                        <button class="mobile-chevron"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/chevron-up.svg"
                                    class="img-fluid" alt=""></button>
                        </button>

                    </div>
                    <div class="mobile-price-prod-name">
                        <div class="product-name">
                            <p>
                                <?php echo pll__(get_post_meta(get_the_ID(), 'product_subheading', true), 'rissutei2op'); ?>
                            </p>

                            <h4><?php
                                $product_heading = get_post_meta(get_the_ID(), 'product_heading', true);
                                if (!empty($product_heading)) {
                                    echo $product_heading;
                                }
                                ?></h4>
                        </div>
                        <div class="price">
                            <p><?php
                                $price = get_post_meta(get_the_ID(), 'price', true);
                                if (!empty($price)) {
                                    echo $price . '€';
                                }
                                ?></p>
                        </div>
                    </div>
                    <div class="colors-sizes">
                        <div class="colors">
                            <div class="color-name-mobile">
                                <p><?php echo pll__('Dostupné farba:', 'rissutei2op'); ?></p>
                            </div>
                            <div class="color-group">
                                <?php
                                $colors = get_post_meta(get_the_ID(), 'colors', true);
                                if (!empty($colors)) {
                                    $first_color = true;
                                    foreach ($colors as $color) {
                                        $color_lowercase = strtolower($color);
                                        $active_class = $first_color ? ' active' : '';
                                        ?>
                                        <div class="color<?php echo $active_class; ?>">
                                            <div class="color-name">
                                                <span><?php echo pll__($color, 'rissutei2op'); ?></span>
                                            </div>
                                            <div class="color-circle">
                                                <span class="color-<?php echo $color_lowercase; ?>"></span>
                                            </div>
                                        </div>
                                        <?php
                                        $first_color = false;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="sizes">
                            <div class="container-sizes">
                                <h4><?php echo pll__('Dostupné veľkosti:', 'rissutei2op'); ?></h4>
                                <ul>
                                    <?php
                                    $product_sizing = get_post_meta(get_the_ID(), 'sizing', true);
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
                    <div class="orderProductButton d-flex justify-content-center">
                        <a href="<?php
                        $order_link_redirect = get_post_meta(get_the_ID(), 'order_link_redirect', true);
                        if (!empty($order_link_redirect)) {
                            echo $order_link_redirect;
                        }
                        ?>">
                            <button class="order-btn">
                                <?php echo pll__('Objednať', 'rissutei2op'); ?>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="secondary-information-block">
            <div class="three-tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#popis"
                           role="tab"
                           aria-controls="pills-popis"
                           aria-selected="true"><?php echo pll__('POPIS', 'rissutei2op'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#podrobnosti"
                           role="tab"
                           aria-controls="pills-podrobnosti"
                           aria-selected="false"><?php echo pll__('PODROBNOSTI', 'rissutei2op'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#dodanie"
                           role="tab"
                           aria-controls="pills-dodanie"
                           aria-selected="false"><?php echo pll__('DODANIE', 'rissutei2op'); ?></a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active mobile-content" id="popis" role="tabpanel"
                         aria-labelledby="pills-popis-tab">
                        <p><?php
                            $description = get_post_meta(get_the_ID(), 'description', true);
                            if (!empty($description)) {
                                echo $description;
                            }
                            ?></p>
                    </div>
                    <div class="tab-pane fade mobile-content" id="podrobnosti" role="tabpanel"
                         aria-labelledby="pills-podrobnosti-tab">
                        <p><?php
                            $more_info = get_post_meta(get_the_ID(), 'more_info', true);
                            if (!empty($more_info)) {
                                echo $more_info;
                            }
                            ?></p>
                    </div>
                    <div class="tab-pane fade mobile-content" id="dodanie" role="tabpanel"
                         aria-labelledby="pills-dodanie-tab">
                        <p><?php
                            $extra_info = get_post_meta(get_the_ID(), 'extra_info', true);
                            if (!empty($extra_info)) {
                                echo $extra_info;
                            }
                            ?></p>
                    </div>
                </div>
            </div>
            <div class="additional-images">
                <div class="block-of-images">
                    <?php
                    $additional_images_meta = get_post_meta(get_the_ID(), 'additional_images', true);
                    if (!empty($additional_images_meta)) {
                        $additional_images = explode(',', $additional_images_meta);
                        if (!empty($additional_images) && is_array($additional_images)) {
                            foreach ($additional_images as $image_id) {
                                $image_url = wp_get_attachment_url($image_id);
                                echo '<div class="additional-image"><img src="' . esc_url($image_url) . '" class="img-fluid" alt=""></div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// get footer.php file
get_footer();
?>

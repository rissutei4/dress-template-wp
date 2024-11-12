<?php

/**
 *
 *      Template Name : functions.php
 *      Description: Add features to wordpress theme
 *
 */

function fn_theme_supports()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'fn_theme_supports');

function mytheme_enqueue_styles()
{
    wp_enqueue_style('header-footer-style', get_template_directory_uri() . '/assets/css/header-yes_footer.css');
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function enqueue_custom_styles_and_scripts()
{
    // Enqueue styles for index.php
    if (is_front_page()) {
        wp_enqueue_style('styles', get_template_directory_uri() . '/style.css', array(), '1.0.0');
        wp_enqueue_style('media-query', get_template_directory_uri() . '/assets/css/media-query.css', array('styles'), '1.0.0');
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4');
        wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4');
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.1.1');
        wp_enqueue_style('about-me', get_template_directory_uri() . '/assets/css/about-me.css', array(), '1.0.0');
    }
    //Enqueue scripts for index.php
    if (is_front_page()) {
        wp_enqueue_script('jquery-3.6.3', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), '3.6.3', true);
        wp_enqueue_script('jquery-slim', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js', array(), '3.5.1', true);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery-slim'), '1.0.0', true);
        wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery-slim'), '1.0.0', true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery-slim'), '1.0.0', true);
        wp_enqueue_script('owl-script', get_template_directory_uri() . '/assets/js/script-owl-car.js', array('jquery-slim'), '1.0.0', true);
        wp_enqueue_script('mobile-filter', get_template_directory_uri() . '/assets/js/mobile-filter.js', array('jquery-slim'), '1.0.0', true);
    }

    // Enqueue styles for order.php
    if (is_page_template('order-page.php')) {
        wp_enqueue_style('order', get_template_directory_uri() . '/assets/css/order.css', array(), '1.0.0');
    }

    // Enqueue scripts for order.php
    if (is_page_template('order-page.php')) {
        wp_enqueue_script('jquery-3.6.3', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), '3.6.3', true);
        wp_enqueue_script('jquery-slim', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js', array(), '3.5.1', true);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery-slim'), '1.0.0', true);
    }
    //Enqueue styles for about.php
    if (is_page_template('about.php')) {
        wp_enqueue_style('about-me', get_template_directory_uri() . '/assets/css/about-me.css', array(), '1.0.0');
    }

    //Enqueue scripts for about.php
    if (is_page_template('about.php')) {
        wp_enqueue_script('jquery-3.6.3', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), '3.6.3', true);
        wp_enqueue_script('jquery-slim', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js', array(), '3.5.1', true);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery-slim'), '1.0.0', true);
    }
    // Enqueue styles for single-product.php
    if (is_singular('products')) {
        wp_enqueue_style('product-page', get_template_directory_uri() . '/assets/css/product.css', array(), '1.0.0');
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4');
        wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4');
        wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.1.1');
    }
    //Script for single-product
    if (is_singular('products')) {
        wp_enqueue_script('jquery-3.6.3', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), '3.6.3', true);
        wp_register_script('jquery-slim', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array('jquery'), '3.5.1', true);
        wp_enqueue_script('prod-page', get_template_directory_uri() . '/assets/js/product-page.js', array('jquery-slim'), '1.0.0', true);
        wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery-slim'), '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'language-switcher-menu' => __('Language Switcher Menu')
        )
    );
}

add_action('init', 'register_my_menus');

function update_customizer_site_title($title, $sep)
{
    if (is_customize_preview()) {
        $site_title = get_theme_mod('customizer_site_title', ''); // Change 'customizer_site_title' to the actual setting ID used in the Customizer
        if (!empty($site_title)) {
            $title = $site_title . ' ' . $sep . ' ';
        }
    }
    return $title;
}

add_filter('wp_title', 'update_customizer_site_title', 10, 2);

class CustomNavWalker extends Walker_Nav_Menu
{

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'nav-items';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = 'nav-link';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


function add_language_switcher_walker($args)
{
    // Add custom walker
    $args['walker'] = new Language_Switcher_Walker();
    return $args;
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

class Language_Switcher_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp;

        // Check if the current menu is 'menu-languageswitchermenu'
        if ($args->theme_location == 'language-switcher-menu') {
            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $classes[] = 'languageElem';

            // Add the active class if this is the current language
            if (function_exists('pll_current_language') && $item->lang == pll_current_language()) {
                $classes[] = 'active';
            }
        } else {
            $classes = empty($item->classes) ? array() : (array)$item->classes;
        }


        $output .= '<li class="' . esc_attr(implode(' ', $classes)) . '">';

        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = '';
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['lang'] = $item->lang;
        $atts['dir'] = $item->dir;
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

function set_custom_nav_walker($args)
{
    if ($args['theme_location'] == 'header-menu') {
        $args['walker'] = new CustomNavWalker();
    } elseif ($args['theme_location'] == 'language-switcher-menu') {
        $args['walker'] = new Language_Switcher_Walker();
    }
    return $args;
}

add_filter('wp_nav_menu_args', 'set_custom_nav_walker');


function create_custom_post_type()
{
    register_post_type('products',
        array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Product')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );

    // Register the custom single product template
    add_filter('template_include', 'custom_single_product_template', 99);

    function custom_single_product_template($template)
    {
        global $post;

        if (isset($post) && $post->post_type == 'products') {
            $template = get_template_directory() . '/single-product.php';
        }

        return $template;
    }
}

add_action('init', 'create_custom_post_type');


function add_custom_metaboxes()
{
    add_meta_box(
        'product_meta',
        __('Product Custom Fields'),
        'product_meta_callback',
        'products'
    );
}

add_action('add_meta_boxes', 'add_custom_metaboxes');


function product_meta_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'product_nonce');
    $product_stored_meta = get_post_meta($post->ID);
    $additional_images = get_post_meta($post->ID, 'additional_images', true);
    ?>
    <style>
        p, label, li, input, option {
            font-size: 16px;
            font-family: "Open Sans";
        }

        p {
            font-style: italic;
        }

        h4 {
            font-size: 17px;
            font-family: "Open Sans";
            font-weight: bold;
        }
    </style>
    <div>
        <h4>Вибір категорії сукні</h4>
        <label for="product_type"><?php echo pll__('Type of the Dress:', 'rissutei2op'); ?></label>
        <select name="product_type" id="product_type">
            <option value="wedding-dress" <?php if (isset ($product_stored_meta['product_type'])) selected($product_stored_meta['product_type'][0], 'wedding-dress'); ?>>
                <?php echo pll__('Wedding Dress', 'rissutei2op'); ?>
            </option>
            <option value="evening-dress" <?php if (isset ($product_stored_meta['product_type'])) selected($product_stored_meta['product_type'][0], 'evening-dress'); ?>>
                <?php echo pll__('Evening Dress', 'rissutei2op'); ?>
            </option>
            <option value="child-dress" <?php if (isset ($product_stored_meta['product_type'])) selected($product_stored_meta['product_type'][0], 'child-dress'); ?>>
                <?php echo pll__("Children's Dress", 'rissutei2op'); ?>
            </option>
            <option value="women-suit" <?php if (isset ($product_stored_meta['product_type'])) selected($product_stored_meta['product_type'][0], 'women-suit'); ?>>
                <?php echo pll__("Women's Suit", 'rissutei2op'); ?>
            </option>
            <option value="accessories" <?php if (isset ($product_stored_meta['product_type'])) selected($product_stored_meta['product_type'][0], 'accessories'); ?>>
                <?php echo pll__('Accessories', 'rissutei2op'); ?>
            </option>
        </select>
    </div>


    <div>
        <h4 for="product_card">Product card show or hide:</h4>
        <h4 for="product_card">Показати або сховати картку товару:</h4>
        <p>Виберіть, чи хочете, щоб сукня відображалася одразу на сторінці (Show), або після того, як користувач натисне
            "Завантажити
            більше". (Hide)</p>
        <select name="product_card" id="product_card">
            <option value="Show" <?php if (isset ($product_stored_meta['product_card'])) selected($product_stored_meta['product_card'][0], 'Show'); ?>>
                Show
            </option>
            <option value="Hide" <?php if (isset ($product_stored_meta['product_card'])) selected($product_stored_meta['product_card'][0], 'Hide'); ?>>
                Hide
            </option>
        </select>
    </div>

    <div>
        <h4><label for="product_subheading"><?php echo pll__('Product subheading:', 'rissutei2op'); ?></label></h4>
        <p>Виберіть тут такий самий варіант, як і в категорії</p>
        <select name="product_subheading" id="product_subheading">
            <option value="Svadobné šaty" <?php if (isset ($product_stored_meta['product_subheading'])) selected($product_stored_meta['product_subheading'][0], 'Svadobné šaty'); ?>>
                <?php echo pll__('Svadobné šaty', 'rissutei2op'); ?>
            </option>
            <option value="Večerné šaty" <?php if (isset ($product_stored_meta['product_subheading'])) selected($product_stored_meta['product_subheading'][0], 'Večerné šaty'); ?>>
                <?php echo pll__('Večerné šaty', 'rissutei2op'); ?>
            </option>
            <option value="Detské šaty" <?php if (isset ($product_stored_meta['product_subheading'])) selected($product_stored_meta['product_subheading'][0], 'Detské šaty'); ?>>
                <?php echo pll__('Detské šaty', 'rissutei2op'); ?>
            </option>
            <option value="Dámsky kostým" <?php if (isset ($product_stored_meta['product_subheading'])) selected($product_stored_meta['product_subheading'][0], 'Dámsky kostým'); ?>>
                <?php echo pll__('Dámsky kostým', 'rissutei2op'); ?>
            </option>
            <option value="Príslušenstvo" <?php if (isset ($product_stored_meta['product_subheading'])) selected($product_stored_meta['product_subheading'][0], 'Príslušenstvo'); ?>>
                <?php echo pll__('Príslušenstvo', 'rissutei2op'); ?>
            </option>
        </select>
    </div>
    <div>
        <h4><label for="product_heading">Назва продукта:</label></h4>
        <input type="text" name="product_heading" id="product_heading"
               value="<?php if (isset ($product_stored_meta['product_heading'])) echo $product_stored_meta['product_heading'][0]; ?>">
    </div>

    <div>
        <h4><label for="price">Ціна:</label></h4>
        <input type="text" name="price" id="price"
               value="<?php if (isset ($product_stored_meta['price'])) echo $product_stored_meta['price'][0]; ?>">
        <span class="currency">€</span>
    </div>

    <div>
        <h4><label for="colors"><?php echo pll__('Colors:', 'rissutei2op'); ?></label></h4>
        <ul>
            <li><input type="checkbox" name="colors[]"
                       value="Gold" <?php if (isset ($product_stored_meta['colors']) && in_array('Gold', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('Gold', 'rissutei2op'); ?>
            </li>
            <li><input type="checkbox" name="colors[]"
                       value="Black" <?php if (isset ($product_stored_meta['colors']) && in_array('Black', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('Black', 'rissutei2op'); ?>
            </li>
            <li><input type="checkbox" name="colors[]"
                       value="White" <?php if (isset ($product_stored_meta['colors']) && in_array('White', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('White', 'rissutei2op'); ?>
            </li>
            <li><input type="checkbox" name="colors[]"
                       value="Purple" <?php if (isset ($product_stored_meta['colors']) && in_array('Purple', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('Purple', 'rissutei2op'); ?>
            </li>
            <li><input type="checkbox" name="colors[]"
                       value="Yellow" <?php if (isset ($product_stored_meta['colors']) && in_array('Yellow', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('Yellow', 'rissutei2op'); ?>
            </li>
            <li><input type="checkbox" name="colors[]"
                       value="Blue" <?php if (isset ($product_stored_meta['colors']) && in_array('Blue', $product_stored_meta['colors'])) echo 'checked'; ?>>
                <?php echo pll__('Blue', 'rissutei2op'); ?>
            </li>
        </ul>
    </div>
    <div>
        <label for="sizing" style="font-size: 15px; color: black; font-weight: bold;">Sizes:</label>
        <ul>
            <li><input type="checkbox" name="sizing[]"
                       value="36" <?php if (isset ($product_stored_meta['sizing']) && in_array('36', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                36
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="37" <?php if (isset ($product_stored_meta['sizing']) && in_array('37', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                37
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="38" <?php if (isset ($product_stored_meta['sizing']) && in_array('38', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                38
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="39" <?php if (isset ($product_stored_meta['sizing']) && in_array('39', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                39
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="40" <?php if (isset ($product_stored_meta['sizing']) && in_array('40', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                40
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="41" <?php if (isset ($product_stored_meta['sizing']) && in_array('41', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                41
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="42" <?php if (isset ($product_stored_meta['sizing']) && in_array('42', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                42
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="43" <?php if (isset ($product_stored_meta['sizing']) && in_array('43', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                43
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="44" <?php if (isset ($product_stored_meta['sizing']) && in_array('44', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                44
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="45" <?php if (isset ($product_stored_meta['sizing']) && in_array('45', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                45
            </li>
            <li><input type="checkbox" name="sizing[]"
                       value="46" <?php if (isset ($product_stored_meta['sizing']) && in_array('46', $product_stored_meta['sizing'])) echo 'checked'; ?>>
                46
            </li>
        </ul>
        <script>
            window.onload = function () {
                var checkedValues = JSON.parse(localStorage.getItem('checkedColors')) || [];

                var checkboxes = document.querySelectorAll('input[type="checkbox"][name="colors[]"]');

                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = checkedValues.includes(checkbox.value);

                    checkbox.addEventListener('change', function () {
                        if (checkbox.checked) {
                            checkedValues.push(checkbox.value);
                        } else {
                            var index = checkedValues.indexOf(checkbox.value);
                            if (index > -1) {
                                checkedValues.splice(index, 1);
                            }
                        }

                        localStorage.setItem('checkedColors', JSON.stringify(checkedValues));
                    });
                });
                // When the page loads, get the saved checkbox state from localStorage
                var checkedValues = JSON.parse(localStorage.getItem('checkedValues')) || [];

                var checkboxes = document.querySelectorAll('input[type="checkbox"][name="sizing[]"]');

                checkboxes.forEach(function (checkbox) {
                    // Set the checked state of each checkbox based on the saved data
                    checkbox.checked = checkedValues.includes(checkbox.value);

                    // Listen for changes to the checkbox state
                    checkbox.addEventListener('change', function () {
                        if (checkbox.checked) {
                            // If the checkbox is checked, add its value to the array
                            checkedValues.push(checkbox.value);
                        } else {
                            // If the checkbox is unchecked, remove its value from the array
                            var index = checkedValues.indexOf(checkbox.value);
                            if (index > -1) {
                                checkedValues.splice(index, 1);
                            }
                        }

                        // Save the updated checkbox state to localStorage
                        localStorage.setItem('checkedValues', JSON.stringify(checkedValues));
                    });
                });
            }
        </script>
    </div>
    <div style="display: flex; flex-direction: column;">
        <h4 for="order_link_redirect">Посилання на сторінку для
            оформлення
            замовлення:</h4>
        <label for="order_link_redirect">Приклад: Словацька версія сторінки для
            перегляду сайту,
            посилання должно направляти на сторінку з замовленням на словацькій мові</label>
        <input type="text" name="order_link_redirect" id="order_link_redirect"
               value="<?php if (isset ($product_stored_meta['order_link_redirect'])) echo $product_stored_meta['order_link_redirect'][0]; ?>">
    </div>
    <div>
        <h4 for="main_image">Головне фото:</h4><br>
        <p>Вибір головного зображення продукту (відображатиметься на картці та як перше зображення на сторінці
            продукту)</p>
        <?php
        $main_image_url = '';
        if (isset($product_stored_meta['main_image'])) {
            $main_image_url = esc_attr($product_stored_meta['main_image'][0]);
        }
        ?>
        <img src="<?php echo $main_image_url; ?>" class="main_image_preview" width="300px" height="400px">
        <input type="hidden" name="main_image" id="main_image" value="<?php echo $main_image_url; ?>">
        <input type="button" class="button button-secondary" value="Upload Main Image" id="upload_main_image">
    </div>
    <div>
        <h4><strong>Додати додаткові зображення</strong></h4>

        <!-- Create a hidden input to store the value of the custom field -->
        <input type="hidden" id="additional_images" name="additional_images"
               value="<?php echo esc_attr($additional_images); ?>"/>

        <!-- Create the Add Multiple Images button -->
        <button type="button" id="upload_additional_images_button" class="button">Add Multiple Images</button>

        <!-- Create the Remove Images button -->
        <button type="button" id="remove_additional_images_button" class="button">Remove Images</button>

        <!-- Div to display the previews of selected images -->
        <div id="additional_images_preview">
            <?php
            if ($additional_images) {
                $images = explode(',', $additional_images);
                foreach ($images as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    echo '<img src="' . esc_url($image_url) . '" style="max-width: 100px; height: auto; margin: 10px;"/>';
                }
            }
            ?>
        </div>
    </div>


    <div><h4 for="description">Опис:</h4><br>
        <textarea name="description"
                  id="description"
                  style="width: 100%; height: 200px;"><?php if (isset ($product_stored_meta['description'])) echo esc_attr($product_stored_meta['description'][0]); ?></textarea>
    </div>
    <div><h4 for="more_info">More info:</h4><br>
        <textarea name="more_info" id="more_info"
                  class="more_info"
                  style="width: 100%; height: 200px;"><?php if (isset ($product_stored_meta['more_info'])) echo esc_attr($product_stored_meta['more_info'][0]); ?></textarea>
        <br>
        <p><b>Щоб написати у вигляді списку, потрібно вставити такий текст у текстове поле:</b> <br>
            &lt;ul&gt;
            <br>
            &lt;li&gt;Напишіть те, що хочете бачити тут&lt;/li&gt;
            <br>
            &lt;li&gt;Просто ще один eлемент списка для прикладу&lt;/li&gt;
            <br>
            &lt;/ul&gt;
        </p>
    </div>
    <div><h4 for="extra_info">Extra information:</h4><br>
        <textarea name="extra_info"
                  id="extra_info"
                  style="width: 100%; height: 200px;"><?php if (isset ($product_stored_meta['extra_info'])) echo esc_attr($product_stored_meta['extra_info'][0]); ?></textarea>
    </div>
    <?php
}

function save_product_meta($post_id, $post)
{
    // Verify the nonce before proceeding.
    if (!isset($_POST['product_nonce']) || !wp_verify_nonce($_POST['product_nonce'], basename(__FILE__)))
        return $post_id;

    // Get the post type object.
    $post_type = get_post_type_object($post->post_type);

    // Check if the current user has permission to edit the post.
    if (!current_user_can($post_type->cap->edit_post, $post_id))
        return $post_id;

    // Define the meta keys to save.
    $meta_keys = array(
        'product_type',
        'product_card',
        'product_subheading',
        'product_heading',
        'price',
        'colors',
        'sizing',
        'main_image',
        'additional_images',
        'description',
        'more_info',
        'extra_info',
        'order_link_redirect'
    );

    // Loop through the meta keys and save their values.
    foreach ($meta_keys as $meta_key) {
        $meta_value = get_post_meta($post_id, $meta_key, true);
        $new_meta_value = isset($_POST[$meta_key]) ? $_POST[$meta_key] : '';

        // Serialize the additional images array before saving
        if ($meta_key === 'additional_images' && is_array($new_meta_value)) {
            $new_meta_value = serialize($new_meta_value);
        } elseif (is_array($new_meta_value)) { // Keep this for other non-serialized arrays
            $new_meta_value = array_map('sanitize_text_field', $new_meta_value);
        } elseif ($meta_key === 'description' || $meta_key === 'more_info' || $meta_key === 'extra_info') {
            $new_meta_value = wp_kses_post($new_meta_value);
        } else {
            $new_meta_value = sanitize_text_field($new_meta_value);
        }

        if ($new_meta_value && '' == $meta_value)
            add_post_meta($post_id, $meta_key, $new_meta_value, true);

        elseif ($new_meta_value && $new_meta_value != $meta_value)
            update_post_meta($post_id, $meta_key, $new_meta_value);

        elseif ('' == $new_meta_value && $meta_value)
            delete_post_meta($post_id, $meta_key, $meta_value);
    }
}

add_action('save_post', 'save_product_meta', 10, 2);


function my_theme_enqueue_admin_assets($hook)
{
    global $post;

    // Check if you are on the edit page or new post page of the 'products' post type.
    if (('post.php' === $hook || 'post-new.php' === $hook) && 'products' === $post->post_type) {
        // Enqueue the media uploader script.
        wp_enqueue_media();

        // Enqueue your custom admin script.
        wp_enqueue_script('product-post-scripts', get_template_directory_uri() . '/assets/js/product-post-scripts.js', array('jquery'), '1.0.0', true);
    }
}

add_action('admin_enqueue_scripts', 'my_theme_enqueue_admin_assets');

//Translations for Polylang Products custom type fields:
function polylang_translate_incompatible_strings($translated, $untranslated, $domain)
{
    if ($domain === 'rissutei2op') {
        return pll__($translated);
    }

    return $translated;
}

add_filter('gettext', 'polylang_translate_incompatible_strings', 999, 3);

add_action('init', function () {
    pll_register_string('rissutei2op', 'Type of the Dress:', 'Products');
    pll_register_string('rissutei2op', 'Evening Dress', 'Products');
    pll_register_string('rissutei2op', 'Wedding Dress', 'Products');
    pll_register_string('rissutei2op', "Children's Dress", 'Products');
    pll_register_string('rissutei2op', "Women's Suit", 'Products');
    pll_register_string('rissutei2op', 'Accessories', 'Products');
    pll_register_string('rissutei2op', 'Product subheading:', 'Products');
    pll_register_string('rissutei2op', 'Večerné šaty', 'Products');
    pll_register_string('rissutei2op', 'Svadobné šaty', 'Products');
    pll_register_string('rissutei2op', 'Detské šaty', 'Products');
    pll_register_string('rissutei2op', 'Dámsky kostým', 'Products');
    pll_register_string('rissutei2op', 'Príslušenstvo', 'Products');
    pll_register_string('rissutei2op', 'Colors:', 'Products');
    pll_register_string('rissutei2op', 'Gold', 'Products');
    pll_register_string('rissutei2op', 'Black', 'Products');
    pll_register_string('rissutei2op', 'White', 'Products');
    pll_register_string('rissutei2op', 'Purple', 'Products');
    pll_register_string('rissutei2op', 'Yellow', 'Products');
    pll_register_string('rissutei2op', 'Blue', 'Products');
    pll_register_string('rissutei2op', 'Dostupné farba:', 'Product template');
    pll_register_string('rissutei2op', 'Dostupné veľkosti:', 'Product template');
    pll_register_string('rissutei2op', 'Objednať', 'Product template');
    pll_register_string('rissutei2op', 'POPIS', 'Product template');
    pll_register_string('rissutei2op', 'PODROBNOSTI', 'Product template');
    pll_register_string('rissutei2op', 'DODANIE', 'Product template');
}, 9999);


// Register custom fields
function index_page_custom_fields()
{
    global $post;

    if ($post && 'index.php' === get_page_template_slug($post->ID)) {
        add_meta_box(
            'index_page_fields',
            'Index Page Fields',
            'index_page_fields_callback',
            'page',
            'normal',
            'high'
        );
    }
}

add_action('add_meta_boxes', 'index_page_custom_fields');


// Display custom fields
function index_page_fields_callback($post)
{
    // Use nonce for verification
    wp_nonce_field(basename(__FILE__), 'index_page_nonce');

    // Get values from the database
    echo '<p>Post ID: ' . $post->ID . '</p>';
    $carousel_heading_slide_1 = get_post_meta($post->ID, 'carousel_heading_slide_1', true);
    $carousel_heading_slide_2 = get_post_meta($post->ID, 'carousel_heading_slide_2', true);
    $carousel_heading_slide_3 = get_post_meta($post->ID, 'carousel_heading_slide_3', true);
    $carousel_heading_slide_4 = get_post_meta($post->ID, 'carousel_heading_slide_4', true);

    $carousel_content_slide1 = get_post_meta($post->ID, 'carousel_content_slide1', true);
    $carousel_content_slide2 = get_post_meta($post->ID, 'carousel_content_slide2', true);
    $carousel_content_slide3 = get_post_meta($post->ID, 'carousel_content_slide3', true);
    $carousel_content_slide4 = get_post_meta($post->ID, 'carousel_content_slide4', true);

    $carousel_image_slide_1 = get_post_meta($post->ID, 'carousel_image_slide_1', true);
    $carousel_image_slide_2 = get_post_meta($post->ID, 'carousel_image_slide_2', true);
    $carousel_image_slide_3 = get_post_meta($post->ID, 'carousel_image_slide_3', true);
    $carousel_image_slide_4 = get_post_meta($post->ID, 'carousel_image_slide_4', true);

    $carousel_change_button_text = get_post_meta($post->ID, 'carousel_change_button_text', true);

    $carousel_change_bubble_text = get_post_meta($post->ID, 'carousel_change_bubble_text', true);

    $dress_tabs_names = get_post_meta($post->ID, 'dress_tabs_names', true) ?: [];
    $load_more_text = get_post_meta($post->ID, 'load_more_text', true);
    $carousel_change_bubble_link = get_post_meta($post->ID, 'carousel_change_bubble_link', true);

    echo '    <style>
        p, label, li, input, option{
            font-size: 16px;
            font-family: "Open Sans";
        }

        p {
            font-style: italic;
        }

        h4 {
            font-size: 17px;
            font-family: "Open Sans";
            font-weight: bold;
        }
    </style>';
//Carousel Slide 1
    echo '<h4>Налаштування для слайдів для каруселі</h4>';
    echo '<p style="width:50%;"><label for="carousel_heading_slide_1">Carousel Заголовок Slide 1:</label><br><input type="text" style="width:100%; min-height: 20px;" id="carousel_heading_slide_1" name="carousel_heading_slide_1" value="' . esc_attr($carousel_heading_slide_1) . '"></p>';
    echo '<p style="width:50%;><label for="carousel_content_slide1">Carousel Контент Slide 1:</label><br><textarea  style="width:100%; min-height: 150px;" id="carousel_content_slide1" name="carousel_content_slide1">' . esc_textarea($carousel_content_slide1) . '</textarea></p>';
    echo '<p><label for="carousel_image_slide_1">Carousel Зображення Slide 1:</label><br><input type="hidden" id="carousel_image_slide_1" name="carousel_image_slide_1" value="' . esc_attr($carousel_image_slide_1) . '"><input type="button" id="carousel_image_slide_1_button" value="Add Image">
     <div id="carousel_image_slide_1_preview">' . wp_get_attachment_image($carousel_image_slide_1, 'thumbnail') . '</div></p>';

    //Carousel Slide 2
    echo '<p style="width:50%;"><label for="carousel_heading_slide_2">Carousel Заголовок Slide 2:</label><br><input style="width:100%; min-height: 30px; type="text" id="carousel_heading_slide_2" name="carousel_heading_slide_2" value="' . esc_attr($carousel_heading_slide_2) . '"></p>';
    echo '<p style="width:50%;"><label for="carousel_content_slide2">Carousel Контент Slide 2:</label><br><textarea style="width:100%; min-height: 150px;" id="carousel_content_slide2" name="carousel_content_slide2">' . esc_textarea($carousel_content_slide2) . '</textarea></p>';
    echo '<p><label for="carousel_image_slide_2">Carousel Зображення Slide 2:</label><br><input type="hidden" id="carousel_image_slide_2" name="carousel_image_slide_2" value="' . esc_attr($carousel_image_slide_2) . '"><input type="button" id="carousel_image_slide_2_button" value="Add Image">
     <div id="carousel_image_slide_2_preview">' . wp_get_attachment_image($carousel_image_slide_2, 'thumbnail') . '</div></p>';

    //Carousel Slide 3
    echo '<p style="width:50%;"><label for="carousel_heading_slide_3">Carousel Заголовок Slide 3:</label><br><input style="width:100%; min-height: 30px; type="text" id="carousel_heading_slide_3" name="carousel_heading_slide_3" value="' . esc_attr($carousel_heading_slide_3) . '"></p>';
    echo '<p style="width:50%;"><label for="carousel_content_slide2">Carousel Контент Slide 3:</label><br><textarea style="width:100%; min-height: 150px;" id="carousel_content_slide3" name="carousel_content_slide3">' . esc_textarea($carousel_content_slide3) . '</textarea></p>';
    echo '<p><label for="carousel_image_slide_3">Carousel Зображення Slide 3:</label><br><input type="hidden" id="carousel_image_slide_3" name="carousel_image_slide_3" value="' . esc_attr($carousel_image_slide_3) . '"><input type="button" id="carousel_image_slide_3_button" value="Add Image">
     <div id="carousel_image_slide_3_preview">' . wp_get_attachment_image($carousel_image_slide_3, 'thumbnail') . '</div></p>';

    //Carousel Slide 4
    echo '<p style="width:50%;"><label for="carousel_heading_slide_4">Carousel Заголовок Slide 4:</label><br><input style="width:100%; min-height: 30px; type="text" id="carousel_heading_slide_4" name="carousel_heading_slide_4" value="' . esc_attr($carousel_heading_slide_4) . '"></p>';
    echo '<p style="width:50%;"><label for="carousel_content_slide2">Carousel Контент Slide 4:</label><br><textarea style="width:100%; min-height: 150px;" id="carousel_content_slide4" name="carousel_content_slide4">' . esc_textarea($carousel_content_slide4) . '</textarea></p>';
    echo '<p><label for="carousel_image_slide_4">Carousel Зображення Slide 4:</label><br><input type="hidden" id="carousel_image_slide_4" name="carousel_image_slide_4" value="' . esc_attr($carousel_image_slide_4) . '"><input type="button" id="carousel_image_slide_4_button" value="Add Image">
     <div id="carousel_image_slide_4_preview">' . wp_get_attachment_image($carousel_image_slide_4, 'thumbnail') . '</div></p>';


//Carousel change "More" buttons text
    echo '<p style="width:50%; font-size:15px; font-weight:600; color:black;"><label for="carousel_change_button_text">Зміна тексту в кнопці "Більше" о товарі:</label><br><input style="width:100%; min-height: 20px; type="text" id="carousel_change_button_text" name="carousel_change_button_text" value="' . esc_attr($carousel_change_button_text) . '"></p>';


    //Carousel change bubble buttons text
    echo '<p style="width:50%; font-size:15px; font-weight:600; color:black;"><label for="carousel_change_bubble_text">Зміна тексту в круглій кнопці (Замовлення)</label><br><input style="width:100%; min-height: 20px; type="text" id="carousel_change_bubble_text" name="carousel_change_bubble_text" value="' . esc_attr($carousel_change_bubble_text) . '"></p>';
// Carousel change bubble link
    echo '<p style="width:50%; font-size:15px; font-weight:600; color:black;"><label for="carousel_change_bubble_link">Зміна посилання в круглій кнопці (зараз веде на сторінку замовлення):</label><br><input style="width:100%; min-height: 20px;" type="text" id="carousel_change_bubble_link" name="carousel_change_bubble_link" value="' . esc_attr($carousel_change_bubble_link) . '"></p>';


    // Include JavaScript directly
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        let frame;
        let target_image_input;
        let target_image_preview;

        // Carousel Image Slide 1 Button
        const carouselButton1 = document.getElementById("carousel_image_slide_1_button");
        addCarouselButtonEventListener(carouselButton1, "carousel_image_slide_1");

        // Carousel Image Slide 2 Button
        const carouselButton2 = document.getElementById("carousel_image_slide_2_button");
        addCarouselButtonEventListener(carouselButton2, "carousel_image_slide_2");
 // Carousel Image Slide 3 Button
        const carouselButton3 = document.getElementById("carousel_image_slide_3_button");
        addCarouselButtonEventListener(carouselButton3, "carousel_image_slide_3");

        // Carousel Image Slide 4 Button
        const carouselButton4 = document.getElementById("carousel_image_slide_4_button");
        addCarouselButtonEventListener(carouselButton4, "carousel_image_slide_4");

        function addCarouselButtonEventListener(button, inputId) {
            if (button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();

                    target_image_input = document.getElementById(inputId);
                    target_image_preview = document.getElementById(inputId + "_preview");

                    if (frame) {
                        frame.open();
                        return;
                    }

                    frame = wp.media({
                        title: "Select or Upload an Image",
                        button: {
                            text: "Use this image"
                        },
                        multiple: false
                    });

                    frame.on("select", function() {
                        const attachment = frame.state().get("selection").first().toJSON();
                        target_image_input.value = attachment.id;
                        target_image_preview.innerHTML = "<img src=\"" + attachment.url + "\" width=\"150\"  alt=\"\"/>";
                    });

                    frame.open();
                });
            }
        }
    });
    </script>';

    //After Carousel
    echo '<h4>Зміна назв категорій:</h4>';
    echo '<p>Зроби так, щоб все йшло за списком, як зроблено у словацькій версії.</p>';
    echo '<p><label for="dress_tabs_names_1">Свадобні сукні 1:</label><br><input type="text" id="dress_tabs_names_1" name="dress_tabs_names[1]" value="' . esc_attr(isset($dress_tabs_names[1]) ? $dress_tabs_names[1] : '') . '"></p>';
    echo '<p><label for="dress_tabs_names_2">Вечірні сукні 2:</label><br><input type="text" id="dress_tabs_names_2" name="dress_tabs_names[2]" value="' . esc_attr(isset($dress_tabs_names[2]) ? $dress_tabs_names[2] : '') . '"></p>';
    echo '<p><label for="dress_tabs_names_3">Жіночий костюм 3:</label><br><input type="text" id="dress_tabs_names_3" name="dress_tabs_names[3]" value="' . esc_attr(isset($dress_tabs_names[3]) ? $dress_tabs_names[3] : '') . '"></p>';
    echo '<p><label for="dress_tabs_names_4">Дитячі сукні 4:</label><br><input type="text" id="dress_tabs_names_4" name="dress_tabs_names[4]" value="' . esc_attr(isset($dress_tabs_names[4]) ? $dress_tabs_names[4] : '') . '"></p>';
    echo '<p><label for="dress_tabs_names_5">Аксесуари 5:</label><br><input type="text" id="dress_tabs_names_5" name="dress_tabs_names[5]" value="' . esc_attr(isset($dress_tabs_names[5]) ? $dress_tabs_names[5] : '') . '"></p>';

    echo '<h4>Кнопка завантажити більше</h4>';
    echo '<p style="width:50%; font-size:15px; font-weight:600; color:black;"><label for="load_more_text">Load More Text:</label><br><input type="text" id="load_more_text" name="load_more_text" value="' . esc_attr($load_more_text) . '"></p>';
}

// Save custom fields
function index_page_fields_save($post_id)
{
    // Verify nonce
    if (!isset($_POST['index_page_nonce']) || !wp_verify_nonce($_POST['index_page_nonce'], basename(__FILE__))) {
        return;
    }

    // Save fields for all four slides
    for ($i = 1; $i <= 4; $i++) {
        update_post_meta($post_id, "carousel_heading_slide_{$i}", sanitize_text_field($_POST["carousel_heading_slide_{$i}"]));
        update_post_meta($post_id, "carousel_content_slide{$i}", sanitize_textarea_field($_POST["carousel_content_slide{$i}"]));
        update_post_meta($post_id, "carousel_image_slide_{$i}", absint($_POST["carousel_image_slide_{$i}"]));
    }

    // Save other fields
    update_post_meta($post_id, 'carousel_change_button_text', sanitize_text_field($_POST['carousel_change_button_text']));
    update_post_meta($post_id, 'carousel_change_bubble_text', sanitize_text_field($_POST['carousel_change_bubble_text']));
    update_post_meta($post_id, 'dress_tabs_names', array_map('sanitize_text_field', $_POST['dress_tabs_names']));
    update_post_meta($post_id, 'load_more_text', sanitize_text_field($_POST['load_more_text']));
    update_post_meta($post_id, 'carousel_change_bubble_link', esc_url_raw($_POST['carousel_change_bubble_link']));
}

add_action('save_post', 'index_page_fields_save');

function order_page_custom_fields()
{
    global $post;
    if ('page' != $post->post_type || get_post_meta($post->ID, '_wp_page_template', true) !== 'order-page.php') {
        return;
    }

    add_meta_box(
        'order_page_fields',
        'Order Page Custom Fields',
        'order_page_fields_callback',
        'page',
        'normal',
        'high'
    );
}


function order_page_fields_callback($post)
{
    wp_nonce_field('save_order_page_fields', 'order_page_fields_nonce');

    $heading = get_post_meta($post->ID, 'order_page_heading', true);
    $description = get_post_meta($post->ID, 'order_page_description', true);
    $wpform_shortcode = get_post_meta($post->ID, 'wpform_shortcode', true);


    echo '    <style>
        p, label, li, input, option{
            font-size: 16px;
            font-family: "Open Sans";
        }

        p {
            font-style: italic;
        }

        h4 {
            font-size: 17px;
            font-family: "Open Sans";
            font-weight: bold;
        }
    </style>';

    echo '<p style="display:flex; flex-direction:column; max-width:50%;"><label for="order_page_heading">Заголовок:</label>';
    echo '<input type="text" id="order_page_heading" name="order_page_heading" value="' . esc_attr($heading) . '" /></p>';

    echo '<p style="display:flex; flex-direction:column; max-width:50%;"><label for="order_page_description">Опис:</label>';
    echo '<textarea style="min-height: 120px;" id="order_page_description" name="order_page_description">' . esc_textarea($description) . '</textarea></p>';

    echo '<p style="display:flex; flex-direction:column; max-width:50%;"><label for="wpform_shortcode">WPForms Shortcode:</label>';
    echo '<input type="text" id="wpform_shortcode" name="wpform_shortcode" value="' . esc_attr($wpform_shortcode) . '" /></p>';
}

function save_order_page_fields($post_id)
{
    if (!isset($_POST['order_page_fields_nonce']) || !wp_verify_nonce($_POST['order_page_fields_nonce'], 'save_order_page_fields')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_page', $post_id)) {
        return;
    }

    $fields = [
        'order_page_heading',
        'order_page_description',
        'wpform_shortcode',
    ];

    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

add_action('add_meta_boxes', 'order_page_custom_fields');
add_action('save_post', 'save_order_page_fields');


function about_page_custom_fields()
{
    global $post;
    if ('page' != $post->post_type || get_post_meta($post->ID, '_wp_page_template', true) !== 'about.php') {
        return;
    }

    add_meta_box(
        'about_page_fields',
        'About Page Custom Fields',
        'about_page_fields_callback',
        'page',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'about_page_custom_fields');
function about_page_fields_callback($post)
{
    wp_nonce_field('about_page_fields_save', 'about_page_nonce');

    $about_background_image = get_post_meta($post->ID, 'about_background_image', true);
    $about_image_text = get_post_meta($post->ID, 'about_image_text', true);
    $about_image_block = get_post_meta($post->ID, 'about_image_block', true);
    $about_contact_info_block = get_post_meta($post->ID, 'about_contact_info_block', true);
    $about_section_block_1 = get_post_meta($post->ID, 'about_section_block_1', true);
    $about_section_block_2 = get_post_meta($post->ID, 'about_section_block_2', true);
    $about_end_page_image = get_post_meta($post->ID, 'about_end_page_image', true);
    $about_logo_image = get_post_meta($post->ID, 'about_logo_image', true);


    echo '    <style>
        p, label, li, input, option{
            font-size: 16px;
            font-family: "Open Sans";
        }

        p {
            font-style: italic;
        }

        h4 {
            font-size: 17px;
            font-family: "Open Sans";
            font-weight: bold;
        }
    </style>';
    // Field 1 - Background Image
    echo '<p><strong>Велике Фонове Зображення</strong></p>';
    echo '<input type="hidden" id="about_background_image" name="about_background_image" value="' . esc_url($about_background_image) . '"/>';
    echo '<button type="button" class="upload_image_button button">Add Image</button>';
    echo '<button type="button" class="remove_image_button button">Remove Image</button>';
    echo '<div class="image_preview" style="width: 100%; height: auto;">';
    if ($about_background_image) {
        echo '<img src="' . esc_url($about_background_image) . '" style="max-width: 100%; height: auto;"/>';
    }
    echo '</div>';
//Field 2
    echo '<p><strong>Додати своє лого або інше зображення (буде на фоновом зображенні)</strong></p>';
    echo '<input type="hidden" id="about_logo_image" name="about_logo_image" value="' . esc_url($about_logo_image) . '"/>';
    echo '<button type="button" class="upload_image_button button">Add Image</button>';
    echo '<button type="button" class="remove_image_button button">Remove Image</button>';
    echo '<div class="image_preview" style="width: 100%; height: auto;">';
    if ($about_logo_image) {
        echo '<img src="' . esc_url($about_logo_image) . '" style="max-width: 100%; height: auto;"/>';
    }
    echo '</div>';
    // Field 2 - Image Text
    echo '<p><strong>Текст (буде на фоновому зображенні)</strong></p>';
    echo '<textarea style="width:100%;" name="about_image_text">' . esc_textarea($about_image_text) . '</textarea>';

    // Field 3 - Image Block
    echo '<p><strong>Картинка буде в блоці о мені</strong></p>';
    echo '<input type="hidden" id="about_image_block" name="about_image_block" value="' . esc_url($about_image_block) . '"/>';
    echo '<button type="button" class="upload_image_button button">Add Image</button>';
    echo '<button type="button" class="remove_image_button button">Remove Image</button>';
    echo '<div class="image_preview" style="width: 100%; height: auto;">';
    if ($about_image_block) {
        echo '<img src="' . esc_url($about_image_block) . '" style="max-width: 100%; height: auto;"/>';
    }
    echo '</div>';

    // Field 4 - Contact Information Block
    echo '<h4>Блок для тексту</h4>';
    echo '<p>Різні стилі на замітку: 
    <br>
    <strong>Заголовок</strong>: 
     <br>
    &lt;h4&gt;Заголовок&lt;/h4&gt;
     <br>
     <strong>Просто параграф</strong>:
     <br>
     &lt;p&gt;Якийсь текст&lt;/p&gt;
     <br>
    <strong> Писати з точечками </strong>:
     <br>
    &lt;ul&gt;
     <br>
 &lt;li&gt;текст з точкою&lt;/li&gt;
  <br>
 &lt;li&gt;текст з точкою&lt;/li&gt;
  <br>
 &lt;/ul&gt;
  <br>
    </p>';
    echo '<textarea style="width:100%;" name="about_contact_info_block">' . esc_textarea($about_contact_info_block) . '</textarea>';

    // Field 5 - Section Block 1
    echo '<p><strong>Блок для тексту 2</strong></p>';
    echo '<textarea style="width:100%;" name="about_section_block_1">' . esc_textarea($about_section_block_1) . '</textarea>';

    // Field 6 - Section Block 2
    echo '<p><strong>Блок для тексту 3</strong></p>';
    echo '<textarea style="width:100%;" name="about_section_block_2">' . esc_textarea($about_section_block_2) . '</textarea>';

    // Field 7 - End-Page Image
    echo '<p><strong>Зображення у кінці сторінки</strong></p>';
    echo '<input type="hidden" id="about_end_page_image" name="about_end_page_image" value="' . esc_url($about_end_page_image) . '"/>';
    echo '<button type="button" class="upload_image_button button">Add Image</button>';
    echo '<button type="button" class="remove_image_button button">Remove Image</button>';
    echo '<div class="image_preview" style="width: 100%; height: auto;">';
    if ($about_end_page_image) {
        echo '<img src="' . esc_url($about_end_page_image) . '" style="max-width: 100%; height: auto;"/>';
    }
    echo '</div>';
}

add_action('save_post', 'about_page_fields_save');

function about_page_fields_save($post_id)
{
    if (!isset($_POST['about_page_nonce']) || !wp_verify_nonce($_POST['about_page_nonce'], 'about_page_fields_save')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'about_background_image',
        'about_image_text',
        'about_image_block',
        'about_contact_info_block',
        'about_section_block_1',
        'about_section_block_2',
        'about_end_page_image',
        'about_logo_image',
    );

    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, $field, $_POST[$field]);
        }
    }
}

function about_page_custom_fields_js()
{
    global $post;

    if ($post && get_page_template_slug($post->ID) == 'about.php') {
        echo '<script>
            jQuery(document).ready(function ($) {
                $(".upload_image_button").on("click", function (e) {
                    e.preventDefault();

                    var button = $(this);
                    var input = button.prev();

                    var frame = wp.media({
                        title: "Select or Upload an Image",
                        button: {
                            text: "Use this image"
                        },
                        multiple: false
                    });

                    frame.on("select", function () {
                        var attachment = frame.state().get("selection").first().toJSON();
                        input.val(attachment.url);
                        button.next().show();
                        button.next().next().html("<img src=\'" + attachment.url + "\' style=\'max-width: 100%; height: auto;\'/>");
                    });

                    frame.open();
                });

                $(".remove_image_button").on("click", function (e) {
                    e.preventDefault();

                    var button = $(this);
                    var input = button.prev().prev();

                    input.val("");
                    button.hide();
                    button.next().html("");
                });

                $(".remove_image_button").each(function () {
                    if (!$(this).prev().prev().val()) {
                        $(this).hide();
                    }
                });
            });
        </script>';
    }
}

add_action('admin_footer', 'about_page_custom_fields_js');
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');


function mytheme_customize_register($wp_customize)
{
    // Add Footer Socials section
    $wp_customize->add_section('footer_socials', array(
        'title' => __('Footer Socials', 'mytheme'),
        'priority' => 160,
    ));

    // Social media fields
    $socials = array('facebook', 'instagram', 'telegram', 'whatsapp', 'viber');
    foreach ($socials as $social) {
        $wp_customize->add_setting($social . '_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($social . '_url', array(
            'label' => ucfirst($social),
            'section' => 'footer_socials',
            'type' => 'url',
        ));
    }

    // Add logo image
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => __('Logo', 'mytheme'),
        'section' => 'footer_socials',
    )));
}

add_action('customize_register', 'mytheme_customize_register');


?>
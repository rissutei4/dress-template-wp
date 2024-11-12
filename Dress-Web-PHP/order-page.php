<?php
/*
Template Name: Order page template
*/
?>
<?php
// get header.php file
get_header();
?>
    <div class="forms-container container">
        <?php
        $order_page_heading = get_post_meta(get_the_ID(), 'order_page_heading', true);
        $order_page_description = get_post_meta(get_the_ID(), 'order_page_description', true);
        $wpform_shortcode = get_post_meta(get_the_ID(), 'wpform_shortcode', true);

        ?>
        <div class="forms-heading">
            <h4><?php echo esc_html($order_page_heading); ?></h4>
            <p><?php echo esc_html($order_page_description); ?></p>
        </div>
        <div class="contactForm">
            <?php echo do_shortcode($wpform_shortcode); ?>
        </div>
    </div>
    </div>

<?php
// get footer.php file
get_footer();
?>
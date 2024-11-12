<footer>
    <div class="container">
        <div class="footer-content">
            <div class="logoIcon">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_theme_mod('footer_logo', get_template_directory_uri() . '/assets/images/logo.svg'); ?>" class="img-fluid" alt="WebsiteLogo">
                </a>
            </div>
            <div class="SocialMedias">
                <ul class="socialsList d-flex flex-direction-row">
                    <?php
                    $socials = array('facebook', 'instagram', 'telegram', 'whatsapp', 'viber');
                    $icons = array(
                        'facebook' => 'facebook.svg',
                        'instagram' => 'instagram.svg',
                        'telegram' => 'telegram.svg',
                        'whatsapp' => 'whatsapp.svg',
                        'viber' => 'viber.svg',
                    );

                    foreach ($socials as $social) {
                        $url = get_theme_mod($social . '_url', '');
                        if (!empty($url)) {
                            ?>
                            <li>
                                <a href="<?php echo esc_url($url); ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/' . $icons[$social]; ?>" class="img-fluid" alt="<?php echo esc_attr(ucfirst($social)); ?>">
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>

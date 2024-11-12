<?php
/*
Template Name: About page template
*/
?>
<?php
// get header.php file
get_header();
?>
<div class="back-image-sect">
    <?php
    $about_logo_image = get_post_meta(get_the_ID(), 'about_logo_image', true);
    $about_background_image = get_post_meta(get_the_ID(), 'about_background_image', true);
    $about_image_text = get_post_meta(get_the_ID(), 'about_image_text', true);
    ?>

    <div class="bg-image" style="background-image: url('<?php echo esc_url($about_background_image); ?>');">
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
    $about_image_block = get_post_meta(get_the_ID(), 'about_image_block', true);
    $about_contact_info_block = get_post_meta(get_the_ID(), 'about_contact_info_block', true);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1 col-12 order-2">
                <div class="photo-wrapper">
                    <img src="<?php echo esc_url($about_image_block); ?>"
                         class="img-fluid" alt="photo of Nastia">
                </div>
            </div>
            <div class="col-md-6 col-12 d-flex align-items-center">
                <div class="contact-info">
                    <?php echo wp_kses_post($about_contact_info_block); ?>
                <!--    <h4>Contact Information</h4>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor dui sit amet tincidunt
                        suscipit. Donec id eros id dolor tincidunt congue vitae vel sapien.</p>
                    <p>Telephone: 123-456-7890</p>
                    <p>Email: your-email@example.com</p>
                    <p>Address: 123 Main St, Anytown, USA</p>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="additional-section">
    <?php
    $about_section_block_1 = get_post_meta(get_the_ID(), 'about_section_block_1', true);
    $about_section_block_2 = get_post_meta(get_the_ID(), 'about_section_block_2', true);
    $about_end_page_image = get_post_meta(get_the_ID(), 'about_end_page_image', true);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 order-md-2 col-12 order-1">
                <div class="block-text-1">
                    <?php echo wp_kses_post($about_section_block_1); ?>
                 <!--   <h4 class="text-center">Natasha Azariy je slovenská módna značka svadobných, spoločenských a
                        detských šiat, ktorá pôsobí na celom Slovensku, v Poľsku ale aj v Českej republike už od
                        roku
                        2012, keď sa v malej dielni ušili prvé svadobné šaty NATASHA AZARIY.</h4>
                    <p>- Tím profesionálnych dizajnérov a krajčírov.
                        - Súkromná výstavba vzorov a individuálny prístup.
                        - Navrhovanie a šitie šiat podľa predstáv zákazníkov.
                        - Kvalitné látky a šitie za dostupnú cenu, ktorú si môže dovoliť každý.
                        - Individuálny výber látok z celého sveta pre každého zákazníka.
                        - Bezplatné poradenstvo, záruka kvality a zodpovednosť za výsledok.
                        - Služba "sos nevesta" - v nepredvídaných situáciách a iných živloch Vám ušijeme šaty do 48
                        hodín.

                        Svadobné šaty od Natasha Azariy si objednáte on-line cez internet. Prípadne osobne na
                        pobočke:
                        Bratislava, Svidník, alebo na partnerskom mieste v Hlohovci.

                        Zákazník k nám môže prísť s konkrétnou predstavou svojich vysnívaných šiat, alebo má možnosť
                        vybrať si niektoré z našich už navrhnutých modelov, prípadne nakombinovať si jednotlivé
                        modely
                        presne podľa svojho želania a vkusu. Konečný model ušijeme presne na mieru.

                        Ak sa rozhodnete vytvoriť si unikátny image a jedinečné svadobné šaty, tak táto voľba je pre
                        Vás.</p>-->
                </div>
                <div class="block-text-2">
                    <?php echo wp_kses_post($about_section_block_2); ?>
                </div>
                <div class="image-end-page">
                    <img src="<?php echo esc_url($about_end_page_image); ?>" class="img-fluid" alt="photo of Nastia">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// get footer.php file
get_footer();
?>

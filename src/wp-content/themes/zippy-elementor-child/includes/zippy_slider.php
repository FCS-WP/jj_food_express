<?php

function banner_slider_short_code()
{
    $post_id = get_the_ID();

    $slides = get_field('banner_sliders', $post_id);

    if (!$slides || !is_array($slides)) {
        return '<p>No slides found.</p>';
    }
    $titles = [];

    ob_start();
    echo '<div class="zippy-banner-slider swiper"> <div class="swiper-wrapper">';
    foreach ($slides as $slide) {
        $image_url = $slide['slide_banner'];
        $title = $slide['slide_title'];
        $desc = $slide['slide_description'];
        $link_to = $slide['slide_link'];
?>
        <div class="swiper-slide">
            <div class="slide_item">
                <p class="slide_img"><img src="<?php echo $image_url; ?>" alt="<?php echo $title ?? "" ?>"></p>
                <div class="slide-content">
                    <h1 class="slide_title"><?php echo $title ?? "" ?></h1>
                    <div class="desc"><?php echo $desc ?></div>
                    <a class="btn" href="<?php echo $link_to ?>">See More</a>
                </div>
            </div>
        </div>
    <?php
    }
    echo '</div> </div>';
    ?>
    <div class="swiper-custom-pagination">
        <div class="pagination-container">
            <?php foreach ($titles as $i => $title): ?>
                <span class="custom-pagination-item" data-index="<?php echo $i ?>"> <?php echo esc_html($title) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('banner_slider', 'banner_slider_short_code');
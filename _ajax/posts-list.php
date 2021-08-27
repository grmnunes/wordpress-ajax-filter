<?php
    function postsList() {

        $category = $_POST['category'];
        $tag = $_POST['tag'];
        $postArgs = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'category__in' => $category,
            'tag__in' => $tag,
        );
        $posts = new WP_Query($postArgs);

        if($posts->have_posts()) :
            while ($posts->have_posts()) : 
                $posts->the_post();
        ?>
                <div class="post mb-4 p-2 border">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_excerpt(); ?></p>

                    <button type="button" class="btn btn-outline-primary">Ler mais</button>
                </div>
            <?php endwhile;
        endif;

    }

    add_action('wp_ajax_postsList', 'postsList');
    add_action('wp_ajax_nopriv_postsList', 'postsList');

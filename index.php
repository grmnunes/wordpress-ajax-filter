<?php get_header(); ?>
<main class="container mt-4">
    <div class="row">
        <div class="posts-list col-sm-12 col-md-8">
            <?php
                $postArgs = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6
                );

                $postsQuery = new WP_Query($postArgs);
            ?>
            <?php if($postsQuery->have_posts()) : ?>
                <?php while ($postsQuery->have_posts()) : 
                    $postsQuery->the_post();
                ?>
                    <div class="post mb-4 p-2 border">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_excerpt(); ?></p>

                        <button type="button" class="btn btn-outline-primary">Ler mais</button>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-sm-12 col-md-4">
            <?php $categories = get_categories(array('exclude' => 1)); ?>
            <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                <div class="list-group" style="cursor: pointer;">
                    <?php foreach ($categories as $category) : ?>
                        <div>
                            <input
                                type="checkbox" 
                                class="category"
                                name="category"
                                value="<?php echo $category->term_id; ?>"
                            >
                            <label for="category"><?php echo $category->name; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php $tags = get_tags(array('hide_empty' => false)); ?>
            <?php if (!empty($tags) && !is_wp_error($tags)) : ?>
                <div class="list-group pt-4" style="cursor: pointer;">
                    <?php foreach ($tags as $tag) : ?>
                        <div>
                            <input
                                type="checkbox" 
                                class="tag"
                                name="tag"
                                value="<?php echo $tag->term_id; ?>"
                            >
                            <label for="tag"><?php echo $tag->name; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="progress m-4 d-none">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
    </nav>
</main>
<?php get_footer(); ?>
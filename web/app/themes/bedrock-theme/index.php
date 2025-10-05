<?php get_header(); ?>

<main class="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="entry-meta">
                    <time datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                    <span> by <?php the_author(); ?></span>
                </div>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'bedrock-theme'),
                'next_text' => __('Next &raquo;', 'bedrock-theme'),
            ]);
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found.', 'bedrock-theme'); ?></p>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

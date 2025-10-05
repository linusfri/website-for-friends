<?php get_header(); ?>

<main class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>

            <div class="entry-meta">
                <time datetime="<?php echo get_the_date('c'); ?>">
                    <?php echo get_the_date(); ?>
                </time>
                <span> by <?php the_author(); ?></span>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php
            the_post_navigation([
                'prev_text' => __('&laquo; Previous Post', 'bedrock-theme'),
                'next_text' => __('Next Post &raquo;', 'bedrock-theme'),
            ]);
            ?>

            <?php
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        </article>
    <?php endwhile; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

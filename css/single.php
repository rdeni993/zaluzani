<!-- Wordpress Header -->
<?php get_header(); ?>

<!-- Front Page -->

<div class="container-fluid">

<!-- Load Navigation -->
<?php get_template_part('template/navigation'); ?>
<!-- End Navigation -->

<!-- Body -->
<div class="row container-content">
    <!-- Main Posts -->
    <div class="col-sm-9 blog-posts">

        <?php if( have_posts() ): ?>
            <?php while( have_posts() ): the_post(); ?>
            <!-- Display Post Snippet -->
            <div class="blog-post-snippet">
                <div class="post-date">
                    <ul class="roboto">
                        <li><h1><strong><?php echo get_the_date("d"); ?></strong></h1></li>
                        <li><?php echo get_the_date("M") . ", " . get_the_date("Y"); ?></li>
                    </ul>
                </div>
                <div class="post-content roboto">

                    <p class="text-muted roboto"><span class="fas fa-user"></span> Objavio: <?php the_author(); ?> u kategoriji <?php the_category(',') ?><p>
                    
                    <!-- Thumbnail -->
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                    <!-- EOF Thumbnail -->

                    <!-- Post -->
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                    <div class="post-excerpt text-justify"><?php the_content(); ?></div>
                    <!-- End Of Post -->

                    <!-- Tags -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><strong><span class="fas fa-tags"></span> Oznake:</strong></div>
                            <div class="card-content"><em><?php the_tags('', ',') ?></em></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Snippet -->
            <?php  endwhile; ?>
        <?php endif; ?>

    </div>
    <div class="col-sm-3 main-sidebar">
        <!-- Load SidebarTemplate -->
        <?php get_template_part('template/main_sidebar'); ?>
        <!-- EndSidebarTempalate -->
    </div>
</div>
<!-- EndBody -->

<!-- End Front Page -->
</div>
<!-- Wordpress Footer -->
<?php get_footer(); ?>
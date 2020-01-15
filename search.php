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
                    <!-- Thumbnail -->
                    <?php if( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                    <!-- EOF Thumbnail -->

                    <!-- Post -->
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post-excerpt text-justify"><?php the_excerpt(); ?></div>
                    <a class="btn btn-link" href="<?php the_permalink(); ?>">Pročitaj više</a>
                    <!-- End Of Post -->

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
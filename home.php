<!-- Wordpress Header -->
<?php get_header(); ?>

<!-- Front Page -->

<div class="container-fluid">
<!-- Front page image -->
<div class="front-page">
    <!-- Navigation --> 
    <div class="navigation">
        <div class="mobile navigation-text main-font"><h1>Universitiy</h1><button id="menu-button">Menu</button></div>
        <div class="menu" id="mobile-main-menu">
            <?php wp_nav_menu(['theme_location' => 'main_menu']); ?>
        </div>
    </div>
    <!-- Logo And text -->
    <div class="front-details main-font">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo Image" />
        <br />
        <h1 class="pacifico">Universitiy of Jerusalem</h1>
        <br />
        <div class="search-box">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>

<!-- Posts -->
<div class="posts">
    <div class="row">
        <div class="col-sm-8">
            <div class="blog-posts main-font">
                <?php if( have_posts() ): ?>
                    <?php while( have_posts() ): the_post(); ?>
                        <!-- Post Template -->
                        <article>
                            <div class="article-featured text-center">
                                <div><?php echo get_the_date("d"); ?></div>
                                <div><?php echo get_the_date("M") . ", " . get_the_date("Y"); ?></div>
                            </div>
                            <div class="article-content">
                                <!-- Thumbnail -->
                                <?php if( has_post_thumbnail() ): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                                <p class="mobile mobile-date">Datum: <?php the_date(); ?> | Objavio: <?php the_author(); ?></p>
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <div>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Pogledaj objavu</a>
                                </div>
                            </div>
                        </article>
                        <!-- End of Post Template -->
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="sidebar main-font">
                <!-- Archive -->
                <article>
                    <h1>Arhiva</h1>
                    <div>
                        <?php $cat = get_categories(); ?>
                        <ul>
                            <?php foreach( $cat as $category ): ?>
                                <li><a href="<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
                <!-- Meni -->
                <article>
                    <h1>Dokumenti</h1>
                    <?php wp_nav_menu(['theme_location' => 'docs_menu', 'menu_class' => 'docs']); ?>
                </article>
                <!-- Sidebar -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<!-- EOF container -->
</div>

<!-- End Front Page -->

<!-- Wordpress Footer -->
<?php get_footer(); ?>
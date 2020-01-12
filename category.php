<!-- Wordpress Header -->
<?php get_header(); ?>

<!-- Front Page -->
<!-- Classic Bootstrap navigation -->
<nav class="bootstrap-wp-nav">
    <div class="navbar-title">
        <img src="<?php echo get_template_directory_uri() . '/img/logo.png' ?>" alt="menu-logo" /> 
        <a href="<?php echo bloginfo('url'); ?>"><h1 class="pacifico"><?php bloginfo('name'); ?></h1></a>
        <button id="boot-nav-wp" class="mobile"><span class="far fa-compass"></span></button>
    </div>
    <div class="navbar-content text-right"><?php wp_nav_menu(['theme_location' => 'main_menu']); ?></div>
    <div class="navbar-search"><?php get_search_form(); ?></div>
</nav>

<!-- Container -->
<div class="container-fluid dark-version">

<!-- Main Font -->
<div class="main-post main-font">
    <div class="row">
        <div class="col-sm-8">
            <div class="row-main-post">

            <?php if( have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>

                <!-- Thumbnail -->
                <?php if( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>

                <!-- Title -->
                <h1><b><?php the_title(); ?></b></h1>

                <!-- Description -->
                <ul class="row-main-post-description text-muted text-uppercase">
                    <li><span><?php the_date(); ?> <?php the_time('H:m'); ?></span></li>
                    <li><?php the_author(); ?></li>
                    <li><?php the_category(', '); ?></li>
                </ul>

                <!-- Content -->
                <div class="text-justify row-main-post-content">
                    <?php the_excerpt(); ?>
                    <hr />
                </div>

                <?php endwhile; ?>
            <?php else: ?>
                <p>Post not found!</p>
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
                                    <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
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
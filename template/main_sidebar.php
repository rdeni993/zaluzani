<!-- Set Archive Card -->
<div class="card roboto">
    <div class="card-body">
        <div class="card-title">
            <h1>Arhiva</h1>
        </div>
        <div class="card-content">
        
        <!-- Get Cats -->
        <?php $cat = get_categories(); ?>

        <!-- Print Cats -->
        <ul class="list-group">
            <?php foreach( $cat as $category ): ?>
                <li class="list-group-item"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a></li>
            <?php endforeach; ?>
        </ul>

        </div>
    </div>
</div>

<!-- Set Documents Part -->
<div class="card roboto">
    <div class="card-body">
        <div class="card-title">
            <h1>Dokumenti</h1>
        </div>
        <div class="card-content" id="doc-menu">
        
        <!-- Load Menu -->
        <?php wp_nav_menu([
            'theme_location' => 'docs_menu', 
            'menu_class' => 'list-group'
        ]); ?>
        <!-- End Menu -->
        
        </div>
    </div>
</div>

<!-- Get Sidebar -->
<?php get_sidebar(); ?>
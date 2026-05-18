<?php get_header(); ?>

<main class="main-content">
    <div class="breadcrumb">Inicio . Best Sellers</div>
    
    <div class="page-header">
        <h1 class="page-title">Best Sellers</h1>
        <button class="filter-btn">Filtrar</button>
    </div>

    <div class="products-grid">
        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'product' );
            endwhile;
        else :
            echo '<p>No hay productos disponibles por el momento.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
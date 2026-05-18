<article class="product-card">
    <div class="product-image-wrapper">
        <?php 
        if (has_post_thumbnail()) {
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        } else {
            // Fotos de respaldo si no tiene imagen destacada
            $mis_fotos = [
    'photo-1611107683227-e9060eccd846.jpeg',
    'photo-1721034911830-69bf7313dc05.jpeg',
    'photo-1722410180670-b6d5a2e704fa.jpeg',
    'photo-1727784635955-6e533b45463a.jpeg',
    'photo-1728646996588-9ae7ef3c9633.jpeg',
    'photo-1759651037868-eb8039c79ed1.jpeg',
            ];
            $indice = get_the_ID() % count($mis_fotos);
            $image_url = content_url('/uploads/2026/05/' . $mis_fotos[$indice]);
        }
        ?>
        
        <img src="<?php echo $image_url; ?>" 
             class="product-image" 
             alt="<?php the_title(); ?>"
             style="width: 100%; height: 250px; object-fit: cover;">
        
        <div class="product-discount">20% OFF</div>
    </div>
    
    <div class="product-info">
        <h2 class="product-name"><?php the_title(); ?></h2>
        <div class="product-pricing">
            <span class="product-price">$350.000</span>
            <span class="product-price-transfer">$280.000 por Transferencia</span>
            <span class="product-installments">6 cuotas sin interés</span>
        </div>
    </div>
</article>
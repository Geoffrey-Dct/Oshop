<?php foreach ($viewVars['products'] as $product): ?>
        <!-- product-->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?= $router->generate('product', ['id' => $product->getId()]); ?>" class="product-hover-overlay-link">
              <img src="<?= $absoluteURL ."/". $product->getPicture();?>" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="<?= $router->generate('product', ['id' => $product->getId()]); ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $product->category_name; ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark"><?= $product->getName(); ?></a></h3><span class="text-muted"><?= $product->getPrice(); ?>&euro;</span>
          </div>
        </div>
        <!-- /product-->
        <?php endforeach;?>
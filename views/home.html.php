<div class="row">
    <?php foreach ($biens as $bien) : ?>
        <div class="col-4 mt-3">
            <div class="card  position-relative pb-3">
                <div class="card-body">
                    <h6 class="card-title"><?= substr($bien->getTitre(), 0, 50) . " ..."; ?></h6>
                    <p class="card-text"><?= $bien->getPrice(); ?></p>

                </div>
                <div class="">
                    <a href="<?= addLink('bien', 'show', $bien->getId()); ?>" class="btn btn-secondary">En savoir
                        plus
                    </a>
                    <div id="<?= $bien->getId(); ?>" class="add_cart btn btn-primary">Ajouter
                        au
                        Panier</div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<script>
    $(document).ready(function() {

        addToCartAjax();
    });
</script>
<div class="row">
    <?php var_dump($_SESSION) ?>
    <?php foreach ($biens as $bien): ?>
        <div class="col-4 mt-3">
            <div class="card  position-relative pb-3">
                <div class="card-body">
                    <h6 class="card-title"><?= substr($bien->getTitre(), 0, 50) . " ..."; ?></h6>
                    <p class="card-text"><?= $bien->getTitre(); ?></p>

                </div>
                <div class="">
                    <a href="<?= addLink('bien', 'show', $bien->getId()); ?>" class="btn btn-secondary">En savoir plus
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


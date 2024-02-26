<section id="home">
    <?php foreach ($biens as $bien): ?>
        <div id="bien_home">
            <div class="img_home">
                <img src="<?= ROOT . UPLOAD_BIENS_IMG . $bien->getImage(); ?>" alt="image-produit" class="card-img-top">
            </div>
            <div>
                <h2><?= $bien->getTitre() ?></h2>
                <?php if ($bien->getPrixVente() !== null) { ?>
                        <p><?= number_format($bien->getPrixVente(), 0, ',', '.') . " €" ?></p>
                <?php } else if ($bien->getLoyerHC() !== null) { ?>
                            <p><?= $bien->getLoyerHC(); ?></p>
                <?php } else if ($bien->getLoyerCC() !== null) { ?>
                                <p><?= $bien->getLoyerCC(); ?></p>
                <?php } ?>
                <p><?= $bien->getStyle(); ?></p>
                <p><?= $bien->getnbPieces() . " pièces / " . $bien->getSurface() . " m² / " . $bien->getEtage() . " Étages" . ($bien->getParking() == 'oui' ? " / Parking" : "") ?></p>
                <p>
                    <a href="<?= addLink('biens', 'detailBien', $bien->getId()); ?>">En savoir plus ...</a>
                </p>
            </div>
        </div>
        <?php if ($bien !== end($biens)): ?>
            <hr>
        <?php endif; ?>

    <?php endforeach; ?>

    <div id="filtrage">
        <h3>Filtrer par :
        </h3>
        <div>
            <label for="nb_pieces">Nombre de pièces :</label>
            <input type="number" id="nb_pieces" name="nb_pieces">
        </div>
        <div>
            <label for="nb_pieces">Nombre de pièces :</label>
            <input type="number" id="nb_pieces" name="nb_pieces">
        </div>
    </div>
</section>


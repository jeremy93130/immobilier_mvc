<section id="home">
    <?php foreach ($biens as $bien): ?>
        <div id="bien_home">
            <div class="img_home">
                <img src="<?= ROOT . UPLOAD_BIENS_IMG . $bien->getImage(); ?>" alt="image-produit" class="card-img-top">
            </div>
            <div>
                <h2>
                    <?= $bien->getTitre() ?>
                </h2>
                <?php if ($bien->getPrixVente() !== null) { ?>
                        <p style="font-weight: bold">
                            <?= number_format($bien->getPrixVente(), 0, ',', '.') . " €" ?>
                        </p>
                <?php } else if ($bien->getLoyerCC() !== null) { ?>
                            <p style="font-weight: bold">
                            <?= $bien->getLoyerCC(); ?>
                                € cc
                            </p>
                <?php } ?>
                <p>
                    <?= $bien->getStyle(); ?>
                </p>
                <p>
                    <?= $bien->getnbPieces() . " pièces / " . $bien->getSurface() . " m² / " . $bien->getEtage() . " Étages" . ($bien->getParking() == 'oui' ? " / Parking" : "") ?>
                </p>
                <p>
                    <a href="<?= addLink('biens', 'detailBien', $bien->getId()); ?>">En savoir plus ...</a>
                </p>
            </div>
        </div>
        <?php if ($bien !== end($biens)): ?>
            <hr>
        <?php endif; ?>

    <?php endforeach; ?>

</section>
<section id="filtrage">
    <h3>Filtrer par :
    </h3>
    <form id="formulaire_filtre">
        <div>
            <label for="nb_pieces" style="font-weight: bold;">Nombre de pièces :</label>
            <input type="number" id="nb_pieces" name="nb_pieces">
        </div>
        <div>
            <label for="surface" style="font-weight: bold;">Quelle surface habitable ?
            </label>
            <div>
                <label for="surface_min" style="font-weight: bold;">Min :</label>
                <input type="number" id="surface_min" name="surface_min" placeholder="">
                <label for="surface_max" style="font-weight: bold;">Max :</label>
                <input type="number" id="surface_max" name="surface_max">
            </div>
        </div>
        <div>
            <label for="parking" style="font-weight: bold;">Parking</label>
            <input type="checkbox" name="parking" id="parking">
            <label for="ascenseur" style="font-weight: bold;">Ascenseur</label>
            <input type="checkbox" name="ascenseur" id="ascenseur">
            <label for="garage" style="font-weight: bold;">Garage</label>
            <input type="checkbox" id="garage" name="garage">
        </div>
        <div>
            <div>
                <label for="jardin" style="font-weight: bold;">Jardin</label>
                <input type="checkbox" name="jardin" id="jardin">
                <label for="balcon" style="font-weight: bold;">Balcon</label>
                <input type="checkbox" name="balcon" id="balcon">
            </div>
            <div>
                <label for="terrasse" style="font-weight: bold;">Terrasse</label>
                <input type="checkbox" id="terrasse" name="terrasse">
                <label for="piscine" style="font-weight: bold;">Piscine</label>
                <input type="checkbox" id="piscine" name="piscine">
            </div>
        </div>
        <div>
            <input type="submit" id="submit_filtre" name="submit_filtre" value="filtrer" style="width: 100%;">
        </div>
    </form>
</section>


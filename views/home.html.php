<section id="home_section">
    <div id="filtrage">
        <h3>Filtrer par :
        </h3>
        <div id="formulaire_filtre">
            <div>
                <label for="nb_pieces" style="font-weight: bold;">Nombre de pièces :</label>
                <input type="number" id="nb_pieces">
            </div>
            <div>
                <label for="surface" style="font-weight: bold;">Quelle surface habitable ?
                </label>
                <div>
                    <label for="surface_min" style="font-weight: bold;">Min :</label>
                    <input type="number" id="surface_min" placeholder="x m²">
                    <label for="surface_max" style="font-weight: bold;">Max :</label>
                    <input type="number" id="surface_max" placeholder="x m²">
                </div>
            </div>
            <div>
                <label for="parking" style="font-weight: bold;">Parking</label>
                <input type="checkbox" id="parking">
                <label for="ascenseur" style="font-weight: bold;">Ascenseur</label>
                <input type="checkbox" id="ascenseur">
                <label for="garage" style="font-weight: bold;">Garage</label>
                <input type="checkbox" id="garage">
            </div>
            <div>
                <div>
                    <label for="jardin" style="font-weight: bold;">Jardin</label>
                    <input type="checkbox" id="jardin">
                    <label for="balcon" style="font-weight: bold;">Balcon</label>
                    <input type="checkbox" id="balcon">
                </div>
                <div>
                    <label for="terrasse" style="font-weight: bold;">Terrasse</label>
                    <input type="checkbox" id="terrasse">
                    <label for="piscine" style="font-weight: bold;">Piscine</label>
                    <input type="checkbox" id="piscine">
                </div>
            </div>
            <div>
                <button id="submit_filtre" data-url="<?= addLink('home', 'filtre'); ?>" style="width: 100%;"> Filtrer </button>
            </div>
        </div>
    </div>
    <div id="home">
        <?php foreach ($biens as $bien) : ?>
            <div class="bien_home">
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

        <?php endforeach; ?>

    </div>
</section>
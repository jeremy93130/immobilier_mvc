<section id="home">
    <?php foreach ($filtres as $filtre): ?>
        <div id="bien_home">
            <div class="img_home">
                <img src="<?= ROOT . UPLOAD_BIENS_IMG . $filtre['image']; ?>" alt="image-produit" class="card-img-top">
            </div>
            <div>
                <h2><?= $filtre['titre'] ?></h2>
                <?php if ($filtre['prix_vente'] !== null) { ?>
                        <p style="font-weight: bold">
                            <?= number_format($filtre['prix_vente'], 0, ',', '.') . " €" ?></p>
                <?php } else if ($filtre['loyer_CC'] !== null) { ?>
                            <p style="font-weight: bold"><?= $filtre['loyer_CC']; ?>
                                € cc</p>
                <?php } ?>
                <p><?= $filtre['style']; ?></p>
                <p><?= $filtre['nb_pieces'] . " pièces / " . $filtre['surface'] . " m² / " . $filtre['etage'] . " Étages" . ($filtre['parking'] == 'oui' ? " / Parking" : "") ?></p>
                <p>
                    <a href="<?= addLink('biens', 'detailBien', $filtre['id']); ?>">En savoir plus ...</a>
                </p>
            </div>
        </div>
        <?php if ($filtre !== end($filtre)): ?>
            <hr>
        <?php endif; ?>

    <?php endforeach; ?>

    <div id="filtrage">
        <h3>Filtrer par :
        </h3>
        <form method="post">
            <div>
                <label for="nb_pieces" style="font-weight: bold;">Nombre de pièces :</label>
                <input type="number" id="nb_pieces" name="nb_pieces">
            </div>
            <div>
                <label for="surface" style="font-weight: bold;">Quelle surface habitable ?
                </label>
                <div>
                    <label for="surface-min" style="font-weight: bold;">Min :</label>
                    <input type="number" id="surface-min" name="surface_min" placeholder="">
                    <label for="surface-max" style="font-weight: bold;">Max :</label>
                    <input type="number" id="surface-max" name="surface_max">
                </div>
            </div>
            <div>
                <label for="parking" style="font-weight: bold;">Parking</label>
                <input type="checkbox" name="parking" id="parking">
                <label for="ascenseur" style="font-weight: bold;">Ascenseur</label>
                <input type="checkbox" name="ascenseur" id="ascenseur">
                <label for="garage" style="font-weight: bold;">Garage</label>
                <input type="checkbox" id="garage">
            </div>
            <div>
                <input type="submit" value="filtrer" name="formulaire_filtre" style="width: 100%;">
            </div>
        </form>
    </div>
</section>


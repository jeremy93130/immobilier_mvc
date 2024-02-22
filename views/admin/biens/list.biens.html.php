<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>


<h1>Test</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre de la propriété</th>
            <th scope="col">Ville</th>
            <th scope="col">Code Postal</th>
            <th scope="col">Zone</th>
            <th scope="col">Nombre de pièces</th>
            <th scope="col">Surface</th>
            <th scope="col">Style</th>
            <th scope="col">Prix de Vente</th>
            <th scope="col">Loyer Hors Charge</th>
            <th scope="col">Loyer Charges Comprises</th>
            <th scope="col">Étages</th>
            <th scope="col">Garage</th>
            <th scope="col">Ascenseur</th>
            <th scope="col">Consommation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $prod): ?>
            <tr>
                <td><?= $prod->getTitre(); ?></td>
                <td><?= $prod->getVille(); ?></td>
                <td><?= $prod->getCodePostal(); ?></td>
                <td><?= $prod->getZone(); ?></td>
                <td><?= $prod->getnbPieces(); ?></td>
                <td><?= $prod->getSurface(); ?></td>
                <td><?= $prod->getStyle(); ?></td>
                <td><?= $prod->getPrixVente(); ?></td>
                <td><?= $prod->getLoyerHC() ? $prod->getLoyerHC() : "non" ?></td>
                <td><?= $prod->getLoyerCC() ? $prod->getLoyerCC() : "non" ?></td>
                <td><?= $prod->getEtage() == 0 && $prod->getStyle() == "Appartement" ? "Rez-de-chaussée" : $prod->getEtage(); ?></td>
                <td><?= $prod->getGarage(); ?></td>
                <td><?= $prod->getAscenseur(); ?></td>
                <td><?= $prod->getConsommation(); ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


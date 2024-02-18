<h1> Liste des biens </h1>

<?php foreach ($biens as $biensInfos) : ?>

<p><?= $biensInfos['titre']; ?></p>
    <h2> <a href="/Biens/etages/<?= $biensInfos['etage'] ?>"><?= $biensInfos['etage'] == 0 ? 'rez-de-chaussée' : $biensInfos['etage']; ?></a></h2>

<?php endforeach; ?>
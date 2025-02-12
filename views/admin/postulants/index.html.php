<div>
    <table>
        <thead>
            <tr>
                <th>Genre</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de naissance </th>
                <th>Profession</th>
                <th>Salaire</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u) { ?>
                <tr>
                    <td><?= $u->getGenre(); ?></td>
                    <td><?= $u->getNom(); ?></td>
                    <td><?= $u->getPrenom(); ?></td>
                    <td><?= $u->getEmail(); ?></td>
                    <td><?= $u->getDateNaissance(); ?></td>
                    <td><?= $u->getProfession(); ?></td>
                    <td><?= $u->getSalaire(); ?></td>
                    <td><?= $u->getTelephone(); ?></td>
                    <td colspan="2"><a href="<?= addLink('admin/postulant', '') ?>"><?= $u->getAdmin() == 'oui' ? 'Supprimer le role admin' : 'Ajouter le role admin' ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
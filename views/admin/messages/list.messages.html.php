<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>

<h1><?= $h1 ?></h1>

<table class="table" id="table-messages-list">
    <thead>
        <tr>
            <th scope="col">Date Message</th>
            <th scope="col">Nom</th>
            <th scope="col">email</th>
            <th scope="col">Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $li): ?>
            <tr>
                <td><?= (new DateTime($li['date_message']))->format('d M Y h:i:s') ?></td>
                <td><?= $li['nom']; ?>
                    <?= $li['prenom']; ?></td>
                <td><?= $li['email']; ?></td>
                <td><?= $li['message']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


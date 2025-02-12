<?php
$mode = $mode ?? "insertion";
require "views/errors_form.html.php";
?>

<form method="post">
    <div class="form-group mt-3">
        <label for="gender">Civilité
            <sup>*</sup>
        </label>
        <select class="form-select" aria-label="Default select example" id="gender" name="gender" required>
            <option value="M." <?= ($user->getGenre() === 'M.') ? 'selected' : ''; ?>>Monsieur</option>
            <option value="MME" <?= ($user->getGenre() === 'MME') ? 'selected' : ''; ?>>Madame</option>
        </select>
    </div>
    <div class="form-group mt-3">
        <label for="lastname">Nom
            <sup>*</sup>
        </label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Entrez votre nom" value="<?= $user->getNom() ?>" <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="firstname">Prénom
            <sup>*</sup>
        </label>
        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Entrez votre prénom" value="<?= $user->getPrenom() ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>


    <div class="form-group mt-3">
        <label for="surname">Email
            <sup>*</sup>
        </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse e-mail" value="<?= $user->getEmail() ?>" <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="password">Mot de passe
            <sup>*</sup>
        </label>
        <input type="password" name="password" id="password" placeholder="Entrez un mot de passe" class="form-control" <?= $mode == "suppression" ? "disabled" : "" ?> required>
    </div>

    <div class="form-group mt-3">
        <label for="birthday">Date de naissance
            <sup>*</sup>
        </label>
        <input type="date" name="birthday" id="birthday" class="form-control" value="<?= $user->getDateNaissance() ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group mt-3">
        <label for="phone">Telephone
            <sup>*</sup>
        </label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrez votre numéro de téléphone" value="<?= $user->getTelephone() ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <?php if ($user->getAdmin() == "oui"): ?>
        <div class="form-group mt-3">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" value="<?= $user->getAdmin() ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary" name="register">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= addLink("user") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>


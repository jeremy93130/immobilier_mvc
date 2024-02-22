<a href="<?= addLink('home', 'list'); ?>"> <---- Retour</a>
<section id="detail_bien">
    <div class="col-4 mt-3">
        <div class="card" style="width: 50rem;">
            <img src="<?= ROOT . UPLOAD_BIENS_IMG . $bien->getImage(); ?>" alt="image-produit" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= substr($bien->getTitre(), 0, 50) . "..." ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?= $bien->getTitre() ?></h6>
                <p class="card-text"><?= $bien->getDescription(); ?></p>
                <div>
                    <p class="card-text"><?= $bien->getCodePostal() . "," . $bien->getVille() ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="contact_agence_detail">
        <div>
            <h2>Bien chez moi</h2>
            <div>
                <img src="<?= UPLOAD_LOGO_IMG . "logo_bien_chez_moi_rouge-removebg-preview.png" ?>" alt="logo agence">
            </div>
        </div>
        <hr>
        <h2>Des questions ?</h2>
        <form method="post">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone">
            </div>
            <div>
                <label for="message">Ajouter un message</label>
                <textarea name="message" id="textarea" cols="30" rows="5"></textarea>
            </div>
            <div>
                <button type="submit" id="contact_agence" name="submit_contact_agence">Contacter l'agence</button>
            </div>
        </form>
        <p></p>
    </div>
</section>


<h2>Formulaire d'ajout de bien à acheter/louer</h2>
<form method="post" enctype="multipart/form-data" id="ajout_bien_admin">
    <div>
        <label for="titre">Titre du bien :</label>
        <input type="text" id="titre" name="titre">
    </div>
    <div>
        <label for="description">Description du bien :</label>
        <textarea name="description" id="description" cols="30" rows="2"></textarea>
    </div>
    <div>
        <label for="style">Style :</label>
        <select name="style" id="style">
            <option value="Maison">Maison</option>
            <option value="Manoir">Manoir</option>
            <option value="Appartement">Appartement</option>
            <option value="Villa">Villa</option>
            <option value="Garage">Garage</option>
            <option value="Local_Commercial">Local Commercial</option>
        </select>
    </div>
    <div>
        <label for="nb_pieces">Nombre de pièces :</label>
        <input type="number" id="nb_pieces" name="nb_pieces">
    </div>
    <div>
        <label for="surface">Surface du bien :</label>
        <input type="number" id="surface" name="surface">m2
    </div>
    <div>
        <label for="zone">Code Postal :</label>
        <input type="number" id="zone" name="code_postal">
    </div>
    <div>
        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville">
    </div>
    <div>
        <label for="zone">Zone :</label>
        <select name="zone" id="zone">
            <option value="urbaine">Urbaine</option>
            <option value="industrielle">Industrielle</option>
            <option value="rurale">Rurale</option>
            <option value="pole_activite">Pole activité</option>
        </select>
    </div>
    <div>
        <label for="prixVente">Prix de Vente (si achat)</label>
        <input type="number" id="prixVente" name="vente">
    </div>
    <div>
        <label for="prixHC">Loyer Hors Charge (facultatif)</label>
        <input type="number" id="prixHC" name="hc">
    </div>
    <div>
        <label for="prixCC">Loyer Charges Comprises (facultatif)</label>
        <input type="number" id="prixCC" name="cc">
    </div>
    <div>
        <label for="parking">Parking ?</label>
        <select name="parking" id="parking">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="garage">Garage ?</label>
        <select name="garage" id="garage">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="balcon">Balcon ?</label>
        <select name="balcon" id="balcon">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="terrasse">Terrasse ?</label>
        <select name="terrasse" id="terrasse">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="jardin">Jardin ?</label>
        <select name="jardin" id="jardin">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="piscine">Piscine ?</label>
        <select name="piscine" id="piscine">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="ascenseur">Ascenseur ?</label>
        <select name="ascenseur" id="ascenseur">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="balcon">Balcon</label>
        <select name="balcon" id="balcon">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>

    </div>
    <div>
        <label for="terrasse">Terrasse</label>
        <select name="terrasse" id="terrasse">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="jardin">Jardin</label>
        <select name="jardin" id="jardin">
            <option value="oui">oui</option>
            <option value="non">non</option>
        </select>
    </div>
    <div>
        <label for="consommation">Consommation Energetique</label>
        <select name="consommation" id="consommation">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
        </select>
    </div>
    <div>
        <label for="etage">Etage :</label>
        <input type="number" name="etage" id="etage">
    </div>
    <div>
        <label for="image">Ajouter une image</label>
        <div>
            <input type="file" name="image" id="image">
        </div>
    </div>
    <div>
        <label for="type">Vente/Location</label>
        <select name="achat_location" id="achat_location">
            <option value="achat">Vente</option>
            <option value="location">Location</option>
        </select>
    </div>

    <div>
        <input type="submit" value="Enregistrer" name="ajout_bien">
    </div>
</form>
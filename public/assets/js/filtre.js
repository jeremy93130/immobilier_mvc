var url = window.location.origin + "/immobilier_mvc/home/list";
var img = window.location.origin + "/immobilier_mvc/uploads/biens/";
// click sur le filtre

var submit = $("#submit_filtre");
submit.on("click", function (e) {
  e.preventDefault();
  var formulaire = $("#formulaire_filtre").serialize();
  $.ajax({
    url: url,
    method: "POST", // Spécifiez la méthode POST pour envoyer les données
    data: formulaire,
    type: "application/json",
    success: function (response) {
      var home = $("#home");
      var htmlContent = "";
      // Gérer la réponse si nécessaire
      var dataFormulaire = JSON.parse(response);
      dataFormulaire.forEach((element, index) => {
        var prixOuLoyer =
          element.prix_vente !== null
            ? millier(element.prix_vente)
            : element.loyer_CC !== null
            ? millier(element.loyer_CC)
            : "Non spécifié";
        var parking = element.parking == "oui" ? " / Parking" : "";
        htmlContent +=
          '<div id="bien_home"><div class="img_home"><img src = "' +
          img +
          element.image +
          '"alt="image-produit" class="card-img-top"></div><div><h2>' +
          element.titre +
          "</h2>" +
          "<p style='font-weight: bold'>" +
          prixOuLoyer +
          " € </p><p> " +
          element.style +
          "</p><p>" +
          element.nb_pieces +
          " pièces / " +
          element.surface +
          " m² / " +
          element.etage +
          " Étages " +
          parking +
          '<p><a href="biens/detailBien/' +
          element.id +
          '">En savoir plus...</a></p></div></div>' +
          (index === dataFormulaire.length - 1 ? "" : "<hr>");
      });
      home.html(htmlContent);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

function millier(nombre) {
  return nombre.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

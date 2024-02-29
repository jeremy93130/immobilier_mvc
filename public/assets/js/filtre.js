var url =
  window.location.origin + "/immobilier_mvc/Form/FilterHandleRequest.php";
// click sur le filtre

var submit = $("#submit_filtre");
submit.on("click", function (e) {
  e.preventDefault();
  var data = {
    nb_pieces: $("#nb_pieces").val(),
    surface_min: $("#surface_min").val(),
    surface_max: $("#surface_max").val(),
    parking: $("#parking").prop("checked"),
    ascenseur: $("#ascenseur").prop("checked"),
    garage: $("#garage").prop("checked"),
    jardin: $("#jardin").prop("checked"),
    terrasse: $("#terrasse").prop("checked"),
    piscine: $("#piscine").prop("checked"),
    balcon: $("#balcon").prop("checked"),
  };
  console.log(data);
  $.ajax({
    url: url,
    method: "POST", // Spécifiez la méthode POST pour envoyer les données
    data: JSON.stringify(data),
    type: "application/json",
    success: function (response) {
      // Gérer la réponse si nécessaire
      console.log(response);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

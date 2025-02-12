document.addEventListener('DOMContentLoaded', function () {
  const button = document.querySelector('#submit_filtre');

  button.addEventListener('click', function () {
    const nb_pieces = document.querySelector('#nb_pieces').value;
    const surfaceMin = document.querySelector('#surface_min').value;
    const surfaceMax = document.querySelector('#surface_max').value;
    const parking = document.querySelector('#parking').checked;
    const ascenseur = document.querySelector('#ascenseur').checked;
    const garage = document.querySelector('#garage').checked;
    const jardin = document.querySelector('#jardin').checked;
    const balcon = document.querySelector('#balcon').checked;
    const terrasse = document.querySelector('#terrasse').checked;
    const piscine = document.querySelector('#piscine').checked;

    const URL = this.getAttribute('data-url');
    console.log(URL);

    const data = {
      nb_pieces,
      surfaceMin,
      surfaceMax,
      parking,
      ascenseur,
      garage,
      jardin,
      balcon,
      terrasse,
      piscine
    };

    // Vérifiez si aucun filtre n'est sélectionné
    const noFiltersSelected = Object.values(data).every(value => value === "" || value === false);

    fetch(URL, {
      method: "POST",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(result => result.json())
      .then(result => {
        const BIENS = document.querySelectorAll('.bien_home');

        if (noFiltersSelected) {
          // Si aucun filtre n'est sélectionné, affichez tous les éléments
          BIENS.forEach(bien => {
            bien.style.display = 'flex';
          });
        } else {
          // Sinon, filtrez les éléments en fonction des résultats
          result.bien.forEach(item => {
            BIENS.forEach(bien => {
              bien.querySelector('h2').textContent.trim() !== item.titre
                ? (bien.style.display = 'none')
                : (bien.style.display = 'flex');
            });
          });
        }
      })
      .catch(error => console.log(error));
  });
});



function millier(nombre) {
  return nombre.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

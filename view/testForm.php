<!DOCTYPE html>
<html>
<head>
  <style>
    .disabled-page {
      pointer-events: none;
      opacity: 0.5;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <button id="lockButton">Bloquer la page</button>

  <div id="formContainer" class="hidden">
    <form id="myForm">
      <label for="inputField">Champ unique :</label>
      <input type="text" id="inputField" name="inputField" required>
      <button type="submit">Soumettre</button>
    </form>
  </div>

  <script>
    // Récupérer les éléments du DOM
const lockButton = document.getElementById("lockButton");
const formContainer = document.getElementById("formContainer");
const myForm = document.getElementById("myForm");

// Fonction pour bloquer/débloquer la page
function togglePageLock() {
  document.body.classList.toggle("disabled-page");
}

// Fonction pour afficher/masquer le formulaire
function toggleFormDisplay() {
  formContainer.classList.toggle("hidden");
}

// Gérer l'événement de clic sur le bouton de verrouillage
lockButton.addEventListener("click", () => {
  togglePageLock();
  toggleFormDisplay();
});

// Gérer l'événement de soumission du formulaire
myForm.addEventListener("submit", (event) => {
  event.preventDefault(); // Empêcher le rechargement de la page

  const inputField = document.getElementById("inputField");
  if (inputField.value !== "") {
    togglePageLock();
    toggleFormDisplay();
    alert("Formulaire soumis !");
  } else {
    alert("Veuillez remplir le champ unique !");
  }
});
  </script>
</body>
</html>
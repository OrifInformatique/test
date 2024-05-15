// Déplacement du bonhomme ASCII
let bonhommePosition = -100; // Position initiale à gauche de la fenêtre
const bonhommeElement = document.getElementById("bonhomme");

function moveBonhomme() {
    bonhommePosition += 10; // Déplace le bonhomme de 10 pixels à chaque fois
    bonhommeElement.style.left = bonhommePosition + "px";

    // Réinitialise la position lorsque le bonhomme atteint la fin de la page
    if (bonhommePosition > window.innerWidth) {
        bonhommePosition = -100;
    }
}

// Appeler la fonction de déplacement du bonhomme toutes les 100ms
setInterval(moveBonhomme, 100);

// Déplacement du bonhomme ASCII
let bonhommeXPos = -100; // Position initiale à gauche de la fenêtre
const bonhommeElement = document.getElementById("bonhomme");

let obstacleXPos = 1800; // Position initiale à droite de la fenêtre
const obstacleElement = document.getElementById("obstacle");

let obstacle2XPos = 1500; // Position initiale à droite de la fenêtre
const obstacle2Element = document.getElementById("obstacle2");

let bonhommeYPos = 440; // Position initiale sur l'axe vertical

let obstacleYPos = 450; // Position initiale sur l'axe vertical

let obstacle2YPos = 520; // Position initiale sur l'axe vertical

function moveElements() {
    bonhommeXPos += 10; // Déplace le bonhomme de 10 pixels à chaque fois
    bonhommeElement.style.left = bonhommeXPos + "px";

    obstacleXPos -= 10; // Déplace l'obstacle de 10 pixels à chaque fois
    obstacleElement.style.left = obstacleXPos + "px";

    obstacle2XPos -= 10; // Déplace l'obstacle de 10 pixels à chaque fois
    obstacleElement.style.left = obstacleXPos + "px";

    // Réinitialise la position lorsque le bonhomme atteint la fin de la page
    if (bonhommeXPos > window.innerWidth) {
        bonhommeXPos = -100;
    }
    // Réinitialise la position lorsque l'obstacle atteint la fin de la page
    if (obstacleXPos < -100) {
        obstacleXPos = 1800;
    }
    // Réinitialise la position lorsque l'obstacle2 atteint la fin de la page
    if (obstacle2XPos < -100) {
        obstacle2XPos = 1500;
    }
    // Calcule la différence de distance sur l'axe vertical et horizontal pour savoir si le bonhomme est trop proche de l'obstacle et le faire disparaître
    if(Math.abs(obstacleXPos - bonhommeXPos) - (bonhommeYPos - obstacleYPos) < 40){
      bonhommeElement.style.color = "Blue";
    }
    // Calcule la différence de distance sur l'axe vertical et horizontal pour savoir si le bonhomme est trop proche de l'obstacle2 et le faire disparaître
    if(Math.abs(obstacle2XPos - bonhommeXPos) - (bonhommeYPos - obstacle2YPos) < 40){
      bonhommeElement.style.color = "Red";
    }
}

// Appeler la fonction de déplacement du bonhomme toutes les 100ms
setInterval(moveElements, 100);

// Fait monter le bonhomme
function jump()
{
  bonhommeYPos -= 10;
  bonhommeElement.style.top = bonhommeYPos + "px";
}
// Fait descendre le bonhomme
function stepDown()
{
  bonhommeYPos += 10;
  bonhommeElement.style.top = bonhommeYPos + "px";
}

window.addEventListener("keydown", function (event) {
    if (event.defaultPrevented) {
      return; // Ne fait rien si l'évenement a déjà été effectué
    }
    // fait monter ou descendre le bonhomme suivant si on appuie sur la touche des flèches du bas ou du haut
    switch (event.key) {
      case "ArrowDown":
        if(bonhommeYPos < 440)
          {
            stepDown()
          }
        break;
      case "ArrowUp":        
        jump()
        break;
      default:
        return;
    }
    // Annule l'action par défaut pour éviter d'être traitée deux fois
    event.preventDefault();
  });
  

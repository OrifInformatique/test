// Déplacement du bonhomme ASCII
let bonhommeXPos = -100; // Position initiale à gauche de la fenêtre
const bonhommeElement = document.getElementById("bonhomme");

let obstacleXPos = 1800; // Position initiale à droite de la fenêtre
const obstacleElement = document.getElementById("obstacle");

let bonhommeYPos = 440; // Position initiale sur l'axe vertical

let obstacleYPos = 450; // Position initiale sur l'axe vertical

let grav = 0.5; // Gravité

let xspd = 2; // Vitesse sur l'axe horizontal
let yspd = 0; // Vitesse sur l'axe vertical

let jumpSpd = 15; // Vitesse de saut
let canJump = false

function moveElements() {

    yspd += grav; // Applique la gravité à la vitesse vertical 
  
    

    bonhommeXPos += xspd;
    bonhommeYPos += yspd; // Met à jour la position verticale en fonction de la vitesse
    bonhommeElement.style.top = bonhommeYPos + "px";
    bonhommeElement.style.left = bonhommeXPos + "px";

    if(bonhommeYPos > 440) // Empêche le bonhomme de tomber en dessous du sol
    {
      bonhommeYPos = 440;
      canJump = true
      yspd = 0;
    }else{
      canJump = false
    }

    obstacleXPos -= 2; // Déplace l'obstacle de 10 pixels à chaque fois
    obstacleElement.style.left = obstacleXPos + "px";

    // Réinitialise la position lorsque le bonhomme atteint la fin de la page
    if (bonhommeXPos > window.innerWidth) {
        bonhommeXPos = -100;
    }
    // Réinitialise la position lorsque l'obstacle atteint la fin de la page
    if (obstacleXPos < -100) {
        obstacleXPos = window.innerHeight;
    }
    // Calcule la différence de distance sur l'axe vertical et horizontal pour savoir si le bonhomme est trop proche de l'obstacle et le faire disparaître
    if(Math.abs(obstacleXPos - bonhommeXPos) - (bonhommeYPos - obstacleYPos) < 40){
      bonhommeElement.style.color = "Blue";
    }
}

// Appeler la fonction de déplacement du bonhomme toutes les 100ms
setInterval(moveElements, 10);

// Fait monter le bonhomme
function jump()
{
  if(!canJump) return
  yspd = -jumpSpd;
}

window.addEventListener("keydown", function (event) {
    if (event.defaultPrevented) {
      return; // Ne fait rien si l'évenement a déjà été effectué
    }
    // fait monter ou descendre le bonhomme suivant si on appuie sur la touche des flèches du bas ou du haut
    switch (event.key) {
      case "ArrowUp":        
        jump()
        break;
      default:
        return;
    }
    // Annule l'action par défaut pour éviter d'être traitée deux fois
    event.preventDefault();
  });
  

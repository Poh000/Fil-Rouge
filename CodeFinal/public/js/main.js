// Récupère les constantes 

const carousel = document.querySelector('.carousel'); // Récupère la classe carousel
const items = [...carousel.children]; // Récupère ce qu'il y a dans le carousel
const itemWidth = 160; // Définit la largeur d'un item
const totalItems = items.length; // Compte le nombre d'items dans le carousel

let positions = []; // Crée un tableau pour stocker les positions

items.forEach((item, i) => {
  positions[i] = i * itemWidth; // Position horizontale d'un item
  item.style.left = positions[i] + 'px'; // Applique la position au style left pour décaler l'image
  item.style.position = 'absolute'; // Ajoute position absolute à l'item pour que le style fonctionne
});

function deplacer() {
  items.forEach((item) => {
    item.style.transition = 'left 0.5s ease'; // Ajoute une transition pour le déplacement à gauche
  });

  for (let i = 0; i < totalItems; i++) {
    positions[i] -= itemWidth; // Décrémente sa position pour le décaler d'un cran à gauche
    items[i].style.left = positions[i] + 'px'; // Modifie sa position
  }

  setTimeout(() => {
    for (let i = 0; i < totalItems; i++) {
      if (positions[i] < -itemWidth) {
        items[i].classList.add('hidden'); // Cache l'image pour la renvoyer à la fin sans que cela se voie

        const maxPos = Math.max(...positions); // Calcule la position maximale de tous les éléments
        positions[i] = maxPos + itemWidth;

        items[i].style.transition = 'none';
        items[i].style.left = positions[i] + 'px'; // On le replace à la fin

        setTimeout(() => {
          items[i].classList.remove('hidden'); // Affiche à nouveau l'item
        }, 20);
      }
    }
  }, 600);
}

setInterval(deplacer, 2000);



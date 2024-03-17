window.onload = function() { // quand la page est prête  j'attache un événement au clic sur le pack
    const pack = document.getElementById("hp-pack"); // je récupère la zone où tu cliques pour ouvrir le pack
    pack.addEventListener("click", openPack);
}

function randomNumber(min, max) { // fonction qui te donne un nombre aléatoire entre les valeurs min et max
    return Math.floor(Math.random() * (max - min) + min);
} 

function openPack() { // fonction qui s'exécute quand tu cliques sur le pack
    const cardContainer = document.getElementById("hp-cards-opened"); // je récupère la zone où sont affichées les cartes
    const allCards = document.querySelectorAll(".hp-card"); // je récupère toutes les cartes en même temps

    // je regarde si tu peux ouvrir le pack en fonction de la dernière fois que tu l'as ouvert
    const currentTime = new Date().getTime(); // je récupère la date et l'heure actuelle
    const lastOpenTime = localStorage.getItem("lastOpenTime"); // je récupère la dernière fois que tu as ouvert le pack

    // si tu peux ouvrir le pack
    if (!lastOpenTime || (currentTime - lastOpenTime > 24 * 60 * 60 * 1000)) { // je vérifie si tu as attendu au moins 24 heures
        // je réinitialise la zone des cartes
        cardContainer.innerHTML = '';

        // je crée une liste de 4 cartes au hasard
        const uniqueCardIndexes = [];

        while (uniqueCardIndexes.length < 4) { // je choisis 4 cartes au hasard
            const randomIndex = randomNumber(0, allCards.length);
            if (!uniqueCardIndexes.includes(randomIndex)) {
                uniqueCardIndexes.push(randomIndex);
            }
        }
        
        // j'affiche les 4 cartes choisies
        uniqueCardIndexes.forEach(index => {
            const card = allCards[index].cloneNode(true); // je clone la carte sélectionnée
            cardContainer.appendChild(card);
        });

        localStorage.setItem("lastOpenTime", currentTime); // j'enregistre l'heure à laquelle tu as ouvert le pack dans ta mémoire locale
    } else {
        alert("Vous avez déjà ouvert le pack aujourd'hui. Attendez 24 heures avant de pouvoir ouvrir à nouveau le pack."); // si tu ne peux pas ouvrir le pack, je te dis d'attendre
    }
}
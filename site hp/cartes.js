const jobs = [
    {
    title: "Software Engineer",
    image: "images/software-engineer.svg",
    link: "#",
    },
]


















const http = require('http');
const url = require('url');

// Fonction pour traiter la demande et renvoyer la réponse
const handleRequest = (req, res) => {
    const parsedUrl = url.parse(req.url, true);
    const pathName = parsedUrl.pathname;
    const query = parsedUrl.query;

    if (pathName === '/cartes' && query.id) {
        // Si l'URL est /cartes?id=:id
        const carteId = query.id;
        res.writeHead(200, { 'Content-Type': 'text/plain' });
        res.end(`Détails de la carte avec l'identifiant ${carteId}`);
    } else if (pathName.startsWith('/cartes/')) {
        // Si l'URL est /cartes/:id
        const carteId = pathName.split('/')[2]; // Extrait l'identifiant de l'URL
        res.writeHead(200, { 'Content-Type': 'text/plain' });
        res.end(`Détails de la carte avec l'identifiant ${carteId}`);
    } else {
        // Si l'URL n'est pas valide
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('Page non trouvée');
    }
};

// Créer le serveur HTTP
const server = http.createServer(handleRequest);

// Ecouter le port 3000
server.listen(3000, () => {
    console.log('Serveur démarré sur le port 3000');
});

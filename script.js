/*document.getElementById('adminSignupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Envoyer les données au serveur
});

document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Envoyer les données au serveur pour la connexion
});

document.getElementById('studentSignupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Envoyer les données d'inscription étudiant au serveur
});

// Ajouter des fonctions pour gérer la liste des étudiants (non archivés et archivés)

let inactivityTimer;
const inactivityLimit = 60 * 1000; // 1 minute

function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(() => {
        window.location.href = 'logout.php'; // Rediriger vers la déconnexion
    }, inactivityLimit);
}

document.addEventListener('mousemove', resetInactivityTimer);
document.addEventListener('keypress', resetInactivityTimer);

// Initialiser le timer
resetInactivityTimer();

function showModal(title, content) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>${title}</h2>
            <p>${content}</p>
        </div>
    `;
    document.body.appendChild(modal);
    
    const closeBtn = modal.querySelector('.close-btn');
    closeBtn.onclick = () => document.body.removeChild(modal);
    window.onclick = (event) => {
        if (event.target === modal) {
            document.body.removeChild(modal);
        }
    };
}
*/

// Fonction pour générer un matricule
function generateMatricule(type) {
    const prefix = type === 'student' ? 'E' : 'A';
    const randomNumber = Math.floor(10000 + Math.random() * 90000);
    return `${prefix}${randomNumber}`;
}

// Fonction pour afficher le modal
function showModal(title, content) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>${title}</h2>
            <p>${content}</p>
        </div>
    `;
    document.body.appendChild(modal);

    const closeButton = modal.querySelector('.close-btn');
    closeButton.addEventListener('click', () => {
        document.body.removeChild(modal);
    });

    // Fermer le modal après 10 secondes
    setTimeout(() => {
        if (document.body.contains(modal)) {
            document.body.removeChild(modal);
        }
    }, 10000);
}

// Gestion du formulaire d'inscription administrateur
document.getElementById('adminSignupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;

    const matricule = generateMatricule('admin');
    const content = `Nom: ${nom}<br>Prénom: ${prenom}<br>Email: ${email}<br>Role: ${role}<br>Matricule: ${matricule}`;
    showModal('Administrateur Créé', content);

    // Envoyer les données au serveur
    // ...
});

// Gestion du formulaire d'inscription étudiant
document.getElementById('studentSignupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const dob = document.getElementById('dob').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const niveau = document.getElementById('niveau').value;

    const matricule = generateMatricule('student');
    const content = `Nom: ${nom}<br>Prénom: ${prenom}<br>Date de Naissance: ${dob}<br>Email: ${email}<br>Téléphone: ${phone}<br>Niveau: ${niveau}<br>Matricule: ${matricule}`;
    showModal('Étudiant Créé', content);

    // Envoyer les données au serveur
    // ...
});

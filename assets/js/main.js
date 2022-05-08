// Loder du site
window.addEventListener('load', () => {
    // Recuperer le loader
    const loader = document.querySelector('.loader');
    // Ajouter la class hidden au loader si la page est chargée completement et le supprimer si la page est rechargée
    loader.classList.add('hidden');
})

// If getCurrentPosition is successful
function success(position) {
    var crd = position.coords;
    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);
    
    // Recuperer le div du map
    const map = document.querySelector('#map');
    const coords = document.querySelector('#coords');
    const geoIcons = document.querySelector('.bi-geo-alt');
    // Remplacer l'icone par un checkmark
    geoIcons.classList.replace('bi-geo-alt', 'bi-check2');
    
    // Recuperer le button de localisation
    const localisation = document.querySelector('.btn-address');
    localisation.classList.add('btn-green');
    localisation.innerHTML = '<i class="bi bi-check2"></i> Localisé';
    
    coords.value = `${crd.latitude}, ${crd.longitude}`;
    // Show the coordinates in the maps
    // map.classList.remove('hidden');
    // map.innerHTML = `<iframe height="250" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCbIDHtO6Zg7oWk5ve9j1YRew1mwa33LlY&center=${crd.latitude},${crd.longitude}&zoom=18&maptype=satellite" allowfullscreen> </iframe>`;
    
}

// options for getCurrentPosition
var options = {
    enableHighAccuracy: true,
    timeout: 100000,
    maximumAge: 0
};

// If getCurrentPosition is not successful
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

// Recuperer le button de geolocalisation
const button = document.querySelector('#btn-address');
if(button) {
    button.addEventListener('click', () => {
        // Recuperer la position de l'utilisateur
        navigator.geolocation.getCurrentPosition(success, error, {timeout: 10000});
    });
}

window.addEventListener('load', () => {
    // systeme de note pour permetre aux client de noter un produit
    // Recuperer uniquement les etoiles du formulaire
    const note_input = document.getElementsByClassName('note');
    let statrs_form = document.querySelector('.stars_form');
    if(statrs_form != null){
        
        const star_hovered = document.querySelector('.star-hovered');
        const stars = statrs_form.children;
        
        // Recuperer l'input
        const note = document.querySelector('#rate');
        
        // Boucler sur les etoiles pour ajouter des ecouters d'evenements
        for(star of stars){
            // Ecouter le survole
            star.addEventListener('mouseover', function() {
                resetStars();
                this.className = 'bi-star-fill';
                this.classList.toggle('selected');
                this.style.color = '#ffc107';
                star_hovered.innerHTML = 'Donner une note de ' + this.dataset.value + '/5';
                // Recuperer l'element precedant l'element survolé du meme type
                prviousStar(this);
            });
            
            // Ecouter le clic sur l'etoile pour la noter
            star.addEventListener('click', function() {
                resetStars();
                this.className = 'bi-star-fill';
                this.classList.toggle('selected');
                this.style.color = '#ffc107';
                note.value = this.dataset.value;
                
                prviousStar(this);
                
            });
            
            // Qand le sourie sort de l'etoile, on remet les etoiles a leur etat initial
            star.addEventListener('mouseout', function() {
                resetStars(note.value);
            });
        }
    }
    
    // Recuperer la note actuelle
    let stars_rating = document.querySelector('.stars_rating');
    if(stars_rating != null){    
        const ratings = stars_rating.children;
        // Recuperer la note moyenne du produit
        const rating_value = document.querySelector('.rating_value');
        rateToShow(ratings, rating_value);
    }
    
    // Recuperer les etoiles de l'avis utilisateur
    const stars_users = document.querySelectorAll('div.stars_users');
    if(stars_users != null){   
        // Recuperer toute les stars_users elements et appliquer le ratToShow a chaque stars_users;
        for(star_user of stars_users){
            const stars_user = star_user.children;
            let note_user = star_user.dataset.value;
            rateToShow(stars_user, star_user);
        }
    }
    
    // Function pour mettre en forme les etoile sur l'affichage de la note
    function rateToShow(rates, rate_value){
        // Remplir l'etoile si l'etoile est egale ou superieur a la note
        for(rating of rates){
            // Recuperer l'element suivant de meme type pour le remplir d'une etoile a moitier pleine si la note est superieur a la note de l'etoile mais inferieur a la note suivante
            let next_rating = rating.nextElementSibling;
            if(rating.dataset.value <= rate_value.dataset.value){
                rating.className = 'bi-star-fill';
                rating.classList.add('selected');
                rating.style.color = '#ffc107';
                
                if(next_rating && rate_value.dataset.value > rating.dataset.value && rate_value.dataset.value < next_rating.dataset.value){
                    next_rating.className = 'bi-star-half';
                    next_rating.classList.add('selected');
                    next_rating.style.color = '#ffc107';
                }
            }
        }
    }
    
    function resetStars(note = 0) {
        for(star of stars){
            if(star.dataset.value <= note){
                star.className = 'bi-star-fill';
                star.style.color = '#ffc107';
            }else{
                star.className = 'bi-star';
                star.style.color = 'black';
            }
        }
        
        if(note.value > 0){
            star_hovered.innerHTML = 'Vous donnez une note de ' + note + '/5';
        }else{
            star_hovered.innerHTML = 'Donner une note';
        }
    }
    
    function prviousStar(star) {
        let previous = star.previousElementSibling;
        
        while(previous){
            previous.className = 'bi-star-fill';
            previous.classList.toggle('selected');
            previous.style.color = '#ffc107';
            
            previous = previous.previousElementSibling;
        }
    }
    
    // fin du systeme de note
});
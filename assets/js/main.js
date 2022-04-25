const pointure_input = document.getElementsByClassName('pointure');
const pointure_list = document.getElementsByClassName('pointure_list');

for (let i = 0; i < pointure_input.length; i++) {
    let valeur_pointure = pointure_input[i].value;
    pointure_input[i].classList.add('pointure-' + valeur_pointure);
}

window.onload = () => {
    // systeme de note pour permetre aux client de noter un produit
    // Recuperer uniquement les etoiles du formulaire
    const note_input = document.getElementsByClassName('note');
    let statrs_form = document.querySelector('.stars_form');
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
    
    // Recuperer la note actuelle
    let stars_rating = document.querySelector('.stars_rating');
    const ratings = stars_rating.children;
    // Recuperer la note moyenne du produit
    const rating_value = document.querySelector('.rating_value');
    rateToShow(ratings, rating_value);
    
    // Recuperer les etoiles de l'avis utilisateur
    const stars_users = document.querySelectorAll('div.stars_users');
    
    // Recuperer toute les stars_users elements et appliquer le ratToShow a chaque stars_users;
    for(star_user of stars_users){
        const stars_user = star_user.children;
        let note_user = star_user.dataset.value;
        rateToShow(stars_user, star_user);
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
}
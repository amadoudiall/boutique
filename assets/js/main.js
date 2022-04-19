const pointure_input = document.getElementsByClassName('pointure');
const pointure_list = document.getElementsByClassName('pointure_list');

for (let i = 0; i < pointure_input.length; i++) {
    let valeur_pointure = pointure_input[i].value;
    pointure_input[i].classList.add('pointure-' + valeur_pointure);
}

// systeme de note pour permetre aux client de noter un produit
window.onload = () => {
    // Recuperer les etoiles
    const stars = document.querySelectorAll('.bi-star');
    
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
}
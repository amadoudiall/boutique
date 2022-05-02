
// Formulaire de l'ajout de produit
// Rucuperer l'input toColorise
const toColorise = document.querySelectorAll('#toColorise');
// Recuperer le conteneur des couleurs
const color_container = document.querySelector('.color_container');
// Ajouter la class hidden au conteneur des couleurs si l'input toColorise n'est pas coché
toColorise.forEach(function(input){
    input.addEventListener('change', function(){
        if(input.checked){
            color_container.classList.remove('hidden');
        }else{
            color_container.classList.add('hidden');
        }
    });
});

// Recuperer les couleurs
const colors_parent = document.querySelector('.vueColor');
const colors = colors_parent.children;
const color_inputs = document.querySelector('#color_input');
const color_value = color_inputs.value;
const color_tab_value = color_value.split('|');
for (color of colors){
    // Ci l'utilisateur click sur les enfant de vueColor Ajouter la valeur de la couleur dans un tableau puis l'ajouter dans l'input
    color.addEventListener('click', function(){
        if(color_tab_value.includes(this.dataset.value) === false){
            color_tab_value.push(this.dataset.value);
            color_inputs.value = color_tab_value.join('|');
        }else{
            color_tab_value.splice(color_tab_value.indexOf(this.dataset.value), 1);
            color_inputs.value = color_tab_value.join('|');
        }
        this.classList.toggle('selected');
    });
}
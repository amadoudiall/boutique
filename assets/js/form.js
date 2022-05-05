
// Formulaire de l'ajout de produit
// Rucuperer l'input toColorise
const toColorise = document.querySelectorAll('#toColorise');
// Recuperer le conteneur des couleurs
const color_container = document.querySelector('.color_container');
// Rucuperer l'input toSize
const toSize = document.querySelectorAll('#toSize');
// Recuperer le conteneur des tailles
const size_container = document.querySelector('.size_container');
// Rucuperer l'input toShoeSize
const toShoeSize = document.querySelectorAll('#toShoeSize');
// Recuperer le conteneur des tailles de chaussures
const shoeSize_container = document.querySelector('.shoeSize_container');
// Recuperer l'input toDimension
const toDimension = document.querySelectorAll('#toDimention');
// Recuperer le conteneur des dimensions
const dimension_container = document.querySelector('.dimension_container');

// Ajouter la class hidden au conteneur des couleurs si l'input toColorise n'est pas coché
if(toColorise != null){
    toColorise.forEach(function(input){
        input.addEventListener('change', function(){
            if(input.checked == false){
                color_container.classList.add('hidden');
            }else{
                color_container.classList.remove('hidden');
            }
        });
    });
}

// Recuperer les couleurs
const colors_parent = document.querySelector('.vueColor');
// Verifier si colors_parent existe
if(colors_parent != null){
    const colors = colors_parent.children;
    const color_inputs = document.querySelector('#color_input');
    const color_value = color_inputs.value;
    const color_tab_value = color_value.split('|');
    for (color of colors){
        // Ci l'utilisateur click sur les enfant de vueColor Ajouter la valeur de la couleur dans un tableau puis l'ajouter dans l'input
        color.addEventListener('click', function(){
            this.classList.toggle('selected');
            
            if(color_tab_value.includes(this.dataset.value) === false){
                color_tab_value.push(this.dataset.value);
                color_inputs.value = color_tab_value.join('|');
            }else{
                color_tab_value.splice(color_tab_value.indexOf(this.dataset.value), 1);
                color_inputs.value = color_tab_value.join('|');
            }
        });
    }
}

// Ajouter la class hidden au conteneur des tailles si l'input toSize n'est pas coché
if(toSize != null){
    toSize.forEach(function(input){
        input.addEventListener('change', function(){
            if(input.checked == false){
                size_container.classList.add('hidden');
            }else{
                size_container.classList.remove('hidden');
            }
        });
    });
}

// Recuperer les tailles
const sizes_parent = document.querySelector('.vueSize');
// Verifier si sizes_parent existe
if(sizes_parent != null){
    const sizes = sizes_parent.children;
    const size_inputs = document.querySelector('#size_input');
    const size_value = size_inputs.value;
    const size_tab_value = size_value.split('|');
    for (size of sizes){
        // Ci l'utilisateur click sur les enfant de vueSize Ajouter la valeur de la taille dans un tableau puis l'ajouter dans l'input
        size.addEventListener('click', function(){
            if(size_tab_value.includes(this.dataset.value) === false){
                size_tab_value.push(this.dataset.value);
                size_inputs.value = size_tab_value.join('|');
            }else{
                size_tab_value.splice(size_tab_value.indexOf(this.dataset.value), 1);
                size_inputs.value = size_tab_value.join('|');
            }
            this.classList.toggle('selected');
        });
    }
}

// Ajouter la class hidden au conteneur des tailles de chaussures si l'input toShoeSize n'est pas coché
if(toShoeSize != null){
    toShoeSize.forEach(function(input){
        input.addEventListener('change', function(){
            if(input.checked == false){
                shoeSize_container.classList.add('hidden');
            }else{
                shoeSize_container.classList.remove('hidden');
            }
        });
    });
}

// Recuperer les tailles de chaussures
const shoeSizes_parent = document.querySelector('.vueShoeSize');
// Verifier si le conteneur des tailles de chaussures existe dans la page
if(shoeSizes_parent != null){
    const shoeSizes = shoeSizes_parent.children;
    const shoeSize_inputs = document.querySelector('#shoeSize_input');
    const shoeSize_value = shoeSize_inputs.value;
    const shoeSize_tab_value = shoeSize_value.split('|');
    for (shoeSize of shoeSizes){
        // Ci l'utilisateur click sur les enfant de vueShoeSize Ajouter la valeur de la taille de chaussure dans un tableau puis l'ajouter dans l'input
        shoeSize.addEventListener('click', function(){
            if(shoeSize_tab_value.includes(this.dataset.value) === false){
                shoeSize_tab_value.push(this.dataset.value);
                shoeSize_inputs.value = shoeSize_tab_value.join('|');
            }else{
                shoeSize_tab_value.splice(shoeSize_tab_value.indexOf(this.dataset.value), 1);
                shoeSize_inputs.value = shoeSize_tab_value.join('|');
            }
            this.classList.toggle('selected');
        });
    }
}


// Ajouter la class hidden au conteneur des dimensions si l'input toDimension n'est pas coché
if(toDimension != null){
    toDimension.forEach(function(input){
        input.addEventListener('change', function(){
            if(input.checked == false){
                dimension_container.classList.add('hidden');
            }else{
                dimension_container.classList.remove('hidden');
            }
        });
    });
}

// Page produit form > add_to_cart
// Recuperer le conteneur du champ quantité
const quantity_container = document.querySelector('.quantity_input');
// Verifier si le conteneur du champ quantité existe dans la page
if(quantity_container != null){ 
    // Recuperer le champ pour la quantité
    const quantity_input = document.querySelector('#quantity_input');
    // Recuperer le button pour incrementer la quantité
    const quantity_plus = document.querySelector('#plus');
    // Recuperer le button pour diminuer la quantité
    const quantity_moin = document.querySelector('#moin');
    // Gerer l'incrementation de la quantité avec le button plus
    quantity_plus.addEventListener('click', function(){
        if(quantity_input.value < 10){
            quantity_input.value++;
        }
    });
    // Gerer l'incrementation de la quantité avec le button moin
    quantity_moin.addEventListener('click', function(){
        if(quantity_input.value > 1){
            quantity_input.value--;
        }
    });
}
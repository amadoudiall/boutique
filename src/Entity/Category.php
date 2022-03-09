<?php
namespace App\Entity;
class Category
{
    //Nom de la categorie
    public string $nom;
    //Description de la categorie
    public string $description;

    //Construction de la categorie
    public function __construct(string $nom, string $description)
    {
        $this->nom = $nom;
        $this->description = $description;
    }

    //Permet d'afficher directement la categorie avec tout ces detaille.
    public function showCategory()
    {
        echo 'Catégorie :' . $this->nom . '<br>';
        echo 'description :' . $this->description . '<br>';
    }
}

<?php

namespace App\Controller;

session_start();

use \App\Entity\User;
use \App\Entity\Panier;

class Connection
{

    protected $erreur;
    protected $success;
    
    // Login permet d'identifier l'utilisateur;
    public function Login()
    {
        // Vérifie si l'utilisateur a bien saisit le formulaire;
        if (
            isset($_POST['username']) and isset($_POST['pwd'])
            and !empty($_POST['username']) and !empty($_POST['pwd'])
        ) {
            // Recupère et sécurise le Username;
            $username = htmlspecialchars($_POST['username']);
            // Hasher le mot de passe;
            $pwd = sha1($_POST['pwd']);
            
            // Récuperer les utilisateurs dans un instance de l'entity User();
            $users = new User();
            
            // Récuperer l'utilisateur par sont Userame (Téléphone ou E-mail);
            $result = $users->getUserByLogin($username, $pwd);

            // Verifier si L'utilisateur existe dans la base de données;
            if ($result != null) {
                
                // Verifier si le Username correspond à celui du formulaire;
                if ($result['email'] == $username or $result['tel'] == $username) {
                    
                    // Verifier si le mot de passe correspond à celui du formulaire;
                    if ($result['pwd'] === $pwd) {
                        
                        // Initialiser la session['user'];
                        $_SESSION['user'] = $result;
                        $userId = $_SESSION['user']['id'];
                        
                        // SessionId concerne le panier;
                        $sessionId = null;
                        
                        // Verifier si le panier existe déjà;
                        if(isset($_SESSION['panier']['id'])){
                            $sessionId = $_SESSION['panier']['id'];
                        }
                        // Récupérer l'instance du panier;
                        $panier = new Panier();
                        
                        // Mettre à jour le panier pour charger $userId;
                        $panier->isCnnected($userId, $sessionId);

                        header('location: /');
                    } else {
                        $this->setErreur('Mot de passe incorecte !');
                    }
                } else {
                    $this->setErreur('Téléphone, E-mail incorecte !');
                }
            }else{
                $this->setErreur('Identifiant incorrecte !');
            }
        } else {
            $this->setErreur('Veuillez remplire tout les champs !');
        }
    }

    /*
    * @Return void;
    * Pour gèrer les erreures;
    */
    public function setErreur($erreur)
    {
        $this->erreur = $erreur;
    }

    public function getErreur()
    {
        return $this->erreur;
    }

    /*
    * @Return void;
    * Pour gèrer la déconnection;
    */
    public function Logout()
    {
        unset($_SESSION['user']);
    }
}

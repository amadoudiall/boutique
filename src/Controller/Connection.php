<?php

namespace App\Controller;

session_start();

use \App\Entity\User;
use \App\Entity\Panier;

class Connection
{

    protected $erreur;
    protected $success;
    protected $warning;
    
    // Login permet d'identifier l'utilisateur;
    public function Login($last)
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
                    if ($result['pwd'] == $pwd) {
                        
                        // Initialiser la session['user'];
                        $_SESSION['user'] = $result;
                        $userId = $_SESSION['user']['id'];
                        
                        // SessionId concerne le panier;
                        $sessionId = null;
                        
                        // Verifier si le panier existe déjà;
                        if(isset($_SESSION['sessionId'])){
                            $sessionId = $_SESSION['sessionId'];
                        }
                        // Récupérer l'instance du panier;
                        $panier = new Panier();
                        
                        // Mettre à jour le panier pour charger $userId;
                        $panier->isCnnected($userId, $sessionId);
                        
                        header("Location: $last");
                    } else {
                        $this->setErreur('Mot de passe incorecte !');
                        $this->setWarning('Vous avez oublié votre mot de passe ? <a href="?forgot">Cliquez ici</a>');
                    }
                } else {
                    $this->setErreur('Téléphone, E-mail incorecte !');
                }
            }else{
                $this->setErreur('Identifiant incorrecte !');
                $this->setWarning('Vous n\'avez pas encore de compte ? <a href="inscription">Inscrivez-vous</a>');
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
    
    /**
     * Get the value of success
     */ 
    public function getSuccess()
    {
        return $this->success;
    }
    
    /**
     * Set the value of success
     *
     * @return  self
     */ 
    public function setSuccess($success)
    {
        $this->success = $success;
        
        return $this;
    }
    
    /**
     * Get the value of warning
     */ 
    public function getWarning()
    {
        return $this->warning;
    }
    
    /**
     * Set the value of warning
     *
     * @return  self
     */ 
    public function setWarning($warning)
    {
        $this->warning = $warning;
        
        return $this;
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

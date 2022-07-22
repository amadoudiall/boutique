<?php

namespace App\Controller;

use \App\Entity\User;
use \App\Entity\Panier;

class Inscription
{

    protected $erreur;
    protected $success;
    protected $warning;

    public function Subscrib($last = null){
        // Verifier si la formulaire a été remplis
        if(isset($_POST['nom']) AND !empty($_POST['nom']) 
        AND isset($_POST['prenom']) AND !empty($_POST['prenom'])
        AND isset($_POST['adresse']) AND !empty($_POST['adresse'])
        AND isset($_POST['tel']) AND !empty($_POST['tel'])
        AND isset($_POST['pwd']) AND !empty($_POST['pwd'])
        AND isset($_POST['pwdc']) AND !empty($_POST['pwdc'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $tel = htmlspecialchars($_POST['tel']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $pwdc = htmlspecialchars($_POST['pwdc']);
            
            // Verifier si le numero de telephone est superieur a 9 chiffres
            if(strlen($tel) >= 9){
                
                if($pwd === $pwdc){
                
                    $users = new User();
                    $result = $users->getUserByUnique($tel);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                    if($result == null){
                        $hashedPassword = sha1($pwd);
                        $date = new \Datetime;
                        $created_at = $date->format('Y-m-d H:i:s');
                        $users->setNom($nom)
                                ->setPrenom($prenom)
                                ->setAdresse($adresse)
                                ->setTel($tel)
                                ->setRoles('client')
                                ->setPassword($hashedPassword)
                                ->setCreated_at($created_at)
                                ->setIs_active(2);
                            $users->flushUser();
                            session_start();
                            
                            // Récuperer l'utilisateur par sont Userame (Téléphone ou E-mail);
                            $user = $users->getUserByLogin($tel, $pwd);
                            if($user != null){
                                $_SESSION['user'] = $user;
                                $userId = $_SESSION['user']['id'];
                                $sessionId = null;
                                if(isset($_SESSION['sessionId'])){
                                    $sessionId = $_SESSION['sessionId'];
                                }
                                $panier = new Panier();
                                $panier->isCnnected($userId, $sessionId);
                                
                                $this->setSuccess("Vous êtes bien inscrit, vous pouvez vous connecter");
                                // if last visited page is not null, redirect to it
                                if($last != null){
                                    header('location: '.$last);
                                }else{
                                    header('Location: /');
                                }
                            }
                    }else{
                        if($result['tel'] === $tel){
                            $this->setErreur('Il semble que vous vous êtes déja inscrit. votre numéro de téléphone est associé a un compte !');
                        }
                    }
                }else{
                    $this->setErreur('Les mots de passe saisit ne correspondent pas !');
                }
            }else{
                $this->warning = "Veuiilez saisir un numéro de téléphone valide";
            }
            
        }else{
            $this->setErreur('Tout les champs sont obligatoire !');
        }
    }

    public function setErreur($erreur){
        $this->erreur = $erreur;
    }

    public function getErreur(){
        return $this->erreur;
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
}

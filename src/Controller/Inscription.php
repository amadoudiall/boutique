<?php

namespace App\Controller;

use \App\Entity\User;
use \App\Entity\Panier;

class Inscription
{

    protected $erreur;
    protected $success;

    public function Subscrib(){
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
                            header('Location: /');
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
            $this->setErreur('Tout les champs sont obligatoire !');
        }
    }

    public function setErreur($erreur){
        $this->erreur = $erreur;
    }

    public function getErreur(){
        return $this->erreur;
    }

}

<?php

namespace App\Controller;

use \App\Entity\User;

class Inscription
{

    protected $erreur;
    protected $success;

    public function Subscrib()
    {
        if (
            isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['age'])
            and isset($_POST['adresse']) and isset($_POST['tel']) and isset($_POST['pwd']) 
            and isset($_POST['pwdc']) and !empty($_POST['nom']) and !empty($_POST['prenom'])
            and !empty($_POST['age']) and !empty($_POST['adresse']) and !empty($_POST['tel'])
            and !empty($_POST['pwd']) and !empty($_POST['pwdc'])
        ) {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $age = htmlspecialchars($_POST['age']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $tel = htmlspecialchars($_POST['tel']);
            $email = htmlspecialchars($_POST['email']);
            $pwd = $_POST['pwd'];

            if ($pwd == $_POST['pwdc']) {
                $user = new User();
                $hashedpwd = sha1($pwd);
                $date = new \DateTime();
                $role = "client";
                $created_at = $date->format('Y-m-d H:i:s');
                $user->setNom($nom)
                    ->setPrenom($prenom)
                    ->setAge($age)
                    ->setAdresse($adresse)
                    ->setTelephone($tel)
                    ->setRole($role)
                    ->setEmail($email)
                    ->setPassword($hashedpwd)
                    ->setCreatedAt($created_at);
                $user->flushUser();

                $success = "Inscription Réussit !";
                header('location: ../index.php?seccess=' . $success);
            } else {
                $this->setErreur('Le mot de passe ne correspond pas !');
            }
        } else {
            $this->setErreur('Veuillez remplire tout les champs !');
        }
    }

    public function setErreur($erreur){
        $this->erreur = $erreur;
    }

    public function getErreur(){
        return $this->erreur;
    }

}

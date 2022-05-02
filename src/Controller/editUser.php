<?php
namespace App\Controller;
use App\Entity\User;

class editUser{
    public $erreur;
    public $success;
    
    // add User
    public function addUser(){
         // Verifier si la formulaire a été remplis
        if(isset($_POST['nom']) AND !empty($_POST['nom']) 
        AND isset($_POST['prenom']) AND !empty($_POST['prenom'])
        AND isset($_POST['adresse']) AND !empty($_POST['adresse'])
        AND isset($_POST['tel']) AND !empty($_POST['tel'])
        AND isset($_POST['roles']) AND !empty($_POST['roles'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $tel = htmlspecialchars($_POST['tel']);
            $role = htmlspecialchars($_POST['roles']);

            $users = new User();
            $result = $users->getUserByUnique($tel);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
            if($result == null){
                $date = new \Datetime;
                $created_at = $date->format('Y-m-d H:i:s');
                $users->setNom($nom)
                        ->setPrenom($prenom)
                        ->setAdresse($adresse)
                        ->setTel($tel)
                        ->setRoles($role)
                        ->setPassword('DIAPALI100')
                        ->setCreated_at($created_at)
                        ->setIs_active(2);
                    $users->flushUser();
                    header('Location: ./admin.php?url=users');
            }else{
                if($result['tel'] === $tel){
                    $this->setErreur('Cette numéro de téléphone est associé a un compte !');
                }
            }
        }else{
            $this->setErreur('Tout les champs sont obligatoire !');
        }
    }
    
    // edit User
    public function editUser($id, $users){
         // Verifier si la formulaire a été remplis
        if(isset($_POST['nom']) AND !empty($_POST['nom']) 
        AND isset($_POST['prenom']) AND !empty($_POST['prenom'])
        AND isset($_POST['adresse']) AND !empty($_POST['adresse'])
        AND isset($_POST['tel']) AND !empty($_POST['tel'])
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $tel = htmlspecialchars($_POST['tel']);
            
            if(isset($_POST['roles']) AND !empty($_POST['roles'])){
                $role = htmlspecialchars($_POST['roles']);
            }else{
                $role = "client";
            }
            
            $users->getUserById($id);
            
            if(isset($_POST['age']) AND !empty($_POST['age'])){
                $age = htmlspecialchars($_POST['age']);
                $users->setAge($age);
            }
            
            // Email
            if(isset($_POST['email']) AND !empty($_POST['email'])){
                $email = htmlspecialchars($_POST['email']);
                $users->setEmail($email);
            }
            
            // pwd
            if(isset($_POST['pwd']) AND !empty($_POST['pwd'])){
                $pwd = htmlspecialchars($_POST['pwd']);
                
                $uniqUser = $users->getUserByUnique($_SESSION['user']['tel']);
                
                if($uniqUser != null){
                    if($uniqUser['pwd'] === $pwd){
                        if(isset($_POST['npwd']) AND !empty($_POST['npwd']) AND isset($_POST['npwdc']) AND !empty($_POST['npwdc'])){
                            $npwd = htmlspecialchars($_POST['npwd']);
                            $npwdc = htmlspecialchars($_POST['npwdc']);
                            if($npwd === $npwdc){
                                $users->setPassword($pwd);
                            }else{
                                $this->setErreur('Les mots de passe ne sont pas identiques !');
                            }
                        }else{
                            $this->setErreur('Veuillez confirmer votre nouveau mot de passe !');
                        }
                    }else{
                        $this->setErreur('Votre mot de passe actuel est incorrect !');
                    }
                }
            }
            
            $users->setNom($nom)
                ->setPrenom($prenom)
                ->setAdresse($adresse)
                ->setTel($tel)
                ->setRoles($role);
            $users->updateUser($id);
            header('Location: ./admin.php?url=users');
        }else{
            $this->setErreur('Tout les champs sont obligatoire !');
        }
    }
    
   

    /**
     * Get the value of erreur
     */ 
    public function getErreur()
    {
        return $this->erreur;
    }

    /**
     * Set the value of erreur
     *
     * @return  self
     */ 
    public function setErreur($erreur)
    {
        $this->erreur = $erreur;

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
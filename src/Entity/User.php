<?php

namespace App\Entity;

use \App\Bdd\Bdd;

class User
{
    public string $nom;
    public string $prenom;
    public string $age;
    public string $adresse;
    public string $tel;
    public string $roles;
    public string $email;
    public string $password;
    public string $created_at;
    public string $is_active;

    

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of is_active
     */ 
    public function getIs_active()
    {
        return $this->is_active;
    }

    /**
     * Set the value of is_active
     *
     * @return  self
     */ 
    public function setIs_active($is_active)
    {
        $this->is_active = $is_active;
        return $this;
    }

    public function getDb()
    {
        $bdd = new Bdd();
        $this->database = $bdd->connect();
        return $this->database;
    }

    public function getUsers()
    {
        $users = $this->getDb()->query('SELECT * FROM User');
        return $users->fetchAll();
    }

    public function flushUser()
    {
        $addUser = $this->getDb()->prepare('INSERT INTO User(nom, prenom, age, adresse, tel, roles, email, pwd, created_at, is_active) VALUES(:nom, :prenom, :age, :adresse, :tel, :roles, :email, :pwd, :created_at, :is_active)');
        $addUser->execute([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'age' => $this->age,
            'adresse' => $this->adresse,
            'tel' => $this->tel,
            'roles' => $this->roles,
            'email' => $this->email,
            'pwd' => $this->password,
            'created_at' => $this->created_at,
            'is_active' => $this->is_active
        ]);
    }

    public function getUserByUnique($email, $tel)
    {
        $statement = $this->getDb()->prepare('SELECT * FROM User WHERE email = ? OR tel = ?');
        $statement->execute(array($email, $tel));
        return $statement->fetch();
    }

    public function getUserByLogin($username)
    {
        $statement = $this->getDb()->prepare('SELECT * FROM User WHERE email = ? OR tel = ?');
        $statement->execute(array($username, $username));
        return $statement->fetch();
    }
}

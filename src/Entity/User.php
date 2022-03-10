<?php

namespace App\Entity;

use \App\Bdd\Bdd;

class User
{
    public string $nom;
    public string $prenom;
    public string $age;
    public string $adresse;
    public string $telephone;
    public string $role;
    public string $email;
    public string $password;
    public \DateTime $created_at;

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
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

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
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDb()
    {
        $bdd = new Bdd();
        $this->database = $bdd->connect();
        return $this->database;
    }

    public function getUser()
    {
        $users = $this->getDb()->query('SELECT * FROM User');
        return $users->fetchAll();
    }

    public function flushUser()
    {
        $addUser = $this->getDb()->prepare('INSERT INTO user(nom, prenom, age, adresse, tel, roles, email, pwd, created_at) VALUES(:nom, :prenom, :age, :adresse, :tel, :roles, :email, :pwd, :created_at)');
        $addUser->execute([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'age' => $this->age,
            'adresse' => $this->adresse,
            'tel' => $this->telephone,
            'roles' => $this->role,
            'email' => $this->email,
            'pwd' => $this->password,
            'created_at' => $this->createdAt
        ]);
    }

    public function getUserByLogin($username, $password)
    {
        $statement = $this->getDb()->prepare('SELECT * FROM user WHERE email = ? OR tel = ?');
        $statement->execute(array($username, $username));
        return $statement->fetch();
    }
}

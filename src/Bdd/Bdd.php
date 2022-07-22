<?php

namespace App\Bdd;

class Bdd
{
    public function connect()
    {
        $username = 'root';
        $password = '';

        try {

            $connect = new \PDO(
                'mysql:host=localhost;dbname=ecommerce;charset=utf8',
                $username,
                $password
            );
        } catch (\PDOException $exception) {

            echo $exception->getMessage();
            exit('Erreur de connexion à la base de données');
        }

        return $connect;
    }

    public function query($sql, $data = array())
    {
        $req = $this->connect()->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}

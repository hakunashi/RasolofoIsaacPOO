<?php

namespace Src\Manager;

use Exception;
use PDOException;
use Src\Entity\Moto;

class MotoManager extends DataBaseManager {
    public function findAll()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM moto");
        $query->execute([]);

        $results = $query->fetchAll();
        $motos = [];

        foreach ($results as $result) {
            $motos[] = Moto::fromArray($result);
        }

        return $motos;

    }

    public function findByType(string $type)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM moto WHERE type = :type");
        $query->execute([':type' => $type]);

        $results = $query->fetchAll();
        $motos = [];

        foreach ($results as $result) {
            $motos[] = Moto::fromArray($result);
        }

        return $motos;

    }

    public function findById(int $id): Moto|false
    {
        $query = $this->getConnection()->prepare("SELECT * FROM moto WHERE id = :id");
        $query->execute([":id" => $id]);

        //Verifier si j'ai un resultat
        $res = $query->fetch();


        if ($res === false) {
            return $res;
        }

        //Convertir le resultat de la requete en Objet
        return  Moto::fromArray($res);

    }

    public function add(Moto $moto)
    {
        try {
            $response = $this->getConnection()->prepare("INSERT INTO moto(brand, model, type, price, image) VALUES (:brand, :model, :type, :price, :image)");

            $response->execute(
                [
                    ':brand' => $moto->getBrand(),
                    ':model' => $moto->getModel(),
                    ':type' => $moto->getType(),
                    ':price' => $moto->getPrice(),
                    ':image' => $moto->getImageUrl()
                ]
            );
        } catch (Exception $e) {
            echo ("Erreur lors de l'ajout en BDD");
            exit();
        }

    }

    public function edit(Moto $moto)
    {
        try {
            $response = $this->getConnection()
                ->prepare("UPDATE `moto` SET brand= :brand, model= :model, type= :type ,price= :price, image= :image WHERE id = :id");

            $response->execute(
                [
                    ':brand' => $moto->getBrand(),
                    ':type' => $moto->getType(),
                    ':model' => $moto->getModel(),
                    ':price' => $moto->getPrice(),
                    ':image' => $moto->getImageUrl(),
                    ':id' => $moto->getId(),
                ]
            );
        } catch (Exception $e) {
            echo($e->getMessage());
            exit();
        }

    }

    public function delete(int $id)
    {
        $query = $this->getConnection()->prepare("DELETE FROM moto WHERE id = :id");

        $query->execute([
            ':id' => $id
        ]);

    }


}


?>
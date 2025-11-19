<?php

namespace App\Model;

use App\Utils\Bdd;

class Type
{
    private int $id_type;
    private string $name;
    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }

    // Getters et Setters
    public function getIdType(): int
    {
        return $this->id_type;
    }

    public function setIdType(int $id_type)
    {
        $this->id_type = $id_type;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAllType(){
        try {
            $request ="SELECT t.id_type, t.name FROM types AS t";
            $req = $this->connexion->prepare($request);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS, Type::class);
        } catch (\PDOException $e) {
            return [];
        }
    }
}

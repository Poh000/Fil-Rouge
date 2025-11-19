<?php

namespace App\Model;

use App\Utils\Bdd;
use PDO;

class Series
{
    private int $id_serie;
    private string $title;
    private string $author;
    private ?string $description;
    private string $status;
    private string $cover_image;
    private int $id_type;
    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }

    // Getters et Setters
    public function getIdSerie(): int
    {
        return $this->id_serie;
    }

    public function setIdSerie(int $id_serie): self
    {
        $this->id_serie = $id_serie;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCoverImage(): string
    {
        return $this->cover_image;
    }

    public function setCoverImage(string $cover_image): self
    {
        $this->cover_image = $cover_image;
        return $this;
    }

    public function getIdType(): int
    {
        return $this->id_type;
    }

    public function setIdType(int $id_type): self
    {
        $this->id_type = $id_type;
        return $this;
    }

    public function getSeriesByType(int $id_type): array
    {
        try {
            $request = "SELECT id_serie, title, author, description, status, cover_image, id_type FROM series WHERE id_type = ? ORDER BY id_serie DESC LIMIT 4";
            $req = $this->connexion->prepare($request);
            $req->bindValue(1, $id_type, \PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS, Series::class);
        } catch (\PDOException $e) {
            return [];
        }
    }
}

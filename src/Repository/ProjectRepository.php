<?php
namespace App\Repository;

use App\Entity\Project;
use App\Model\Connection;

class ProjectRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * ProjectRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Retourne un projet si le slug a été trouvé en base de données
     * @param string $slug - Slug récupéré dans l'URL
     * @return Project|null
     */
    public function findBySlug(string $slug): ?Project
    {
        // Former la requête
        $query = "SELECT * FROM project WHERE slug = :slug";
        // Demander le résultat de la requête à la classe Connection
        $resultat = $this->connection->queryPrepared(
            $query,
            [':slug' => $slug],
            Project::class,
            false
        );
        // Retourner le projet s'il a été trouvé
        return $resultat;
    }

    /**
     * Retourne l'ensemble des projets en BDD dans un tableau d'objet de Project
     * @return Project[]
     */
    public function findAll(): array
    {
        // Former la requête
        $query = "SELECT * FROM project";
        // Demander le résultat de la requête à la classe Connection
        $resultat = $this->connection->query(
            $query,
            Project::class
        );
        // Retourner le projet s'il a été trouvé
        return $resultat;
    }

    public function insert($getParsedBody)
    {
        // todo : convertir le tableau pour compléter le requête SQL
        $this->connection->query('INSERT INTO project VALUES ');
    }
}
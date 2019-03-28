<?php
namespace App\Model;

/**
 * Class Connection
 * Permet d'établir une connexion avec la base de données ...
 * ... et de lancer des requêtes SQL
 */
class Connection
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(
        string $databaseName,
        string $databaseUser,
        string $databasePass
    ) {
        // Infos nécessaires
        $dsn = 'mysql:host=localhost;dbname='.$databaseName;
        $this->connect($dsn, $databaseUser, $databasePass);
    }
    /**
     * Etablit une connexion avec la base de données
     * @param string $dsn
     * @param string $user
     * @param string $pass
     */
    private function connect(string $dsn, string $user, string $pass): void
    {
        try {
            $this->pdo = new \PDO($dsn, $user, $pass, [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET names utf8"
            ]);
        } catch (\PDOException $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Execute une requête SQL
     * @param string $query - Requête SQL
     * @param string|null $className - Eventuelle classe dans laquelle sera stocké le résultat
     * @return array
     */
    public function query(string $query, string $className = null)
    {
        $pdoStatement = $this->pdo->query($query);

        if (is_null($className)) {
            $resultat = $pdoStatement->fetchAll();
        } else {
            $resultat = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, $className);
        }

        return $resultat;
    }

    public function findById(string $tableName, int $id): array
    {
        // Préparation
        $query = "SELECT * FROM ".$tableName." WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        // Execution
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Exécute une requête SQL préparée
     * @param string $query - Requête SQL
     * @param array $params - Les paramètres de la requête SQL (les données)
     * @param string|null $className - L'éventuelle classe dans laquelle on va stocker les résultats
     * @param bool|null $fetchAll - Si "true" => fetchAll() - Si "false" => fetch()
     * @return array|mixed - Résultat de la requête
     */
    public function queryPrepared(string $query, array $params, ?string $className = null, ?bool $fetchAll = true)
    {
        // On prépare la requête
        $statement = $this->pdo->prepare($query);
        // On ajoute les paramètres à la requête
        foreach ($params as $key => $value) {
            $statement->bindParam($key, $value);
        }
        // On exécute la requête
        $statement->execute();
        // On gère le fetchMode (on enregistre le résultat dans une classe ?)
        if(!is_null($className)) {
            $statement->setFetchMode($this->pdo::FETCH_CLASS, $className);
        }
        // On retourne le résultat (fetchAll? fetch?)
        if($fetchAll) {
            $resultat = $statement->fetchAll();
        } else {
            $resultat = $statement->fetch();
        }
        return $resultat;
    }
}

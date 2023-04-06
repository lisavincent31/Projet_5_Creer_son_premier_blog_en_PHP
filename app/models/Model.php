<?php 

namespace App\Models;

use Database\Connection;
use PDO;

abstract class Model {

    protected $db;
    protected $table;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $statement = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $statement->fetchAll();
    }

    public function findById(int $id): Model
    {
        $statement = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $statement->execute([$id]);

        return $statement->fetch();
    }
}

?>
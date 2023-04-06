<?php 

namespace App\Models;

use Database\Connection;
use stdClass;

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
        return $statement->fetchAll();
    }

    public function findById(int $id): stdClass
    {
        $statement = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $statement->execute([$id]);

        return $statement->fetch();
    }
}

?>
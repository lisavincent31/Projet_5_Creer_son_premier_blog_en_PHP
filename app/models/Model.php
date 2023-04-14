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
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
    }

    public function destroy(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", $id);
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if(strpos($sql, 'DELETE') === 0 
        || strpos($sql, 'UPDATE') === 0 
        || strpos($sql, 'INSERT INTO') === 0) {
            $statement = $this->db->getPDO()->$method($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            
            return $statement->execute([$param]);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        
        $statement = $this->db->getPDO()->$method($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if($method === 'query') {
            return $statement->$fetch();
        } else {
            $statement->execute([$param]);
            return $statement->$fetch();
        }
    }
}

?>
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
        return $this->query("SELECT * FROM {$this->table} ORDER BY updated_at DESC");
    }

    public function allByStatus(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY CASE WHEN status = 'pending' THEN 'accepted' ELSE 'deleted' END, status");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function getByUser(int $id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE author = ?", [$id]);
    }

    public function create(array $data, ?array $relations = null)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $firstParenthesis = '';
        $secondParenthesis = '';

        $i = 1;
        foreach($data as $key => $value)
        {
            $comma = $i === count($data) ? '' : ', ';
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";

            $i++;
        }

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        $data['author'] = 1;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $sql_request_part = '';

        $i = 1;
        foreach($data as $key => $value) {
            $comma = $i === count($data) ? '' : ', ' ;
            $sql_request_part .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;
        
        return $this->query("UPDATE {$this->table} SET {$sql_request_part} WHERE id = :id", $data);
    }

    public function destroy(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if(strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'INSERT') === 0) {

            $statement = $this->db->getPDO()->$method($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

            return $statement->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        
        $statement = $this->db->getPDO()->$method($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if($method === 'query') {
            return $statement->$fetch();
        } else {
            $statement->execute($param);
            return $statement->$fetch();
        }
    }
}

?>
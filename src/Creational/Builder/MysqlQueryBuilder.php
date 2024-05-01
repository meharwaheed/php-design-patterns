<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\SQLQueryBuilder;
use DesignPatterns\Database\DatabaseConnection;
use JetBrains\PhpStorm\NoReturn;

class MysqlQueryBuilder implements SQLQueryBuilder
{
    protected \stdClass $query;

    protected $db;

    public function __construct(DatabaseConnection $connection)
    {
        $this->db = $connection->getConnection();
    }

    /**
     * @return void
     */
    protected function reset(): void
    {
        $this->query = new \stdClass();
    }
    public function select(string $table, array $fields): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "SELECT ". implode(', ', $fields) . " FROM ". $table;
        $this->query->type = 'select';
        return $this;
    }

    public function insert(string $table, array $fields)
    {
        $this->reset();
        $this->query->base = "INSERT INTO ". $table ;
        $this->query->base .= " (`".implode("`, `", array_keys($fields))."`)";
        $this->query->base .= " VALUES ('".implode("', '", $fields)."') ";
        $result = $this->db->query($this->getQuery());
    }

    /**
     * @throws \Exception
     */
    public function where(string $field, string $operator, string $value): SQLQueryBuilder
    {
        if(!in_array($operator, ['=', '>', '<', '>=', '<='])) {
            throw new \Exception("Invalid operator '{$operator}'");
        }

        if(!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }


        $this->query->where[]= "$field $operator '$value'";
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function limit(int $start, int $end): SQLQueryBuilder
    {
        if($this->query->type != 'select') {
            throw new \Exception("LIMIT can only be added to SELECT");
        }

        $this->query->limit =   $start . " offset " . $end;

        return $this;
    }

    public function getQuery(): string
    {
        $query = $this->query;
        $sql = $query->base;

        if(!empty($query->where)) {
            $sql .= " WHERE ". implode(' AND ', $query->where);
        }

        if(isset($query->limit)) {
            $sql .= " LIMIT " . $query->limit;
        }

        $sql .= ';';

        return $sql;
    }

    /**
     * @return array
     */
    public function get(): array
    {

        $results = [];
        $result = $this->db->query($this->getQuery());

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $results[]= $row;
            }
        }

        return $results;
    }
}
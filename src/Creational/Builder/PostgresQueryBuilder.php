<?php

namespace DesignPatterns\Creational\Builder;

use DesignPatterns\Creational\Builder\SQLQueryBuilder;

class PostgresQueryBuilder extends MysqlQueryBuilder
{
    /**
     * Among other things, PostgreSQL has slightly different LIMIT syntax.
     * @throws \Exception
     */
    public function limit(int $start, int $end): SQLQueryBuilder
    {
        parent::limit($start, $end);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $end;

        return $this;
    }
}
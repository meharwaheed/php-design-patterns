<?php

namespace DesignPatterns\Creational\Builder;


/**
 * The Builder interface declares a set of methods to assemble an SQL query.
 *
 * All of the construction steps are returning the current builder object to
 * allow chaining: $builder->select(...)->where(...)
 */
interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;
    public function insert(string $table, array $fields);

    public function where(string $field, string $operator, string $value): SQLQueryBuilder;
    public function limit(int $start, int $end): SQLQueryBuilder;
    public function getQuery(): string;
}
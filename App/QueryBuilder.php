<?php

namespace App;


class QueryBuilder


{
    public static $pdo;

    public static function make(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }
    public static function select($table, $where = null, $oneColumn = false, $class = null)
    {
        $query = "SELECT * FROM $table";

        if (is_array($where)) {
            if (isset($where[0]) && is_array($where[0])) {
                $conditions = [];
                foreach ($where as $condition) {
                    $conditions[] = "$condition[0] $condition[1] '$condition[2]'";
                }
                $query .= " WHERE " . implode(" AND ", $conditions);
            } else {
                $query .= " WHERE $where[0] $where[1] '$where[2]'";
            }
        }

        if ($oneColumn) {
            return self::execute($query)->fetch(\PDO::FETCH_OBJ);
        } else {
            if ($class) {
                return self::execute($query)->fetchAll(\PDO::FETCH_CLASS, $class);
            } else {
                return self::execute($query)->fetchAll(\PDO::FETCH_OBJ);
            }
        }
    }


    public static function insert($table, $data)
    {
        $columns = implode(",", array_keys($data));
        $values = str_repeat("?,", count(array_keys($data)) - 1) . "?";

        $query = "INSERT INTO $table ($columns) values ($values)";
        self::execute($query, array_values($data));
    }

    public static function delete($table, $id, $col = "id", $operator = "=")
    {
        $query = "DELETE FROM $table where $col $operator '$id'";

        self::execute($query);
    }


    public static function update($table, $id, $where)
    {
        $sets = implode("=?, ", array_keys($where)) . "=?";
        $query = "UPDATE $table set $sets where id = $id";
        self::execute($query, array_values($where));
    }

    private static function execute($query, $values = [])
    {
        $statement = self::$pdo->prepare($query);
        $statement->execute($values);
        return $statement;
    }
}

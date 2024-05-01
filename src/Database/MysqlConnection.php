<?php

namespace DesignPatterns\Database;

class MysqlConnection implements DatabaseConnection
{

    public function getConnection()
    {

        $con = mysqli_connect('172.17.0.1', 'root', 'NodeSol786', 'db');

        // check that connection happen
        if(mysqli_connect_errno()) {
            echo "1: Connection Failed"; //error code #1 = connection Failed
            exit();
        }

        return $con;
    }
}
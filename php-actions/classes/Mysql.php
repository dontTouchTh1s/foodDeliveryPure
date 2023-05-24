<?php

class Mysql
{
    private mysqli $mysql;
    private string $connectError;
    private mysqli_result $result;

    public function __construct($host, $username, $password, $dataBase)
    {
        try {
            /** @noinspection PhpObjectFieldsAreOnlyWrittenInspection */
            $driver = new mysqli_driver();
            $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
            $this->mysql = new mysqli();
            $this->mysql->connect($host, $username, $password);
            if ($this->mysql->connect_errno) {
                return ($this->mysql->connect_error);
            }
            $this->mysql->select_db($dataBase);

        } catch (mysqli_sql_exception $e) {
            die(
            "<h1>Error while connecting to database</h1>
            <p/> Check database name is entered currently, and you created it before
            <h2>Error:</h2> . $e"
            );
        }


    }

    public function connect($host, $username, $password, $dataBase): bool
    {
        $mysql = new mysqli($host, $username, $password, $dataBase);
        $this->mysql = $mysql;
        if ($mysql->connect_errno) {
            $this->connectError = $mysql->connect_error;
            return false;
        } else
            return true;
    }

    public function query(string $query, array $params = null): Exception|mysqli_sql_exception|mysqli_stmt
    {
        return $this->prepare_query($query, $params);
    }

    private function prepare_query(string $query, array $params = null): mysqli_sql_exception|mysqli_stmt
    {
        try {
            $sth = $this->mysql->prepare($query);
            if ($params != null) {
                $pType = "";
                foreach ($params as $param) {
                    switch (gettype($param)) {
                        case "string":
                            $pType .= "s";
                            break;
                        case "integer":
                            $pType .= "i";
                            break;
                        case "double":
                            $pType .= "d";
                            break;
                    }
                }
                $sth->bind_param($pType, ...$params);
            }
            return $sth;
        } catch (mysqli_sql_exception $e) {
            return $e;
        }
    }

    public function query_and_execute(string $query, array $params = null): bool|mysqli_sql_exception
    {
        $sth = $this->prepare_query($query, $params);
        return $sth->execute();
    }

    public function query_and_result(string $query, array $params = null): mysqli_result|mysqli_sql_exception
    {
        $sth = $this->prepare_query($query, $params);
        $sth->execute();
        return $sth->get_result();

    }

}
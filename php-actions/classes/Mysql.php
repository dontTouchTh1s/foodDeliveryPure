<?php

class Mysql
{
    public mysqli $mysql;
    public string $connectError;

    public function __construct($host, $username, $password, $dataBase)
    {
        try {
            /** @noinspection PhpObjectFieldsAreOnlyWrittenInspection */
            $driver = new mysqli_driver();
            $driver->report_mode = MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR;
            $this->mysql = new mysqli();
            $this->mysql->connect($host, $username, $password);
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

    public function query(string $query, array $params = null): bool|mysqli_result|string
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
            $sth->execute();
            return $sth->get_result();
        } catch (mysqli_sql_exception $e) {
            return $e;
        }

    }
}
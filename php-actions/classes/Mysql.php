<?php

class Mysql
{
    public mysqli $db;
    public string $connectError;

    public function __construct()
    {

    }

    public function connect($host, $username, $password, $dataBase): bool
    {
        $mysql = new mysqli($host, $username, $password, $dataBase);
        $this->db = $mysql;
        if ($mysql->connect_errno) {
            $this->connectError = $mysql->connect_error;
            return false;
        } else
            return true;
    }

    public function query($query)
    {
        $sth = $this->db->prepare($query);
        $sth->bind_param('ii', $uid, $pid);
    }
}
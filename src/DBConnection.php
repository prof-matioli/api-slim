<?php

//declare(strict_types=1);

namespace App;

class DBConnection {
    private $host = '143.106.241.4';
    private $dbname = 'matioli';
    private $user = 'matioli';
    private $pass = 'matnaolhe';
    private $dbh;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Log or handle the connection error appropriately
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}

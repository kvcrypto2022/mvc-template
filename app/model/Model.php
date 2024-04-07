<?php

namespace app\model;

use PDO;
use PDOException;

class Model {
    private $pdo;
    private $stmt = null;

    public function __construct() {
        try {
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $options);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->pdo = null;
    }

    protected function query($sql, $params) : Model {
        // prepare sql
        $this->stmt = $this->pdo->prepare($sql);
        // bind parameters
        for($i = 0; $i < count($params); $i++) {
            $this->stmt->bindParam(
                $params[$i][0], $params[$i][1], $params[$i][2]
            );
        }

        return $this;
    }

    protected function execute() : Model {
        // execute
        $this->stmt->execute();

        return $this;
    }

    protected function fetchAll() : array {
        // set the resulting array to associative
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);

        return $this->stmt->fetchAll();
    }
}
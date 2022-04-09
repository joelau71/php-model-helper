<?php
    namespace MyFirstPackage\Models;

    use PDOException;
    use PDO;

    class Connect {

        public $pdo;
        public $rowCount;

        public function __construct()
        {
            $config = new Config;
            try {
                $this->pdo = new PDO("mysql:host=".$config->DB_HOST.";dbname=".$config->DB_NAME.";charset=utf8", $config->DB_USER, $config->DB_PASS);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
            } catch (PDOException $e) {
                throw $e;
            }
        }

        public function select($sql, $queryArr) {
            $sth = $this->pdo->prepare($sql);
            $sth->execute($queryArr);
            $result = $sth->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function insert($sql, $queryArr) {
            $sth = $this->pdo->prepare($sql);
            $sth->execute($queryArr);
        }

        public function getLastInsertId(){
            return $this->pdo->lastInsertId();
        }
    }
    
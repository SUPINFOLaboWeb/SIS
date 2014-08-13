<?php

    require_once('protected/required.php');

    abstract class AbstractPdoManager {

        const DRIVER = 'mysql';
        const HOST = 'localhost';
        const PORT = '3306';
        const DATABASE_NAME = 'seic';
        const USER = 'root';
        const PASSWORD = '';

        protected $pdo;


        public function __construct() {

            try {

                $dsn = self::DRIVER.':host='.self::HOST.';port='.self::PORT.';dbname='.self::DATABASE_NAME;
                $this->pdo = new PDO($dsn, self::USER, self::PASSWORD);

            }

            catch (PDOException $e) {

            die("Error ! : ".$e->getMessage());

            }

        }

    }

?>
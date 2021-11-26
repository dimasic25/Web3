<?php

class DB
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() : DB
    {
        try {
            if (!($config = parse_ini_file("config/config.ini"))) {
                throw new Exception("Ошибка при парсинге файла конфигурации", 1);
            }

            $this->pdo = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['login'], $config['password']);
            return $this;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getScreenshots() : array
    {
        $sql = "SELECT * FROM screenshot";
        $screenshots = $this->pdo->prepare($sql);
        $screenshots->execute();
        $result = $screenshots->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}
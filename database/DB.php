<?php

class DB
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): DB
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

    public function getScreenshots($id)
    {
        if ($id == 1) {
            $sql = "SELECT * FROM screenshot WHERE id >= ? ORDER BY id DESC LIMIT 10";
        } else {
            $sql = "SELECT * FROM screenshot WHERE id < ? ORDER BY id DESC LIMIT 10";
        }

        $screenshots = $this->pdo->prepare($sql);
        $screenshots->bindValue(1, $id, PDO::PARAM_INT);
        $screenshots->execute();
        $result = $screenshots->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getScreenshotById($id)
    {
        $sql = "SELECT name, img, date_added FROM screenshot WHERE id = ?";

        $screenshot = $this->pdo->prepare($sql);
        $screenshot->bindValue(1, $id, PDO::PARAM_INT);
        $screenshot->execute();
        $result = $screenshot->fetch();

        return $result;
    }
}
<?php

require_once "DB.php";

class ScreenshotPdo extends DB
{

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

    public function getScreenshotByUuid($uuid)
    {
        $sql = "SELECT name, img, date_added, uuid FROM screenshot WHERE uuid = ?";

        $screenshot = $this->pdo->prepare($sql);
        $screenshot->bindValue(1, $uuid);
        $screenshot->execute();
        $result = $screenshot->fetch();

        return $result;
    }
}
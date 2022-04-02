<?php

require_once "NewScreenshotValidation.php";
require_once "database/ScreenshotPdo.php";

session_start();

if (!isset($_SESSION['userLogin'])) {
    header('Location: /index.php');
    die();
}


$screenshot = $_FILES['screenshot'];

$validator = new NewScreenshotValidation($_POST, $screenshot);
if (!$validator->isValid()) {
    echo json_encode(['errors' => $validator->getErrors()]);
    die();
}

$name = $_POST['name'];


$screenshot_pdo = new ScreenshotPdo();

$pathInfo = pathinfo($screenshot['name']);
$extension = $pathInfo['extension'] ?? "";
$newPath = '/views/img/' . uniqid() . '.' . $extension;

if (!move_uploaded_file($screenshot["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$newPath)) {
    echo json_encode(['errors' => ["Ошибка при загрузке скриншота!"]], );
    die();
}

$screenshot_uuid = $screenshot_pdo->saveScreenshot($newPath, $_SESSION["userId"], $name);

echo json_encode([
    'success' => true,
    'uuid' => $screenshot_uuid
]);

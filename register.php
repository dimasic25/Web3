<?php

require_once "database/UserPdo.php";
require_once "Validation.php";

header('Content-Type: application/json');

$request = $_POST;

$errors = Validation::validateRegisterRequest($request);

if (!empty($errors)) {
    echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
    exit;
}

try {
    $userPdo = new UserPdo();

    if (!$userPdo->IsEmailUnique($request['email'])) {
        $errors[] = "Пользователь с данной почтой уже существует!";
        echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
        exit;
    }
    if (!$userPdo->save($request)) {
        $errors[] = "Не удалось зарегистрировать пользователя. Попробуйте позже.";
        echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
        exit;
    }
} catch (PDOException $e) {
    $errors[] = "Не удалось зарегистрировать пользователя. Попробуйте позже.";
    echo json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
    exit;
}

session_start();
$_SESSION["userId"] = $userPdo->getUserIdByEmail($request['email']);
$_SESSION["userLogin"] = $request['login'];

echo json_encode(['success' => true]);
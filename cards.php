<?php

include "database/DB.php";

$id = intval(@$_GET['id']);

if (!is_numeric($id)) {
    die();
}


$pdo = new DB();

$cards = $pdo->getScreenshots($id);

if (count($cards) > 0):
    foreach ($cards as $screenshot): ?>

        <div class="card" data-id=<?= $screenshot['id'] ?>>
            <img src="data:image/jpeg;base64, <?= base64_encode($screenshot['img']) ?>" class="card__photo"
                 alt="Нет фото"/>
            <div class="card__info">
                <span class="card__name"> <?= $screenshot['name'] ?></span>
                <span class="card__data-added"><?= $screenshot['date_added'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

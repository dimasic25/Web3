<?php

$pdo = new DB();

$cards = $pdo->getScreenshots(1);

if (count($cards) > 0):
    foreach ($cards as $screenshot): ?>

        <div class="card" data-id=<?= $screenshot['id'] ?>>
            <img src="data:image/jpeg;base64, <?= base64_encode($screenshot['img']) ?>" class="card__photo"
                 alt="Нет фото"/>
            <div class="card__info">
                <a href= <?= "/details.php?id=" . $screenshot['id'] ?>><span class="card__name"> <?= $screenshot['name'] ?></span></a>
                <span class="card__data-added"><?= $screenshot['date_added'] ?></span>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if (count($cards) == 10): ?>
    <button class="btn more_cards" onclick="load_more()">Показать еще</button>
<?php endif; ?>
<?php endif; ?>

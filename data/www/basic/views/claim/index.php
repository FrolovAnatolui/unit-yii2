<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Claims</h1>
    <ul>
        <?php foreach ($claims as $claim): ?>
            <li>
                <?= Html::encode("Имя: {$claim->name} Номер телефона: {$claim->phone} Email:{$claim->email}") ?>:
                <?= $country->population ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
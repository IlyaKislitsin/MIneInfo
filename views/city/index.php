<?php
/* @var $cities array */
?>

<div class="row">
    <h1>Список городов</h1>
</div>

<div>
    <ul>
        <?php
        /* @var $data array */
        foreach ($cities as $key => $value): ?>
            <li>
                <?= yii\helpers\Html::a($cities[$key]['name'], ['city/view', 'id' => $cities[$key]['id']], ['class' => 'profile-link']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="row">
        <?= yii\helpers\Html::a('Добавить город', ['city/create'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 28.12.2018
 * Time: 17:21
 */

/* @var $model array*/
/* @var $mines array*/
?>
<div class="row">
    <h1>Просмотр информации о городе</h1>
</div>

<div>
    <p>
        <b>Город: </b> <?= $model[0]['name'] ?>
    </p>
    <p>
        <b>Сведения о городе: </b> <?= $model[0]['info'] ?>
    </p>
    <p>
        <b>Список шахт: </b>
    </p>
    <ul>
        <?php
        /* @var $data array */
        foreach ($mines as $key => $value): ?>
            <li>
                <?= yii\helpers\Html::a($mines[$key]['name'], ['mine/view', 'id' => $mines[$key]['id']], ['class' => 'profile-link']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="row">
    <?= yii\helpers\Html::a('Добавить шахту', ['mine/create'], ['class' => 'btn btn-success']) ?>
</div>
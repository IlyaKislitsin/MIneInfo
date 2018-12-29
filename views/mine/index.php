<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 28.12.2018
 * Time: 17:27
 */

/* @var $mines array */
?>
<div class="row">
    <h1>Список шахт</h1>
</div>
<div>

    <ul>
        <?php
        /* @var $data array */
        foreach ($mines as $key => $value): ?>
            <li>
                <?= yii\helpers\Html::a($mines[$key]['name'], ['mine/view', 'id' => $mines[$key]['id']], ['class' => 'profile-link']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="row">
        <?= yii\helpers\Html::a('Добавить шахту', ['mine/create'], ['class' => 'btn btn-success']) ?>
    </div>

</div>


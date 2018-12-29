<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 28.12.2018
 * Time: 1:01
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model array */


$this->title = 'Добавить город';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

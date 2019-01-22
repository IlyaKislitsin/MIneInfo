<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $cityNames array*/

$this->title = 'Добавить шахту';
$this->params['breadcrumbs'][] = ['label' => 'Шахты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cityNames' => $cityNames,
    ]) ?>

</div>

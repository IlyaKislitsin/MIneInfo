<?php

/* @var $this yii\web\View */

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать на портал Mines.info!</h1>

        <p class="lead">Здесь вы можете получить краткую инфомацию о и карьерах нашей области.</p>
        <p class="lead">Вы можете найти шахту по названию или по месту её расположения.</p>

        <div class="row">
            <div class="col-lg-3 col-lg-offset-2">
                <?= yii\helpers\Html::a('По месту расположения', ['city/index'], ['class' => 'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3 col-lg-offset-2">
                <?= yii\helpers\Html::a('По названию шахты', ['mine/index'], ['class' => 'btn btn-lg btn-success']) ?>
            </div>
        </div>



    </div>

</div>

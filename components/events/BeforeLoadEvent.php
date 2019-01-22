<?php
namespace app\components\events;

use yii\base\Event;

class BeforeLoadEvent extends Event
{
    public $model;
}

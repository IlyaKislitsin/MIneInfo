<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 12.01.2019
 * Time: 12:57
 */

namespace app\components\events;


use yii\base\Event;

class BeforeLoadEvent extends Event
{
    public $model;
}
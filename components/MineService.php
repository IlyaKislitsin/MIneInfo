<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 13.01.2019
 * Time: 18:52
 */

namespace app\components;


use app\components\events\BeforeLoadEvent;
use app\models\Mine;
use yii\base\Component;

class MineService extends Component
{
    const EVENT_BEFORE_LOAD = 'before_load';

    /**
     * @param Mine $mine
     */
    public function createMine (Mine $mine)
    {
        $event = new BeforeLoadEvent();
        $event->model = $mine;
        $this->trigger(self::EVENT_BEFORE_LOAD, $event);
    }
}
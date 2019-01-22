<?php
namespace app\components;

use yii\base\Component;
use app\models\Mine;
use app\components\events\BeforeLoadEvent;

class MineService extends Component
{
    const EVENT_BEFORE_LOAD = 'before_load';

    /**
     * @param Mine $mine
     */
    public function createMine(Mine $mine): void
    {
        $event = new BeforeLoadEvent();
        $event->model = $mine;
        $this->trigger(self::EVENT_BEFORE_LOAD, $event);
    }
}

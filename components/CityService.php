<?php
namespace app\components;

use yii\base\Component;
use app\models\City;
use app\components\events\BeforeLoadEvent;

class CityService extends Component
{
    const EVENT_BEFORE_LOAD = 'before_load';

    /**
     * @param City $city
     */
    public function createCity(City $city): void
    {
        $event = new BeforeLoadEvent();
        $event->model = $city;
        $this->trigger(self::EVENT_BEFORE_LOAD, $event);
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getCityNames(): array
    {
        $cities = (new City)->selectIDsAndNames();
        return array_column($cities, 'name', 'id');
    }
}

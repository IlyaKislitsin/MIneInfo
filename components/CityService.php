<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 11.01.2019
 * Time: 17:26
 */

namespace app\components;


use app\components\events\BeforeLoadEvent;
use app\models\City;
use yii\base\Component;

class CityService extends Component
{
    const EVENT_BEFORE_LOAD = 'before_load';

    /**
     * @param City $city
     */
    public function createCity (City $city)
    {
        $event = new BeforeLoadEvent();
        $event->model = $city;
        $this->trigger(self::EVENT_BEFORE_LOAD, $event);
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getCityNames()
    {
        $model = new City();
        $cities = $model->selectIDsAndNames();
        return array_column($cities, 'name', 'id');
    }
}
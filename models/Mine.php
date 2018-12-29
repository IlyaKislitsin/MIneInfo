<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 28.12.2018
 * Time: 15:54
 */

namespace app\models;


use app\models\base\BaseModel;

/**
 * Класс модель для таблицы "mines".
 *
 * @property int $id ID записи в таблице
 * @property string $name Название города
 * @property string $info Информация о городе
 * @property int $foundingDate Дата основания
 * @property int $city_id ID города
 * @property int $created_at
 * @property int $updated_at
 */
class Mine extends BaseModel
{
    public $tableName = 'mines';
    public $id;
    public $name;
    public $info;
    public $foundingDate;
    public $city_id;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['name', 'city_id', 'created_at', 'updated_at'], 'required'],
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['foundingDate', 'city_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    public function byCity($city_id)
    {
        return $this->select(['*'], ['where' => 'city_id = ' . $city_id]);
    }

}
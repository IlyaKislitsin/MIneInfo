<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 21.12.2018
 * Time: 22:50
 */

namespace app\models;


use app\models\base\BaseModel;

/**
 * Класс модель для таблицы "cities".
 *
 * @property int $id ID записи в таблице
 * @property string $name Название города
 * @property string $info Информация о городе
 * @property int $created_at
 * @property int $updated_at
 */
class City extends BaseModel
{
    public $tableName = 'cities';
    public $id;
    public $name;
    public $info;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return array
     */
    public function selectIDsAndNames()
    {
        return $this->select(['id', 'name']);
    }
}
<?php
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

    public function rules(): array
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function selectIDsAndNames(): array
    {
        return $this->select(['id', 'name']);
    }
}

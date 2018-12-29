<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 21.12.2018
 * Time: 22:53
 */

namespace app\models\base;


use yii\base\Model;
use yii\helpers\VarDumper;

abstract class BaseModel extends Model
{
    public $tableName;
    public $db = null;

    /**
     * BaseModel constructor.
     * @param array $config
     * @throws \yii\db\Exception
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->db = \Yii::$app->db;
        $this->db->open();
    }

    public function select (array $fields = ['*'], array $closure = [])
    {

        $query = 'SELECT ' . implode(', ', $fields) . ' FROM ' . $this->tableName;

        if(!empty($closure['where'])) {
            $query .= ' WHERE ' . $closure['where'];
        }

        if(!empty($closure['orderBy'])) {
            $query .= ' ORDER BY ' . $closure['orderBy'];
        }

        if(!empty($closure['limit'])) {
            $query .= ' LIMIT ' . $closure['limit'];
        }

        $statement =  $this->db->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    public function insert (array $fields, array $values)
    {

        $fieldsLinks = preg_filter('/^/', ':', $fields);

        $query = 'INSERT INTO ' . $this->tableName . ' (' . implode(", ", $fields) . ') ' . 'VALUES ' .
            '(' . implode(", ", $fieldsLinks) . ')';

        $statement =  $this->db->pdo->prepare($query);
        return $statement->execute(array_combine($fieldsLinks, $values));
    }


}
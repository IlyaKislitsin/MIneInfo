<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 22.12.2018
 * Time: 0:27
 */

namespace app\controllers;


use app\models\City;
use app\models\Mine;
use yii\web\Controller;

class CityController extends Controller
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $cityModel = new City();

        $cities = $cityModel->select();

        return $this->render('index', [
            'cities' => $cities
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionView($id)
    {
        $city = new City();
        $model = $city->select(['*'], ['where' => 'id = '. $id]);

        $mine = new Mine();
        $mines = $mine->byCity($id);


        return $this->render('view', [
            'model' => $model,
            'mines' => $mines
        ]);
    }


    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new City();

        \Yii::$app->cityService->createCity($model);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if($model->insert(['name', 'info', 'created_at', 'updated_at'],
                [$model->name, $model->info, $model->created_at, $model->updated_at])) {
                \Yii::$app->session->setFlash('success', 'Город успешно добавлен.');
                return $this->redirect(['city/index']);
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
}
<?php
namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\{City, Mine};

class CityController extends Controller
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $cities = (new City)->select();

        return $this->render('index', [
            'cities' => $cities,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionView($id)
    {
        $model = (new City)->select(['*'], ['where' => 'id = '. $id]);
        $mines = (new Mine)->byCity($id);

        return $this->render('view', [
            'model' => $model,
            'mines' => $mines,
        ]);
    }


    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new City();
        Yii::$app->cityService->createCity($model);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->insert(['name', 'info', 'created_at', 'updated_at'],
                [$model->name, $model->info, $model->created_at, $model->updated_at])) {
                Yii::$app->session->setFlash('success', 'Город успешно добавлен.');
                return $this->redirect(['city/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}

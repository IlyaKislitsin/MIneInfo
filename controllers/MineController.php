<?php
namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Mine;

class MineController extends Controller
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $mines = (new Mine)->select();

        return $this->render('index', [
            'mines' => $mines
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new Mine();
        $cityNames = Yii::$app->cityService->getCityNames();
        Yii::$app->mineService->createMine($model);


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->insert(['name', 'info', 'city_id', 'created_at', 'updated_at'],
                [$model->name, $model->info, $model->city_id, $model->created_at, $model->updated_at])) {
                Yii::$app->session->setFlash('success', 'Шахта успешно добавлена.');
                return $this->redirect(['city/view', 'id' => $model->city_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'cityNames' => $cityNames,
        ]);
    }
}

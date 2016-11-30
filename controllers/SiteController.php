<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Feedback;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFeedback()
    {
        $model = new Feedback();
        $request = Yii::$app->request;

        if ($request->isAjax) {
            $model->name =  $request->post('name');
            $model->phone = $request->post('phone');
            $model->comment = $request->post('comment');
            $model->status = 1;

            if ($model->save())
                return 'success';

            return 'error';
        }

        return $this->redirect(['/']);
    }

}

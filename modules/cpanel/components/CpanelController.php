<?php

namespace app\modules\cpanel\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CpanelController extends Controller
{

  /*  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    } */

    protected function setFlash($type, $message)
    {
        Yii::$app->session->setFlash($type, $message);
    }

    protected function findModel($modelClass, $options)
    {
        if (($model = $modelClass::findOne($options)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function createModel($modelClass)
    {
        if (($model = new $modelClass()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
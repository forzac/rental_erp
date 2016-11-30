<?php
namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use app\models\Feedback;
use yii\web\Response;

class FeedbackController extends AdminController
{
    public $defaultAction = 'list';

    public function actionList(){

        $statuses = Feedback::statuses();

        $provider = new \yii\data\ActiveDataProvider([
            'query' => Feedback::find(),
        ]);

        return $this->render('list', ['provider' => $provider, 'statuses' => $statuses]);

    }

    public function actionDelete($id)
    {
        if(Feedback::findOne($id)->delete() !== false)
            $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
        else
            $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));

        return $this->redirect(['list']);
    }

    public function actionChangestatus($id, $status)
    {
        $model = Feedback::findOne($id);
        $model->status = (int)!$status;

        if ($model->save()) {
            $this->setFlash('success', \Yii::t('app', 'Modifications have been saved'));
        }else  $this->setFlash('error', \Yii::t('app', 'Modifications have not been saved'));

        return $this->redirect(['feedback/list']);
    }

}
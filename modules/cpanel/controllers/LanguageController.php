<?php
namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use app\models\Language;

use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;

class LanguageController extends AdminController
{
    public $defaultAction = 'list';

    public function actions()
    {
        return [
            'image-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'uploads-delete',
                'validationRules' => [
                    ['file', 'image', 'extensions' => 'png, jpg'],
                ]
            ],
            'uploads-delete' => [
                'class' => DeleteAction::className()
            ],
        ];
    }


    public function actionList(){

        $model = new Language();

        if (\Yii::$app->request->post() && $model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
            } else {
                $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));
            }
        }

        $provider = new \yii\data\ActiveDataProvider([
            'query' => Language::find()->orderBy('name'),
        ]);

        return $this->render('list', ['provider' => $provider]);
    }

    public function actionCreate()
    {
        return $this->actionUpdate(true);
    }

    public function actionUpdate($new = false)
    {
        if ($new === true) {
            $model = new Language();
        } else {
            $model = Language::findOne(\Yii::$app->request->get('id'));
        }

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
            } else {
                $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));
            }
            return $this->redirect('list');
        }

        return $this->render('form', ['model' => $model]);

    }

}
<?php
namespace app\modules\admin\controllers;

use app\models\Language;
use app\modules\admin\components\AdminController;
use app\models\Message;
use app\models\SourceMessage;
use app\modules\admin\models\Model;

class TranslateController extends AdminController
{
    public $defaultAction = 'list';

    public function actionCreate()
    {
        return $this->actionUpdate(true);
    }

    public function actionUpdate($new = false)
    {
        $modelsMessage = [];
        $languages = Language::find()->all();
        $lang_imgs = [];
        foreach($languages as $language){
            $lang_imgs[$language->id] = $language->getImageUrl();
        }

        if($new === true){
            $modelSourceMessage = new SourceMessage();
            foreach($languages as $language){
                $modelMessage = new Message();
                $modelMessage->language = $language->short_name;
                $modelsMessage[$language->id] = $modelMessage;
            }
        }else{
            $modelSourceMessage = SourceMessage::findOne(\Yii::$app->request->get('id'));
            foreach($languages as $language){
                if($message = Message::findOne(['id' => $modelSourceMessage->id, 'language' => $language->short_name]))
                    $modelMessage = $message;
                else
                    $modelMessage = new Message();

                    $modelMessage->language = $language->short_name;
                    $modelsMessage[$language->id] = $modelMessage;

            }
        }

        if ($modelSourceMessage->load(\Yii::$app->request->post())) {

            Model::loadMultiple($modelsMessage, \Yii::$app->request->post());

            if($modelSourceMessage->validate() && Model::validateMultiple($modelsMessage))

            if ($modelSourceMessage->save()) {
                foreach ($modelsMessage as $modelMessage){
                    $modelMessage->link('sourceMessage', $modelSourceMessage);
                    $modelMessage->save();
                }
                $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
            } else {
                $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));
            }
            return $this->redirect('list');
        }


        return $this->render('form', ['modelSourceMessage' => $modelSourceMessage,
            'modelsMessage' => $modelsMessage,
            'lang_imgs' => $lang_imgs
        ]);

    }

    public function actionDelete($id)
    {
        if(SourceMessage::findOne($id)->delete() !== false)
            $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
        else
            $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));

        return $this->redirect(['list']);

    }

    public function actionList(){

        $model = new SourceMessage();

        if (\Yii::$app->request->post() && $model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));
            } else {
                $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));
            }
        }

        $provider = new \yii\data\ActiveDataProvider([
            'query' => SourceMessage::find()->orderBy('category', 'message'),
        ]);

        return $this->render('list', ['provider' => $provider]);

    }

}
<?php
namespace app\modules\admin\controllers;

use app\models\Language;
use app\models\SettingApt;
use app\models\SettingSite;
use app\modules\admin\components\AdminController;
use app\models\translations\SettingTranslate;

use app\modules\admin\models\Model;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;

class SettingsController extends AdminController
{
    public $defaultAction = 'form';

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

    public function actionForm(){

        $modelsSettingTranslate = [];
        $aptItems = [];
        $aptSelectedItems = [];
        $modelsApt = [];

        foreach (\app\models\Apt::find()->with('currentTranslation')->all() as $apt){
            $aptItems[$apt->id] = $apt->currentTranslation->title;
        }

        $languages = Language::find()->all();
        $lang_imgs = [];
        foreach($languages as $language){
            $lang_imgs[$language->id] = $language->getImageUrl();
        }

        foreach($languages as $language){
            $modelSettingTranslate = SettingTranslate::find()->where(['language_id' => $language->id])->one();
            if(!$modelSettingTranslate) {
                $modelSettingTranslate = new SettingTranslate();
                $modelSettingTranslate->language_id = $language->id;
            }
            $modelsSettingTranslate[$language->id] = $modelSettingTranslate;

        }

        $modelSettingSite = SettingSite::findOne(1);
        if(!$modelSettingSite) {
            $modelSettingSite = new SettingSite();
        }

        foreach ($modelSettingSite->apts as $apt){
            $aptSelectedItems [] = $apt->apt_id;
            $modelsApt[] = $apt;
        }

        if(!$modelsApt) $modelsApt = [new SettingApt()];

        if (\Yii::$app->request->post()) {

            $modelsApt = Model::createMultiple(SettingApt::classname());

            if( Model::loadMultiple($modelsSettingTranslate, \Yii::$app->request->post())
                 && $modelSettingSite->load(\Yii::$app->request->post())

            ) {

                Model::loadMultiple($modelsApt, \Yii::$app->request->post());

                /* echo "<pre>";
                var_dump($modelsApt);
                echo "</pre>";
                exit;

               */

                 if (Model::validateMultiple($modelsSettingTranslate) && $modelSettingSite->validate() && Model::validateMultiple($modelsApt) ) {

                     $modelSettingSite->id = 1;

                     if($modelSettingSite->save()){
                         SettingApt::deleteAll(['setting_id' => 1]);

                     //    var_dump($modelsApt); exit;
                         foreach ($modelsApt as $item) {
                             $item->link('setting', $modelSettingSite);
                             $item->save(false);

                         }
                     }

                     $aptSelectedItems = [];
                     foreach ($modelSettingSite->apts as $apt){
                         $aptSelectedItems [] = $apt->apt_id;
                         $modelsApt[] = $apt;
                     }

                     foreach ($modelsSettingTranslate as $modelSettingTranslate) {
                         $modelSettingTranslate->save();
                     }
                     $this->setFlash('success', \Yii::t('admin', 'Modifications have been saved'));


                 } else {
                     $this->setFlash('error', \Yii::t('admin', 'Modifications have not been saved'));
                 }
             }
        }

        return $this->render('form', [
                                        'modelsSettingTranslate' => $modelsSettingTranslate,
                                        'modelSettingSite' => $modelSettingSite,
                                        'modelsApt' => $modelsApt,
                                        'aptItems' => $aptItems,
                                        'aptSelectedItems' => $aptSelectedItems,
                                        'lang_imgs' => $lang_imgs
        ]);

    }

}
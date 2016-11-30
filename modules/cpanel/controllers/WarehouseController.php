<?php
namespace app\modules\cpanel\controllers;

use app\models\Company;
use app\models\Warehouse;
use app\modules\cpanel\components\CpanelController;

class WarehouseController extends CpanelController
{

    public $defaultAction = 'list';
    private $modelName = '';

    public function init()
    {
        $this->modelName = Warehouse::className();
        parent::init();
    }

    public function actionCreate()
    {
        return $this->actionUpdate(true);
    }

    public function actionUpdate($new = false)
    {

        $listCompanies = array( 0 => \Yii::t('app', 'Root category'));

        $comps = Company::find()->orderBy('name')->all();

        foreach ($comps as $comp) {
            $listCompanies[$comp->id] = $comp->name;
        }

        if($new === true){
            $model = $this->createModel($this->modelName);
        }else{
            $model = $this->findModel($this->modelName, \Yii::$app->request->get('id'));
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

             if ($model->save()) {
                $this->setFlash('success', \Yii::t('app', 'Modifications have been saved'));
            } else {
                $this->setFlash('error', \Yii::t('app', 'Modifications have not been saved'));
            }
            return $this->redirect('list');
        }

        return $this->render('form', ['model' => $model, 'listCompanies' => $listCompanies]);

    }

    public function actionDelete($id)
    {
        if($this->findModel($this->modelName, $id)->delete() !== false)
            $this->setFlash('success', \Yii::t('app', 'Modifications have been saved'));
        else
            $this->setFlash('error', \Yii::t('app', 'Modifications have not been saved'));

        return $this->redirect(['list']);

    }

    public function actionList(){

        $model = $this->createModel($this->modelName);

        return $this->render('list', ['provider' => $model->getProvider()]);

    }

}
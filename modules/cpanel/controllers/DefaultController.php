<?php
namespace app\modules\cpanel\controllers;

use app\models\User;
use yii\web\Controller;
use app\modules\cpanel\models\LoginForm;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
    public $defaultAction = 'login';
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post']
                ]
            ]
        ];
    }

    public function actionDashboard(){
        $data = [
            ['id' => 1, 'name' => 'name', 'customer' => 'Client', 'summa' => 125.0, 'payed' => 125.0, 'debt' => 0],
            ['id' => 1, 'name' => 'name', 'customer' => 'Client', 'summa' => 125.0, 'payed' => 125.0, 'debt' => 0],
            ['id' => 1, 'name' => 'name', 'customer' => 'Client', 'summa' => 125.0, 'payed' => 125.0, 'debt' => 0],
            ['id' => 1, 'name' => 'name', 'customer' => 'Client', 'summa' => 125.0, 'payed' => 125.0, 'debt' => 0],
            ['id' => 1, 'name' => 'name', 'customer' => 'Client', 'summa' => 125.0, 'payed' => 125.0, 'debt' => 0],
        ];

        $provider = new \yii\data\ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'name'],
            ],
        ]);
        return $this->render('dashboard', ['provider' => $provider]);
    }

    public function actionLogin()
    {

        $this->layout = '@app/modules/cpanel/views/layouts/login';

     //   \Yii::$app->user->logout();
        //var_dump(\Yii::$app->user->id);exit;

        if (!\Yii::$app->user->isGuest) {
            $this->redirect(['dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);

    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

}
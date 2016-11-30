<?php
namespace app\modules\cpanel;

use app\components\BaseModule;

class CpanelModule extends BaseModule
{

    public function init()
    {

        parent::init();
        $this->layout = 'main';
        \Yii::$app->setHomeUrl('/');

    }

}

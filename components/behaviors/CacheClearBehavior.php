<?php

namespace app\components\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class CacheClearBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'clear',
            ActiveRecord::EVENT_AFTER_UPDATE => 'clear',
            ActiveRecord::EVENT_AFTER_DELETE => 'clear',
        ];
    }

    public function clear()
    {
        \Yii::$app->cache->flush();
    }
}
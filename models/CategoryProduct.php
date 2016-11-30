<?php

namespace app\models;

use Yii;

/**
 * This is the model class settings
 *
 * @property integer $id
 * @property string $text
 * @property integer $sort
 */
class CategoryProduct extends \yii\db\ActiveRecord
{
use \app\components\GetProvider;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string'],
            ['parent_id', 'integer'],
            ['parent_id', 'default', 'value' => 0],
            ['sort', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'parent_id' => Yii::t('app', 'Parent category'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

}

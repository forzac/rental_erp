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
class Company extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string', 'max' => 255],
            ['description', 'string'],
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
            'description' => Yii::t('app', 'Description'),
            'sort' => Yii::t('app', 'Sort'),

        ];
    }

    public function getProvider()
    {

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => self::find(),
            'sort' => [
            ],
        ]);

        return $dataProvider;
    }
}

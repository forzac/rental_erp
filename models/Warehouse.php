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
class Warehouse extends \yii\db\ActiveRecord
{
use \app\components\GetProvider;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'string'],
            ['company_id', 'integer'],
            ['company_id', 'default', 'value' => 0],
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
            'company_id' => Yii::t('app', 'Company'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    public function getCompany(){
        return $this->hasOne(Company::className(), ['id' => 'company_id'])->one();
    }

}

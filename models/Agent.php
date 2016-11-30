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
class Agent extends \yii\db\ActiveRecord
{
use \app\components\GetProvider;

    const TYPE_CUSTOMER = 1;
    const TYPE_SUPPLIER = 2;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'position', 'phone_main', 'phone_add', 'email', 'service'], 'string', 'max' => 255],
            [['first_name', 'last_name'], 'required'],
            ['agent_type', 'integer'],
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('app', 'First name'),
            'last_name' => Yii::t('app', 'Last name'),
            'middle_name' => Yii::t('app', 'Middle name'),
            'position' => Yii::t('app', 'Agent position'),
            'phone_main' => Yii::t('app', 'Phone main'),
            'phone_add' => Yii::t('app', 'Phone additional'),
            'email' => Yii::t('app', 'Email'),
            'service' => Yii::t('app', 'Service'),
            'agent_type' => Yii::t('app', 'Agent type'),
            'fio' => Yii::t('app', 'Fio')
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

    public static function getTypes(){

        return array( self::TYPE_CUSTOMER => Yii::t('app', 'Customer'), self::TYPE_SUPPLIER => Yii::t('app', 'Supplier') );
    }

    public function getFio(){

        return $this->first_name . " " . $this->last_name;
    }

}

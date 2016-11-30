<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%storage}}".
 *
 * @property int $id
 * @property string $key
 * @property string $content
 * @property integer $updated_at
 * @property integer $created_at
 */
class Storage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%storage}}';
    }

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'string', 'max' => 255],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'key' => Yii::t('app', 'Key'),
            'content' => Yii::t('app', 'Content'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\admin\models\query\StorageQuery the active query used by this AR class.
     */
   /* public static function find()
    {
       // return new \app\modules\admin\models\query\StorageQuery(get_called_class());
    } */
}

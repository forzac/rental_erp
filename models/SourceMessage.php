<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use app\models\Message;

class SourceMessage extends \yii\db\ActiveRecord
{

    /**
     * @return string
     * @throws InvalidConfigException
     */
    public static function tableName()
    {
      /*  $i18n = Yii::$app->getI18n();
        if (!isset($i18n->sourceMessageTable)) {
            throw new InvalidConfigException('Source Message table doesn\'t set !');
        }*/
        return '{{%source_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category','message'], 'required'],
            ['category', 'string', 'max' => 255],
            ['message', 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'message' => 'Message'
        ];
    }

    public function afterDelete()
    {
        Message::deleteAll(['id' => $this->id]);
        parent::afterDelete();
    }

    public function getSourceMesage()
    {
        return $this->hasOne(Message::className(), ['id' => 'id']);
    }
}

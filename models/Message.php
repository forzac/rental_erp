<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use app\models\SourceMessage;

class Message extends \yii\db\ActiveRecord
{

    /**
     * @return string
     * @throws InvalidConfigException
     */
    public static function tableName()
    {
        /*$i18n = Yii::$app->getI18n();
        if (!isset($i18n->messageTable)) {
            throw new InvalidConfigException('Message table doesn\'t set !');
        }*/
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language','translation'], 'required'],
            ['language', 'string', 'max' => 16],
            ['translation', 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'translation' => 'Translation'
        ];
    }

    public function getSourceMessage()
    {
        return $this->hasOne(SourceMessage::className(), ['id' => 'id']);
    }
}

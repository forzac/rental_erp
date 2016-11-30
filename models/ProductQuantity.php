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
class ProductQuantity extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id', 'quantity'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product'),
            'warehouse_id' => Yii::t('app', 'Warehouse'),
            'quantity' => Yii::t('app', 'Quantity'),
        ];
    }

}

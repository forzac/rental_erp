<?php

namespace app\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class settings
 *
 * @property integer $id
 * @property string $text
 * @property integer $sort
 */
class Product extends \yii\db\ActiveRecord
{
use \app\components\GetProvider;

    public $image;

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'model', 'barcode' ], 'string'],
            [['category_id', 'sort'], 'integer'],
            ['image', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'model' => Yii::t('app', 'Model'),
            'category_id' => Yii::t('app', 'Product category'),
            'barcode' => Yii::t('app', 'Barcode'),
            'categoryName' => Yii::t('app', 'Product category'),
            'quantity' => Yii::t('app', 'Quantity'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }


    public function getMainImageUrl()
    {
        return Yii::$app->request->hostInfo . $this->image_base_url . '/' . $this->image_path;
    }

    public function getCategoryName(){
        $category = CategoryProduct::find()->where(['id' => $this->category_id])->one();

        return $category ? $category->name : null;
    }

    public static function generateBarcode(){
        return rand(1000000,9999999);
    }

    public function getQuantity(){
        return ProductQuantity::find()->where(['product_id'=> $this->id])->sum('quantity');
    }

}

<?php

namespace app\components;

use \yii\data\ActiveDataProvider;


/**
 * Trait to create ActiveDataProvider
 * Class GetProvider
 * @package app\traits
 */
trait GetProvider
{
    public function getProvider()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => self::find(),
            'sort' => [
            ],
        ]);

        return $dataProvider;
    }

}

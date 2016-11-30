<?php

use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.11.2016
 * Time: 10:19
 */

if (isset($model)) {
    echo Html::checkbox($model, false, ['label' => "<i></i>", 'labelOptions' => ['class' => 'checkbox']]);
} else {
    echo "<form class='form-horizontal'>" . Html::checkbox($name, false, ['label' => "<i></i>" . $labelValue, 'labelOptions' => ['class' => 'checkbox']]) . "</form>";
}

?>
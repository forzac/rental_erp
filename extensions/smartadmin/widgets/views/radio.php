<?php

use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 04.11.2016
 * Time: 13:09
 */

if (isset($model)) {
    echo Html::radio($model, false, ['label' => "<i></i>", 'labelOptions' => ['class' => 'radio']]);
} else {
    echo "<form class='form-horizontal'>" . Html::radio($name, false, ['label' => "<i></i>" . $labelValue, 'labelOptions' => ['class' => 'radio']]) . "</form>";
}

?>



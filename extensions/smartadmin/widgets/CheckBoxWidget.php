<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 04.11.2016
 * Time: 13:08
 */

namespace app\extensions\smartadmin\widgets;
use yii\helpers\Html;
use app\extensions\smartadmin\assets\SmartAdminAsset;
use yii\web\View;
use Yii;
use yii\base\Widget;
use yii\widgets\InputWidget;


class CheckBoxWidget extends InputWidget
{
    /** @var array */
    private $defaultOptions = ['class' => 'checkbox state-disabled'];
    private $modelName;
    private $defaultClientOptions = [
        'width' => 200,
    ];
    /** @var array */
    public $options = [];
    /** @var array */
    public $clientOptions = [
        'labelValue' => 'custom'
    ];

    public function init()
    {
        $this->options = array_merge($this->defaultOptions, $this->options);
        $this->clientOptions = array_merge($this->defaultClientOptions, $this->clientOptions);
        parent::init();
    }

    public function run()
    {
        if ($this->hasModel()) {
            $this->modelName = $this->model->formName() . "[" . $this->attribute . "]";

            return $this->render('checkbox', ['model' => $this->modelName]);
        } else {
            return $this->render('checkbox', ['name' => $this->name, 'labelValue' => $this->clientOptions['labelValue']]);
        }
    }
}
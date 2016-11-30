<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 04.11.2016
 * Time: 20:49
 */

namespace app\extensions\smartadmin\widgets;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class CheckboxToggleWidget  extends InputWidget
{
    /** @var array */
    private $defaultOptions = ['class' => 'radio state-disabled'];
    private $modelName;
    private $defaultClientOptions = [];

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

            return $this->render('checkbox_toggle', ['model' => $this->modelName]);
        } else {
            return $this->render('checkbox_toggle', ['name' => $this->name, 'labelValue' => $this->clientOptions['labelValue']]);
        }
    }
}
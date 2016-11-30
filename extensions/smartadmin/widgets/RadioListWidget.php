<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 04.11.2016
 * Time: 13:08
 */

namespace app\extensions\smartadmin\widgets;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\ArrayHelper;

class RadioListWidget extends InputWidget
{
    /** @var array */
    private $defaultOptions = ['class' => 'radio'];
    private $modelName;
    private $defaultClientOptions = [
        'width' => 200,
    ];
    /** @var array */
    public $options = [];
    /** @var array */
    public $clientOptions = [
        'labelValue' => 'custom',
        'listItems' => [
            [
                'id' => '1',
                'name' => 'DA'
            ],
            [
                'id' => '2',
                'name' => 'NET'
            ],
        ]
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

            Html::radioList($this->modelName, [16, 42], ArrayHelper::map($this->clientOptions['listItems'], 'id', 'name'), ['label' => "<i></i>", 'labelOptions' => ['class' => 'radio']]);
        } else {
            return $this->render('radio', ['name' => $this->name, 'labelValue' => $this->clientOptions['labelValue']]);
        }
    }
}
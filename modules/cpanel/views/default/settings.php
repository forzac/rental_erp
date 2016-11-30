<?php
use app\smartadmin\widgets\SmartGrid;
use yii\helpers\Html;

$this->title = \Yii::t('admin', 'Settings');
$this->params['breadcrumbs'][] = ['label' => $this->title,
                                    'url' => \yii\helpers\Url::to('settings')];
?>
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?=    SmartGrid::widget([
            'dataProvider' => $provider,
            'caption' => 'TEst Table',
            'options' => ['id' => 'wid-id-0',
                          'class' => 'jarviswidget jarviswidget-color-darken'],
            'columns' => [
                    [
                    'attribute' => 'key',
                    ],
                    [
                    'attribute' => 'value',
                    ],
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    'template' => '{update}',
                   'buttons' => ['update' => function ($url, $model, $key) {
                                     //return Html::a('Update', \yii\helpers\Url::to('super'));
                                       return Html::a('<span class="fa fa-pencil"></span>', $url, ['class' => 'btn btn-success']);
                                    },

                                ],
                ]
                ]
           // 'filterModel' => $searchModel,
        ]); ?>
        </article>
    </div>
</section>

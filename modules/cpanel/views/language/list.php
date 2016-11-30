<?php
use app\smartadmin\widgets\SmartGrid;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::t('admin', 'Languages');
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<section id="widget-grid" class="">

    <div class="row-margin row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= Html::a('<i class="fa fa-plus"></i> '. \Yii::t('admin','Add'), Url::to(['language/create']) , ['class' => 'btn btn-success pull-right']); ?>
        </div>
    </div>

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?=    SmartGrid::widget([
                'dataProvider' => $provider,
                'caption' => $this->title,
                'options' => ['id' => 'wid-id-3',
                    'class' => 'jarviswidget jarviswidget-color-darken'],
                'columns' => [
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style'=>'width: 5%'],
                    ],
                    [
                        'attribute' => 'name',
                        'headerOptions' => ['style'=>'width: 30%'],
                    ],
                    [
                        'attribute' => 'short_name',
                        'headerOptions' => ['style'=>'width: 30%'],
                    ],
                    [
                        'attribute' => 'default',
                        'headerOptions' => ['style'=>'width: 10%'],
                    ],
                    [
                        'attribute' => 'image',
                        'headerOptions' => ['style'=>'width: 10%'],
                        'format' => 'html',
                        'value' => function($model) {
                            return \yii\helpers\Html::img($model->getImageUrl(), ['height' => 20]);
                        }
                    ],
                    [
                        'class' => \yii\grid\ActionColumn::className(),
                        'headerOptions' => ['style'=>'min-width: 80px'],
                        'options' => ['style'=>'min-width: 80px'],
                        'template' => '{update} {clone} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model, $key) {
                            return Html::a('<span class="fa fa-pencil"></span>', $url, ['class' => 'btn btn-success']);
                        },
                            'delete' => function ($url, $model, $key) {
                            return Html::a('<span class="fa fa-trash"></span>', $url, ['class' => 'btn btn-danger']);
                        },

                        ],
                    ]
                ]

            ]); ?>


        </article>
    </div>
</section>

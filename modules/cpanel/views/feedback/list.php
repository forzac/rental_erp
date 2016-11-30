<?php
use app\smartadmin\widgets\SmartGrid;
use yii\helpers\Html;

$this->title = \Yii::t('admin', 'Feedback');
$this->params['breadcrumbs'][] = ['label' => $this->title,
    'url' => \yii\helpers\Url::to('feedback')];
?>
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?=    SmartGrid::widget([
                'dataProvider' => $provider,
                'caption' => $this->title,
                'options' => ['id' => 'wid-id-3',
                    'class' => 'jarviswidget jarviswidget-color-darken'],
                'columns' => [

                    [
                        'attribute' => 'name',
                        'headerOptions' => ['style'=>'width: 20%'],
                    ],
                    [
                        'attribute' => 'phone',
                        'headerOptions' => ['style'=>'width: 10%'],
                    ],
                    [
                        'attribute' => 'comment',
                        'headerOptions' => ['style'=>'width: 60%'],
                    ],
                    [
                        'class' => \yii\grid\ActionColumn::className(),
                        'headerOptions' => ['style'=>'width: 10%'],
                        'template' => '{changestatus} {delete}',
                        'buttons' => [
                            'changestatus' => function ($url, $model, $key) {
                            $url = \yii\helpers\Url::to(['feedback/changestatus/', 'id'=> $model->primaryKey, 'status'=> $model->status]);
                            return Html::a('<span class="fa fa-eye"></span>', $url, ['class' => 'btn btn-'. ($model->status ? 'warning' : 'success') ]);
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

<h2>  Это рабочий стол </h2>
<?php
use app\extensions\smartadmin\widgets\SmartGrid;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::t('app', 'My orders');
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<section id="widget-grid">

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <article>
            <?=    SmartGrid::widget([
                'dataProvider' => $provider,
                'table_id' => 'dt_basic1',
                'table_footer' => 'false',
                'table_search' => 'false',
                'table_custom_header' => Html::a('<i class="fa fa-plus"></i> '. \Yii::t('app','Add order'), "#", ['class' => 'btn btn-success pull-right', 'style' => 'margin-bottom:5px']),
                'caption' => $this->title,
                'options' => ['id' => 'wid-id-3',
                    'class' => 'jarviswidget jarviswidget-color-darken',
                    'data-widget-colorbutton' => 'true',
                    'data-widget-editbutton' => 'true'],
                'columns' => [
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style'=>'width: 75%'],
                    ],
                    [
                        'attribute' => 'name',
                        'headerOptions' => ['style'=>'width: 75%'],
                    ],
                    [
                        'attribute' => 'customer',
                        'headerOptions' => ['style'=>'width: 75%'],
                    ],
                    [
                        'attribute' => 'summa',
                        'headerOptions' => ['style'=>'width: 75%'],
                    ],
                    [
                        'attribute' => 'payed',
                        'headerOptions' => ['style'=>'width: 75%'],
                    ],
                    [
                        'attribute' => 'debt',
                        'headerOptions' => ['style'=>'width: 75%'],
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

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <article>
                <?=    SmartGrid::widget([
                    'dataProvider' => $provider,
                    'table_id' => 'dt_basic2',
                    'table_footer' => 'false',
                    'table_search' => 'false',
                    'table_custom_header' => Html::a('<i class="fa fa-plus"></i> '. \Yii::t('app','Add order'), "#" , ['class' => 'btn btn-success pull-right', 'style' => 'margin-bottom:5px']),
                    'caption' => $this->title,
                    'options' => ['id' => 'wid-id-4',
                        'class' => 'jarviswidget jarviswidget-color-darken',
                        'data-widget-colorbutton' => 'true',
                        'data-widget-editbutton' => 'true'],
                    'columns' => [
                        [
                            'attribute' => 'id',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'name',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'customer',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'summa',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'payed',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'debt',
                            'headerOptions' => ['style'=>'width: 75%'],
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
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <article>
                <?=    SmartGrid::widget([
                    'dataProvider' => $provider,
                    'table_id' => 'dt_basic3',
                    'table_footer' => 'false',
                    'table_search' => 'false',
                    'table_custom_header' => Html::a('<i class="fa fa-plus"></i> '. \Yii::t('app','Add order'), '#' , ['class' => 'btn btn-success pull-right', 'style' => 'margin-bottom:5px']),
                    'caption' => $this->title,
                    'options' => ['id' => 'wid-id-5',
                        'class' => 'jarviswidget jarviswidget-color-darken',
                        'data-widget-colorbutton' => 'true',
                        'data-widget-editbutton' => 'true'],
                    'columns' => [
                        [
                            'attribute' => 'id',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'name',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'customer',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'summa',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'payed',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'debt',
                            'headerOptions' => ['style'=>'width: 75%'],
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

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <article>
                <?=    SmartGrid::widget([
                    'dataProvider' => $provider,
                    'table_id' => 'dt_basic4',
                    'table_footer' => 'false',
                    'table_search' => 'false',
                    'table_custom_header' => Html::a('<i class="fa fa-plus"></i> '. \Yii::t('app','Add order'), "#" , ['class' => 'btn btn-success pull-right', 'style' => 'margin-bottom:5px']),
                    'caption' => $this->title,
                    'options' => ['id' => 'wid-id-6',
                        'class' => 'jarviswidget jarviswidget-color-darken',
                        'data-widget-colorbutton' => 'true',
                        'data-widget-editbutton' => 'true'],
                    'columns' => [
                        [
                            'attribute' => 'id',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'name',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'customer',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'summa',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'payed',
                            'headerOptions' => ['style'=>'width: 75%'],
                        ],
                        [
                            'attribute' => 'debt',
                            'headerOptions' => ['style'=>'width: 75%'],
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

    </div>



</section>


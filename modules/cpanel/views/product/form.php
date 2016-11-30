<?php

use \yii\widgets\Pjax;

$this->title = \Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Products'),
    'url' => \yii\helpers\Url::to(['product/list'])];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<section id="widget-grid" class="">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'form-1',
        'method' => 'post',
        'options' => [
            'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data'],
        'validateOnChange' => true,
        'validateOnBlur' => true,
        'validateOnType'=> true,
    ]); ?>
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="true" data-widget-editbutton="true">
                <header>
                    <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                    <h2><?= \Yii::t('app', 'Product') ?></h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body">


                        <?= $form->field($model, 'name',
                                [   'template' => '{label}<div class="col-md-10">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-md-2 control-label'],
                                ])->textInput();
                        ?>

                        <?= $form->field($model, 'category_id',
                            [   'template' => '{label}<div class="col-md-10">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
                            ])->dropDownList($listCategories);
                        ?>

                        <?= $form->field($model, 'model',
                            [   'template' => '{label}<div class="col-md-10">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
                            ])->textInput();
                        ?>

                        <?php Pjax::begin(['enablePushState' => false]); ?>
                        <?php $gen = \yii\helpers\Html::a('<i class="fa fa-code"></i> '. \Yii::t('app','Generate'), \yii\helpers\Url::to(['product/generate-code']) , ['class' => 'btn btn-primary pull-left']); ?>

                        <?= $form->field($model, 'barcode',
                                    [   'template' => '{label}<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">{input}</div><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">' . $gen . '</div>{hint}{error}',
                                        'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                    ])->textInput(['value' => isset($barcode) ? $barcode : $model->barcode]);
                            ?>
                        <?php Pjax::end(); ?>

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <?= $form->field($model, 'image')->label(Yii::t('app', 'Image'))->widget(
                                    \trntv\filekit\widget\Upload::className(),
                                    [
                                        'url' => ['image-upload'],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <?= $form->field($model, 'sort',
                                [   'template' => '{label}<div class="col-md-2">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-md-2 control-label'],
                                ])->textInput();
                        ?>

                        <?= $form->field($model, 'quantity',
                                [   'template' => '{label}<div class="col-md-2">{input}</div>{hint}{error}',
                                    'labelOptions' => [ 'class' => 'col-md-2 control-label',
                                                        'style' => 'font-weight: bold;'],
                                    'inputOptions' => ['readonly' => 'true']
                                ])->textInput();
                        ?>

                    </div>
                </div>

            </div>

        </article>
    </div>


    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <?= \yii\helpers\Html::submitButton('<i class="fa fa-save"></i> '. \Yii::t('app','Save'),
                    ['class' => 'btn btn-primary']
                ); ?>

                <?= \yii\helpers\Html::a('<i class="fa fa-angle-left"></i> '. \Yii::t('app','Back'), \yii\helpers\Url::to(['product/list']) , ['class' => 'btn btn-success pull-left']); ?>
            </div>
        </div>
    </div>

    <?php $form->end();?>
</section>

<?php


?>


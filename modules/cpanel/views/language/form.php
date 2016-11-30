<?php

$this->title = \Yii::t('admin', 'Update');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('admin', 'Languages'),
    'url' => \yii\helpers\Url::to(['language/list'])];
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
                    <h2><?= \Yii::t('admin', 'Language') ?></h2>

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
                        <?= $form->field($model, 'short_name',
                                [   'template' => '{label}<div class="col-md-10">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-md-2 control-label'],
                                 //   'inputOptions' => ['class' => 'click2edit']
                                ])->textInput();
                        ?>

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <?= $form->field($model, 'default',
                                    [   'template' => '{label}<div class="col-md-2">{input}</div>{hint}{error}',
                                        'labelOptions' => ['class' => 'col-md-2 control-label'],
                                    ])->checkbox();
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <?= $form->field($model, 'image')->label(Yii::t('admin', 'Image'))->widget(
                                    \trntv\filekit\widget\Upload::className(),
                                    [
                                        'url' => ['image-upload'],
                                    ]);
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </article>
    </div>


    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <?= \yii\helpers\Html::submitButton('<i class="fa fa-save"></i> '. \Yii::t('admin','Save'),
                    ['class' => 'btn btn-primary',
                        'onclick' => '$(\'.click2edit\').val($(\'#summernote\').code());'   ]
                ); ?>
            </div>
        </div>
    </div>

    <?php $form->end();?>
</section>

<?php


?>


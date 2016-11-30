<?php
use app\smartadmin\widgets\SmartGrid;
use yii\helpers\Html;

$this->title = \Yii::t('admin', 'Settings');
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="true" data-widget-editbutton="true">
                <header>
                    <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                    <h2><?= $this->title ?></h2>

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

                        <?php $form = \yii\bootstrap\ActiveForm::begin([
                            'id' => 'wid-id-1',
                            'method' => 'post',
                            'options' => ['class' => 'form-horizontal'],
                            'validateOnChange' => true,
                            'validateOnBlur' => true,
                            'validateOnType'=> true,
                        ]); ?>

                        <?php

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]site_name",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_banner",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }
                        ?>

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <?= $form->field($modelSettingSite, 'image')->widget(
                                    \trntv\filekit\widget\Upload::className(),
                                    [
                                        'url' => ['image-upload'],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <?php
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_top",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->widget(\marqu3s\summernote\Summernote::className());
                        }
                        ?>

                        <?= $form->field($modelSettingSite, 'SettingApt[]',
                            [   'template' => '{label}<div class="col-md-6">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
                            ])->label(Yii::t('admin', 'Products set on main'))
                            ->widget(app\modules\admin\widgets\MultiSelect::className(),
                            [
                                'items' => $aptItems, // id => title of model Facilities
                                'selectedItems' => $aptSelectedItems, // $modelsFacility->isNewRecord ? [] : [], //$assignments,
                                'ajax' => false,
                                'name' => 'SettingApt[][apt_id]',
                                'defaultLabel' => \Yii::t('admin', 'Choose Apartments...')
                            ]
                        );
                        ?>

                        <?php
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_title",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_description",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->widget(\marqu3s\summernote\Summernote::className());
                        }

                        ?>

                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            </div>
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <?php echo $form->field($modelSettingSite, 'images')->widget(
                                    \trntv\filekit\widget\Upload::className(),
                                    [
                                        'url' => ['image-upload'],
                                        'sortable' => true,
                                        'maxFileSize' => 10000000, // 10 MiB
                                        'maxNumberOfFiles' => 10
                                    ]);
                                ?>
                            </div>
                        </div>

                        <?php
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_bottom",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->widget(\marqu3s\summernote\Summernote::className());
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_city",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_address",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_phone1",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_phone2",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_phone3",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }

                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_email",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_copy_title",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->textInput();
                        }
                        foreach ($modelsSettingTranslate as $key => $modelSettingTranslate) {
                            echo $form->field($modelSettingTranslate, "[$key]text_copy",
                                ['template' => '<img src="'.($lang_imgs[$key] ? $lang_imgs[$key] : '' ).'" width="32px">{label}<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">{input}</div>{hint}{error}',
                                    'labelOptions' => ['class' => 'col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label'],
                                ])->widget(\marqu3s\summernote\Summernote::className());
                        }

                         echo $form->field($modelSettingSite, 'link_fb',
                            [   'template' => '{label}<div class="col-md-6">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
                            ])->textInput();
                         echo $form->field($modelSettingSite, 'link_twitter',
                            [   'template' => '{label}<div class="col-md-6">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
                            ])->textInput();
                         echo $form->field($modelSettingSite, 'link_location',
                            [   'template' => '{label}<div class="col-md-6">{input}</div>{hint}{error}',
                                'labelOptions' => ['class' => 'col-md-2 control-label'],
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
                <?= \yii\helpers\Html::submitButton('<i class="fa fa-save"></i> '. \Yii::t('admin','Save'),
                    [
                        'class' => 'btn btn-primary',
                    ]
                ); ?>
            </div>
        </div>
    </div>
    <?php $form->end();?>
</section>

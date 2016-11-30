<?php
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','Log in');
?>

<div id="log-form" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">


            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-centered">
                <div class="well no-padding">

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'smart-form client-form']
                    ]); ?>

                        <header>
                            <?= Yii::t('app','Log in')?>
                        </header>

                        <fieldset>

                            <?= $form->field($model, 'username',
                                            [ 'template' => "<section>{label}\n<label class='input'><i class=\"icon-append fa fa-user\"></i>{input}\n{hint}\n</label>{error}</section>",
                                              'options' => [],
                                              'hintOptions' => ['class' => 'tooltip tooltip-top-right'],
                                              'labelOptions' => ['class' => 'label'],
                                            ]
                            )->label(Yii::t('app', 'Log in'))->hint('<i class="fa fa-user txt-color-teal"></i> ' . Yii::t('app', 'Hint login')) ?>

                            <?= $form->field($model, 'password',
                                [ 'template' => "<section>{label}\n<label class='input'><i class=\"icon-append fa fa-lock\"></i>{input}\n{hint}\n</label>{error}</section>",
                                    'options' => [],
                                    'hintOptions' => ['class' => 'tooltip tooltip-top-right'],
                                    'labelOptions' => ['class' => 'label'],
                                ]
                            )->label(Yii::t('app', 'Password'))->hint('<i class="fa fa-lock txt-color-teal"></i> ' . Yii::t('app', 'Hint password')) ?>

                         <!--   <div class="note">
                                <a href=""><?= Yii::t('app','Forgot password?')?></a>
                            </div> -->

                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                <?= Yii::t('app','Log in')?>
                            </button>
                        </footer>
                    <?php ActiveForm::end(); ?>

                </div>



            </div>

    </div>

</div>

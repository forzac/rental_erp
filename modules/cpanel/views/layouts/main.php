<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\modules\cpanel\assets\CpanelAsset;

CpanelAsset::register($this);
app\extensions\smartadmin\assets\SmartAdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
    <?php $this->head() ?>
</head>
<body class="desktop-detected pace-done">
<?php $this->beginBody() ?>

<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(0%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<?= $this->render('header'); ?>

<?= $this->render('left-panel'); ?>

<?= $this->render('main-content', ['content' => $content]); ?>

<?= $this->render('footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

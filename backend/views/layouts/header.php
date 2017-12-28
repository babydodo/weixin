<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></span><span class="logo-lg">我的后台</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>" data-method="post">
                        <span class="hidden-xs">注销</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

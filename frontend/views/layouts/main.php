<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="shortcut icon" href="img/favicon.ico">

    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<!-- navbar -->
<div class="navbar-section">
    <div class="navbar">
        <div class="container">
<!--            <div class="panel-control-left">-->
<!--                <a href="#" data-activates="slide-out-left" class="sidenav-control"><i class="fa fa-bars"></i></a>-->
<!--            </div>-->
            <div class="site-title">
                <a href="#" class="logo"><img src="img/logo.png" alt=""></a>
            </div>
<!--            <div class="panel-control-right">-->
<!--                <a href="contact.html"><i class="fa fa-envelope-o"></i></a>-->
<!--            </div>-->
        </div>
    </div>
    <svg class="app-creative-navbar" viewBox="0 0 100 102" preserveAspectRatio="none">
        <path d="M0 0 L50 100 L100 0 Z"></path>
    </svg>
</div>
<!-- end navbar -->

<!-- panel control -->
<!--<div class="panel-control-left">-->
<!--    <ul id="slide-out-left" class="side-nav collapsible"  data-collapsible="accordion">-->
<!--        <li>-->
<!--            <div class="photos">-->
<!--                <img src="img/photos.png" alt="">-->
<!--                <h3>Mario Doe</h3>-->
<!--                <svg class="app-creative-panel" viewBox="0 0 100 102" preserveAspectRatio="none">-->
<!--                    <path d="M0 0 L50 100 L100 0 Z"></path>-->
<!--                </svg>-->
<!--            </div>-->
<!--        </li>-->
<!--        <li class="first-list">-->
<!--            <a href="index.html">Home</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="store.html">Store</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="portfolio.html">Portfolio</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="blog.html">Blog</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="faq.html">Faq</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="testimonial.html">Testimonial</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="404.html">404 Page</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="contact.html">Contact us</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="login.html">Login</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="register.html">Register</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</div>-->
<!-- end panel control -->

<?= $content ?>

<!-- footer -->
<footer>
    <div class="container">
        <h6>联 系 我 们</h6>
        <br>
        <div class="tel-fax-mail">
            <ul>
                <li><span>Tel:</span> 021-62511016</li>
                <li><span>Email:</span> info@autenggroup.com</li>
            </ul>
        </div>
    </div>
    <div class="ft-bottom">
        <span>Copyright © 2018 All Rights Reserved by 澳腾移民</span>
    </div>
</footer>
<!-- end footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



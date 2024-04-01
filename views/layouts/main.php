<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <style> @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap') </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="header">
    <div class="navbar_container">
        <a href="<?= Yii::$app->homeUrl ?>" class="navbar_button_logo">
            <img src="http://mk/web/image/logo.png" alt="Логотип" class="logo_img">
            <p class="logo_text">MK-SOUND.PRO</p>
        </a>
        <ul class="navbar_ul">
            <li class="navbar_li"><a href="<?= Url::to(['/site/index']) ?>">Каталог</a></li>
            <li class="navbar_li"><a href="<?= Url::to(['/site/rent']) ?>">Аренда</a></li>
            <li class="navbar_li"><a href="<?= Url::to(['/site/basket']) ?>">Корзина</a></li>
            <li class="navbar_li"><a href="#">Тел: 8 (800) 555 - 35 -35</a></li>
            <li class="navbar_li"><a href="#">VK</a></li>
            <li class="navbar_li"><a href="#">Telegram</a></li>
<!--            --><?//= Html::a('Выйти', ['/site/logout'], ['class' => 'navbar-li', 'data' => ['method' => 'post']]) ?>
        </ul>
    </div>
</header>

<!--Контент-->
<main>
    <div class="container_content">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


<!-- Footer-->
<!--<footer class="text-center text-lg-start bg-body-tertiary text-muted" style="margin-top: 26px">-->
<!--    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">-->
<!--        © 2021 Copyright:-->
<!--        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>-->
<!--    </div>-->
<!--</footer>-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

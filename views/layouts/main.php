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
$this->registerLinkTag([
    'rel' => 'apple-touch-icon',
    'sizes' => '180x180',
    'href' => Yii::getAlias('@web/favicons/apple-touch-icon.png')
]);
$this->registerLinkTag([
    'rel' => 'icon',
    'type' => 'image/png',
    'sizes' => '32x32',
    'href' => Yii::getAlias('@web/favicons/favicon-32x32.png')
]);
$this->registerLinkTag([
    'rel' => 'icon',
    'type' => 'image/png',
    'sizes' => '16x16',
    'href' => Yii::getAlias('@web/favicons/favicon-16x16.png')
]);
$this->registerLinkTag([
    'rel' => 'manifest',
    'href' => Yii::getAlias('@web/favicons/site.webmanifest')
]);
$this->registerLinkTag([
    'rel' => 'mask-icon',
    'href' => Yii::getAlias('@web/favicons/safari-pinned-tab.svg'),
    'color' => '#5bbad5'
]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <style> @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap') </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<a href="' . Yii::$app->homeUrl . '" class="navbar_button_logo">
        <img src="/image/logo.png" alt="Логотип" class="logo_img">
        <p class="logo_text">MK-SOUND.PRO</p>
    </a>',
        'brandOptions' => ['class' => 'navbar-brand navbar_container'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar'],
        'items' => [
            ['label' => 'Каталог', 'url' => ['/site/index'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
            ['label' => 'Аренда', 'url' => ['/site/rent'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
            ['label' => 'Корзина', 'url' => ['/site/basket'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
            ['label' => 'Тел: 8 (800) 555 - 35 -35', 'url' => ['#'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
            ['label' => 'VK', 'url' => ['#'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
            ['label' => 'Telegram', 'url' => ['#'], 'linkOptions' => ['class'=>'navbar_li your_custom_class']],
        ]
    ]);
    NavBar::end();
    ?>
</header>

<!--<header class="header">-->
<!--    <div class="navbar_container">-->
<!--        <a href="--><?//= Yii::$app->homeUrl ?><!--" class="navbar_button_logo">-->
<!--            <img src="http://mk/web/image/logo.png" alt="Логотип" class="logo_img">-->
<!--            <p class="logo_text">MK-SOUND.PRO</p>-->
<!--        </a>-->
<!--        <ul class="navbar_ul">-->
<!--            <li class="navbar_li"><a href="--><?//= Url::to(['/site/index']) ?><!--">Каталог</a></li>-->
<!--            <li class="navbar_li"><a href="--><?//= Url::to(['/site/rent']) ?><!--">Аренда</a></li>-->
<!--            <li class="navbar_li"><a href="--><?//= Url::to(['/site/basket']) ?><!--">Корзина</a></li>-->
<!--            <li class="navbar_li"><a href="#">Тел: 8 (800) 555 - 35 -35</a></li>-->
<!--            <li class="navbar_li"><a href="#">VK</a></li>-->
<!--            <li class="navbar_li"><a href="#">Telegram</a></li>-->
<!--            --><?//= Html::a('Выйти', ['/site/logout'], ['class' => 'navbar-li', 'data' => ['method' => 'post']]) ?>
<!--        </ul>-->
<!--    </div>-->
<!--</header>-->

<!--Контент-->
<main>
    <div class="container" style="    width: 100%;
    margin-top: 20px;
    padding-right: 7%;
    padding-left: 7%;">
        <div class="">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
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

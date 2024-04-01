<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoryRent $model */

$this->title = Yii::t('app', 'Создание категории аренды');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Создать'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-rent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

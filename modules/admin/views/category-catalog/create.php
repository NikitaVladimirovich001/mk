<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CategoryCatalog $model */

$this->title = Yii::t('app', 'Создание Категории каталога');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Создать'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

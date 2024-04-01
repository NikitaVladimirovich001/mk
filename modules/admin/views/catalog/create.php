<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Catalog $model */

$this->title = Yii::t('app', 'Создание каталога');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Каталог'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

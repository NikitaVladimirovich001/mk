<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rent $model */

$this->title = Yii::t('app', 'Создание аренды');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CategoryCatalog $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group" style="    margin-top: 1%;">
        <?= Html::submitButton(Yii::t('app', 'Сохронить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
?>
<div class="container_login">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>




    <div class="warp_form_login">
        <div class="text_login_glav">
            <h3 class="text_login">Авторизация</h3>
        </div>
        <?= $form->field($model, 'username')->label('Логин')->textInput(['placeholder' => 'Логин', 'autofocus' => true, 'class' => 'my-input-class']) ?>
        <?= $form->field($model, 'password')->label('Пароль')->passwordInput(['placeholder' => 'пароль', 'autofocus' => true, 'class' => 'my-input-class'])?>
        <?= Html::submitButton('Войти', ['class' => 'btn_login', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

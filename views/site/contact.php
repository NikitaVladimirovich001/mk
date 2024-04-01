<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>







<?php
//
///** @var yii\web\View $this */
///** @var yii\bootstrap5\ActiveForm $form */
//
///** @var app\models\ContactForm $model */
//
//use yii\bootstrap5\ActiveForm;
//use yii\bootstrap5\Html;
//use yii\captcha\Captcha;
//
//$this->title = 'Корзина';
//?>
<!--<div class="container_basket">-->
<!---->
<!--    <div class="left_block_basket">-->
<!--        <div class="left_block_1_basket">-->
<!--            <h4 class="zag_category">Продажа</h4>-->
<!--            <div class="basket_tovar">-->
<!--                <div class="block_text_price">-->
<!--                    <p class="basket_p">Название товара</p>-->
<!--                    <p class="basket_price">(5450 ₽)</p>-->
<!--                </div>-->
<!--                <a href="#" class=""><button class="btn_delete">Удалить</button></a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="left_block_2_basket">-->
<!--            <h4 class="zag_category">Аренда</h4>-->
<!--            <div class="basket_tovar">-->
<!--                <div class="block_text_price">-->
<!--                    <p class="basket_p">Название товара</p>-->
<!--                    <p class="basket_price">(5450 ₽)</p>-->
<!--                </div>-->
<!--                <a href="#" class=""><button class="btn_delete">Удалить</button></a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--    <div class="right_block_basket">-->
<!--        <div class="text_login_glav">-->
<!--            <h4 class="text_login">Оформление заказа</h4>-->
<!--        </div>-->
<!--        --><?php //$form = ActiveForm::begin(['id' => 'contact-form']); ?>
<!---->
<!--        --><?//= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
<!---->
<!--        --><?//= $form->field($model, 'email') ?>
<!---->
<!--        --><?//= $form->field($model, 'subject') ?>
<!---->
<!--        <label class="custom-checkbox">-->
<!--            <input class="hidden-checkbox" type="checkbox" required>-->
<!--            <div class="checkbox">-->
<!--                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ffffff" d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>-->
<!--            </div>-->
<!--            <p class="text_checkbox">Согласие с обработкой данных</p>-->
<!--        </label>-->
<!---->
<!--        <div class="form-group">-->
<!--            --><?//= Html::submitButton('Отправить заявку', ['class' => 'btn_login', 'name' => 'contact-button']) ?>
<!--        </div>-->
<!--        --><?php //ActiveForm::end(); ?>
<!--    </div>-->
<!---->
<!--</div>-->
<!---->

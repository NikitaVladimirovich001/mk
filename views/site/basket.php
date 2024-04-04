<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Корзина';
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Корзина покупок, Товары в корзине, Оформление заказа, Оплата заказа'
]);

?>
<div class="container_basket">
    <div class="left_block_basket">
        <div class="left_block_1_basket">
            <h4 class="zag_category">Продажа</h4>
            <?php if (isset($catalog) && count($catalog) > 0): ?>
                <?php foreach ($catalog as $item): ?>
                    <div class="basket_tovar">
                        <div class="block_text_price">
                            <p class="basket_p"><?= $item->name ?></p>
                            <p class="basket_price">(<?= $item->price ?>₽)</p>
                        </div>
                        <a href="<?php echo Url::toRoute(['site/remove-catalog', 'id'=>$item->id]) ?>" class="">
                            <button class="btn_delete">Удалить</button>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h6>Пока нет добавленного товара</h6>
            <?php endif; ?>
        </div>

        <div class="left_block_2_basket">
            <h4 class="zag_category">Аренда</h4>
            <?php if (isset($rent) && count($rent) > 0): ?>
                <?php foreach ($rent as $item): ?>
                    <div class="basket_tovar">
                        <div class="block_text_price">
                            <p class="basket_p"><?= $item->name ?></p>
                            <p class="basket_price">(<?= $item->price ?>₽)</p>
                        </div>
                        <a href="<?php echo Url::toRoute(['site/remove-rent', 'id'=>$item->id]) ?>" class="">
                            <button class="btn_delete">Удалить</button>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h6>Пока нет добавленного товара для аренды</h6>
            <?php endif; ?>
        </div>
    </div>

    <div class="right_block_basket">
        <div class="text_login_glav">
            <h4 class="text_login">Оформление заказа</h4>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'contact-form',
            'options' => ['class' => 'my-contact-form'],
        ]); ?>

        <?= $form->field($model, 'username')->label('Имя')->textInput(['placeholder' => 'Имя', 'autofocus' => true, 'class' => 'my-input-class']) ?>

        <?= $form->field($model, 'phone_number')->label('Телефон')->widget(MaskedInput::class, [
            'mask' => '+7-(999)-999-99-99',
            'options' => [
                    'placeholder' => '+7-(800)-555-35-35',
                    'class' => 'my-input-class',
            ],
        ]) ?>        <?= $form->field($model, 'email')->label('Email')->textInput(['placeholder' => 'example@mail.com', 'autofocus' => true, 'class' => 'my-input-class'])  ?>

        <label class="custom-checkbox">
            <input class="hidden-checkbox" type="checkbox" required>
            <div class="checkbox">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ffffff" d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
            </div>
            <p class="text_checkbox">Согласие с обработкой данных</p>
        </label>

        <div class="form-group">
            <?= Html::submitButton('Отправить заявку', ['class' => 'btn_login', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
<?php use app\models\Catalog;
use app\models\Rent; ?>

<div class="container_order">
    <div class="order_wrap">
        <div class="disp">
            <h3 class="zag_order">Тема: Заказ №<?= $model->id ?> с сайта MKSOUND.PRO</h3>
        </div>

        <?php if (!empty($catalog)): ?>
            <h3 class="zag">Продажа</h3>
        <?php endif;?>
        <?php foreach ($catalog as $item): ?>
            <div class="wrap_text">
                <p class="zag_item"><?= $item->name ?></p>
            </div>
        <?php endforeach; ?>

        <?php if (!empty($rent)): ?>
            <h3 class="zag">Аренда</h3>
        <?php endif;?>
        <?php foreach ($rent as $item): ?>
            <div class="wrap_text">
                <p class="zag_item"><?= $item->name ?></p>
            </div>
        <?php endforeach; ?>

        <h3 class="zag">Информация о заказчике</h3>

        <div class="wrap_text">
            <p class="zag_item">Имя: <?= $model->username ?></p>
        </div>

        <div class="wrap_text">
            <p class="zag_item">Номер телефона: <?= $model->phone_number ?></p>
        </div>

        <div class="wrap_text">
            <p class="zag_item">Почта: <?= $model->email ?></p>
        </div>

        <div class="wrap_text">
            <p class="zag_item">Дата создания заказа: <?= date('d.m.Y \в H:i') ?></p>
        </div>

    </div>
</div>

<style>
    /* Заказ */
    .order_wrap {
        width: 500px;
        height: auto;
        padding: 20px;
        background: rgb(245, 245, 245);
        border-radius: 10px;
    }

    .disp {
        margin-left: 63px;
    }

    .zag {
        color: rgb(33, 37, 41);
        font-family: Nunito;
        font-size: 21px;
        font-weight: 700;
        line-height: 29px;
    }

    .zag_item {
        color: rgb(33, 37, 41);
        font-family: Nunito;
        font-size: 18px;
        font-weight: 400;
        line-height: 25px;
        margin: 0px;
    }

    .wrap_text {
        padding-top: 5px;
        padding-right: 19px;
        padding-bottom: 5px;
        padding-left: 19px;
        width: auto;
        height: auto;
        border-radius: 5px;
        background: rgb(255, 255, 255);
        margin-bottom: 16px;
    }
</style>

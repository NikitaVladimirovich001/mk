<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Каталог';
$this->registerMetaTag(
    ['name' => 'keywords',
        'content' => 'Каталог купить описание, Покупка музыкального оборудования описание, Магазин музыкального оборудования описание, 
        Продажа звукового оборудования описание, Купить акустические системы описание, Магазин музыкальных инструментов описание, 
        Заказать световое оборудование для мероприятий описание, Приобрести DJ оборудование описание, 
        Купить микшерные консоли описание, Заказать микрофоны и аудиоаппаратуру описание, Магазин студийного оборудования описание, 
        Продажа музыкальных эффектов и аппаратуры звукозаписи описание, mk-sound'
    ]);

?>
<div class="banner_cat">

    <div class="cat_glav">
        <div class="category_block">
            <h4 class="zag_category">Категории</h4>
            <div class="block_warp_button">
                <?php foreach ($categories as $item): ?>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/filtercatalog', 'category_id' => $item->id]) ?>">
                        <button class="wrap_category">
                            <p class="text_category"><?= $item->name ?></p>
                        </button>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="tov_block">
        <?php foreach ($catalog as $item): ?>
            <div class="wrap_card">
                <div class="card_tovar">
                    <a href="<?= Url::toRoute(['site/opisanie-catalog', 'id'=> $item->id]) ?>" class="">
                        <?php if ($item->image): ?>
                            <?= Html::img($item->image, ['class' => 'card_img_tovar', 'alt' => $item->name]) ?>
                        <?php else: ?>
                            <?= Html::img('image/logo.png', ['class' => 'card_img_tovar', 'alt' => $item->name]) ?>
                        <?php endif; ?>
                        <div class="price_and_skid">
                            <h5 class="card_price_tovar"><?= $item->price ?>₽</h5>
                            <h5 class="card_price_tovar_skid"><?= $item->price * 1.1 ?>₽</h5>
                        </div>
                    </a>
                    <p class="card_title_tovar"><?= $item->name ?></p>
                    <a href="<?php echo \yii\helpers\Url::toRoute(['site/add-catalog', 'id' => $item->id]) ?>">
                        <button type="submit" class="btn_tovar">В корзину</button>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
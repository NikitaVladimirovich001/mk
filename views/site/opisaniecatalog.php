<?php

use yii\helpers\Html;

$this->title = 'Описание';
$this->registerMetaTag(
    ['name' => 'keywords',
        'content' => 'Каталог купить описание, Покупка музыкального оборудования описание, Магазин музыкального оборудования описание, 
        Продажа звукового оборудования описание, Купить акустические системы описание, Магазин музыкальных инструментов описание, 
        Заказать световое оборудование для мероприятий описание, Приобрести DJ оборудование описание, 
        Купить микшерные консоли описание, Заказать микрофоны и аудиоаппаратуру описание, Магазин студийного оборудования описание, 
        Продажа музыкальных эффектов и аппаратуры звукозаписи описание, Аренда музыкального оборудования описание, Прокат звукового оборудования описание, Аренда акустических систем описание, 
        Прокат музыкальных инструментов описание, Аренда светового оборудования для мероприятий описание, 
        Прокат DJ оборудования описание, Аренда микшерных консолей описание, Прокат микрофонов и аудиоаппаратуры описание, 
        Аренда студийного оборудования описание, Прокат музыкальных эффектов и аппаратуры звукозаписи описание, mk-sound'
    ]);

?>
<?php if($catalog): ?>
    <div class="banner_cat">
        <div class="top_wrap_opisanie">
            <div class="wrap_1_opisanie">
                <?php if ($catalog->image): ?>
                    <img src="<?= $catalog->image ?>" alt="" class="img_opisanie">
                <?php else: ?>
                    <img src="../image/logo.png" alt="" class="img_opisanie">
                <?php endif; ?>
                <div class="wrap_1_opisanie_block_1">
                    <h4 class="zag_wrap_1_opisanie_block_1"><?= $catalog->name ?></h4>
                    <p class="xar_wrap_1_opisanie_block_1">Характиристики</p>
                    <p class="text_wrap_1_opisanie_block_1"><?= $catalog->characteristics ?></p>
                </div>
            </div>
            <div class="wrap_2_opisanie">
                <div class="video-container">
                    <?php if ($catalog->video): ?>
                        <video loop autoplay muted controls src="<?= $catalog->video ?>" class="video_opisanie"></video>
                    <?php else: ?>
                        <img src="../image/logo.png" alt="" class="img_opisanie">
                    <?php endif; ?>
                </div>
                <div class="button_opisanie">
                    <div class="price_and_skid">
                        <p class="price_opisanie"><?= $catalog->price ?>₽</p>
                        <p class="price_opisanie_skidka"><?= $catalog->price * 1.1 ?>₽</p>
                    </div>
                    <a href="<?php echo \yii\helpers\Url::toRoute(['site/add-catalog', 'id' => $catalog->id]) ?>"><button type="submit" class="btn_opisanie">В корзину</button></a>
                </div>
            </div>
        </div>
        <div class="buuton_wrap_opisanie">
            <p class="xar_wrap_1_opisanie_block_1">Описание</p>
            <p class="text_2_wrap_1_opisanie_block_1"><?= $catalog->description ?></p>
        </div>
    </div>
<?php else: ?>
    <div class="banner_cat">
        <div class="top_wrap_opisanie">
            <div class="wrap_1_opisanie">
                <?php if ($rent->image): ?>
                    <img src="<?= $catalog->image ?>" alt="" class="img_opisanie">
                <?php else: ?>
                    <img src="../image/logo.png" alt="" class="img_opisanie">
                <?php endif; ?>
                <div class="wrap_1_opisanie_block_1">
                    <h4 class="zag_wrap_1_opisanie_block_1"><?= $rent->name ?></h4>
                    <p class="xar_wrap_1_opisanie_block_1">Характиристики</p>
                    <p class="text_wrap_1_opisanie_block_1"><?= $rent->characteristics ?></p>
                </div>
            </div>
            <div class="wrap_2_opisanie">
                <div class="video-container">
                    <?php if ($rent->video): ?>
                        <video loop autoplay muted controls src="<?= $rent->video ?>" class="video_opisanie"></video>
                    <?php else: ?>
                        <img src="../image/logo.png" alt="" class="img_opisanie">
                    <?php endif; ?>
                </div>
                <div class="button_opisanie">
                    <div class="price_and_skid">
                        <p class="price_opisanie"><?= $rent->price ?>₽</p>
                        <p class="price_opisanie_skidka"><?= $rent->price * 1.1 ?>₽</p>
                    </div>
                    <a href="<?php echo \yii\helpers\Url::toRoute(['site/add-catalog', 'id' => $rent->id]) ?>"><button type="submit" class="btn_opisanie">В корзину</button></a>
                </div>
            </div>
        </div>
        <div class="buuton_wrap_opisanie">
            <p class="xar_wrap_1_opisanie_block_1">Описание</p>
            <p class="text_2_wrap_1_opisanie_block_1"><?= $rent->description ?></p>
        </div>
    </div>
<?php endif; ?>

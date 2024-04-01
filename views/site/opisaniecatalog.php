<?php

$this->title = 'Описание';
?>
<?php if($catalog): ?>
    <div class="banner_cat">
        <div class="top_wrap_opisanie">
            <div class="wrap_1_opisanie">
                <img src="http://mk/web/image/<?= $catalog->image ?>" alt="" class="img_opisanie">
                <div class="wrap_1_opisanie_block_1">
                    <h4 class="zag_wrap_1_opisanie_block_1"><?= $catalog->name ?></h4>
                    <p class="xar_wrap_1_opisanie_block_1">Характиристики</p>
                    <p class="text_wrap_1_opisanie_block_1"><?= $catalog->characteristics ?></p>
                </div>
            </div>
            <div class="wrap_2_opisanie">
                <div class="video-container">
                    <video loop autoplay muted controls src="../image/1.mp4" class="video_opisanie"></video>
                </div>
                <div class="button_opisanie">
                    <div class="price_and_skid">
                        <p class="price_opisanie"><?= $catalog->price ?> ₽</p>
                        <p class="price_opisanie_skidka">200 ₽</p>
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
                <img src="http://mk/web/image/<?= $rent->image ?>" alt="" class="img_opisanie">
                <div class="wrap_1_opisanie_block_1">
                    <h4 class="zag_wrap_1_opisanie_block_1"><?= $rent->name ?></h4>
                    <p class="xar_wrap_1_opisanie_block_1">Характиристики</p>
                    <p class="text_wrap_1_opisanie_block_1"><?= $rent->characteristics ?></p>
                </div>
            </div>
            <div class="wrap_2_opisanie">
                <div class="video-container">
                    <video loop autoplay muted controls src="../image/1.mp4" class="video_opisanie"></video>
                </div>
                <div class="button_opisanie">
                    <div class="price_and_skid">
                        <p class="price_opisanie"><?= $rent->price ?>₽</p>
                        <p class="price_opisanie_skidka">200₽</p>
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

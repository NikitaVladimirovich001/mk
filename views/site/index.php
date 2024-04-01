<?php

$this->title = 'Каталог';
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
                    <a href="<?= \yii\helpers\Url::toRoute(['site/opisanie-catalog', 'id'=> $item->id]) ?>" class="">
                        <img src="http://mk/web/image/<?= $item->image ?>" class="card_img_tovar" alt="...">
                        <div class="price_and_skid">
                            <h5 class="card_price_tovar"><?= $item->price ?></h5>
                            <h5 class="card_price_tovar_skid">2200</h5>
                        </div>
                        <h6 class="card_title_tovar"><?= $item->name ?></h6>
                    </a>

                    <a href="<?php echo \yii\helpers\Url::toRoute(['site/add-catalog', 'id' => $item->id]) ?>"><button type="submit" class="btn_tovar">В корзину</button></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
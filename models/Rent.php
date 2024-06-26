<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string|null $video
 * @property string $characteristics
 * @property string|null $description
 * @property int $price
 * @property int $category_id
 *
 * @property Basket[] $baskets
 * @property CategoryRent $category
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'characteristics', 'price', 'category_id'], 'required'],
            [['characteristics', 'description'], 'string'],
            [['price', 'category_id'], 'integer'],
            ['name', 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryRent::class, 'targetAttribute' => ['category_id' => 'id']],
            ['image', 'file', 'extensions' => 'png, jpg', 'on'=>'update'],
            ['video', 'file', 'extensions' => 'mp4, avi', 'on'=>'update']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'image' => Yii::t('app', 'Изображение'),
            'video' => Yii::t('app', 'Видео'),
            'characteristics' => Yii::t('app', 'Характиристика'),
            'description' => Yii::t('app', 'Описание'),
            'price' => Yii::t('app', 'Цена'),
            'category_id' => Yii::t('app', 'Категория'),
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['rent_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryRent::class, ['id' => 'category_id']);
    }


    public function upload()
    {
        if ($this->validate()) {
            $basePath = 'public/images/products/';
            $currentDateFolder = date('Y/m/d');
            $basePath .= $currentDateFolder . '/';

            // Создаем папку, если ее еще нет
            if (!is_dir($basePath)) {
                mkdir($basePath, 0777, true);
            }

            $fileName = $basePath . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($fileName);

            $this->image = "../" . $fileName;
            $this->save();

            return true;
        } else {
            return false;
        }
    }

    public function uploadVideo()
    {
        if ($this->validate()) {
            $basePath = 'public/video/products/';
            $currentDateFolder = date('Y/m/d');
            $basePath .= $currentDateFolder . '/';

            // Создаем папку, если ее еще нет
            if (!is_dir($basePath)) {
                mkdir($basePath, 0777, true);
            }

            $fileName = $basePath . $this->video->baseName . '.' . $this->video->extension;
            $this->video->saveAs($fileName);

            $this->video = '../' . $fileName;
            $this->save();

            return true;
        } else {
            return false;
        }
    }
}

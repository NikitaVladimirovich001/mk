<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
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
 * @property CategoryCatalog $category
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
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
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryCatalog::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'characteristics' => Yii::t('app', 'Характеристика'),
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
        return $this->hasMany(Basket::class, ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryCatalog::class, ['id' => 'category_id']);
    }

    public function deleteFiles()
    {
        // Путь к файлу изображения
        $imagePath = $this->image;

        // Путь к файлу видео
        $videoPath = $this->video;

        // Удаляем изображение, если оно существует
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Удаляем видеофайл, если он существует
        if (file_exists($videoPath)) {
            unlink($videoPath);
        }

        return true;
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

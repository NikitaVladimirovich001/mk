<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property int $id
 * @property string $username
 * @property string $phone_number
 * @property string $email
 * @property int $basket_id
 * @property string $created_at
 *
 * @property Basket $basket
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'phone_number', 'basket_id'], 'required'],
            ['email', 'email'],
            [['basket_id'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'phone_number', 'email'], 'string', 'max' => 256],
            [['basket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::class, 'targetAttribute' => ['basket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Ид'),
            'username' => Yii::t('app', 'Имя'),
            'phone_number' => Yii::t('app', 'Телефон'),
            'email' => Yii::t('app', 'Почта'),
            'basket_id' => Yii::t('app', 'Корзина'),
            'created_at' => Yii::t('app', 'Дата отправки'),
        ];
    }

    /**
     * Gets query for [[Basket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasket()
    {
        return $this->hasOne(Basket::class, ['id' => 'basket_id']);
    }
}

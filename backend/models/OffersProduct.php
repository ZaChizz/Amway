<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "offers_product".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_offers
 *
 * @property Offers $idOffers
 * @property Product $idProduct
 */
class OffersProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_offers'], 'required'],
            [['id_product', 'id_offers'], 'integer'],
            [['id_offers'], 'exist', 'skipOnError' => true, 'targetClass' => Offers::className(), 'targetAttribute' => ['id_offers' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'id product',
            'id_offers' => 'id offers',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOffers()
    {
        return $this->hasOne(Offers::className(), ['id' => 'id_offers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}

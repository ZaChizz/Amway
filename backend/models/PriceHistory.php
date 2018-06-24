<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "price_history".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $price
 * @property string $created_at
 *
 * @property Product $idProduct
 */
class PriceHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'price', 'created_at'], 'required'],
            [['id_product', 'price'], 'integer'],
            [['created_at'], 'string', 'max' => 255],
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
            'id_product' => 'Id Product',
            'price' => 'цена',
            'created_at' => 'единица измерения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}

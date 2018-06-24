<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_color".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_color
 *
 * @property Color $idColor
 * @property Product $idProduct
 */
class ProductColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_color'], 'required'],
            [['id_product', 'id_color'], 'integer'],
            [['id_color'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['id_color' => 'id']],
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
            'id_color' => 'Id Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColor()
    {
        return $this->hasOne(Color::className(), ['id' => 'id_color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}

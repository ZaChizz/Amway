<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property integer $id_product
 * @property string $title
 *
 * @property Product $idProduct
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $vendor_code; 
    
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'title'], 'required'],
            [['id_product','vendor_code'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'vendor_code' => 'артикул',
            'id_product' => 'товар',
            'title' => 'название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
    
    public function afterFind()
    {
        $this->vendor_code = $this->product->vendor_code;
    }
}

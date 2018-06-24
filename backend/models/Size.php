<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property integer $id
 * @property string $title
 * @property string $unit
 *
 * @property Product[] $products
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'unit'], 'required'],
            [['title', 'unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'название',
            'unit' => 'единицы измерения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_size' => 'id']);
    }
}

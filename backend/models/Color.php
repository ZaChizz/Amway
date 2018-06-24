<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property integer $id
 * @property string $title
 * @property string $rgb
 *
 * @property ProductColor[] $productColors
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'rgb'], 'required'],
            [['title', 'rgb'], 'string', 'max' => 255],
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
            'rgb' => 'цвет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductColors()
    {
        return $this->hasMany(ProductColor::className(), ['id_color' => 'id']);
    }
}

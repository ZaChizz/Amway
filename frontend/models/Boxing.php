<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "boxing".
 *
 * @property integer $id
 * @property integer $id_boxing_label
 * @property string $title
 * @property string $unit
 *
 * @property BoxingLabel $idBoxingLabel
 * @property Product[] $products
 */
class Boxing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boxing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_boxing_label', 'title', 'unit'], 'required'],
            [['id_boxing_label'], 'integer'],
            [['title', 'unit'], 'string', 'max' => 255],
            [['id_boxing_label'], 'exist', 'skipOnError' => true, 'targetClass' => BoxingLabel::className(), 'targetAttribute' => ['id_boxing_label' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_boxing_label' => 'Id Boxing Label',
            'title' => 'название',
            'unit' => 'единица измерения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoxingLabel()
    {
        return $this->hasOne(BoxingLabel::className(), ['id' => 'id_boxing_label']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_boxing' => 'id']);
    }
}

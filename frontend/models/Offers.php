<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $title
 *
 * @property OffersProduct[] $offersProducts
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffersProducts()
    {
        return $this->hasMany(OffersProduct::className(), ['id_offers' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OffersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OffersQuery(get_called_class());
    }
}

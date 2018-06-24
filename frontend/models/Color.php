<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $title
 * @property string $rgb
 *
 * @property Category $idCategory
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
            [['id_category', 'title', 'rgb'], 'required'],
            [['id_category'], 'integer'],
            [['title', 'rgb'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'title' => 'название',
            'rgb' => 'цвет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }
}

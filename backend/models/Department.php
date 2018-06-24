<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $backgroundColor
 * @property string $landHeader
 * @property string $landTitle
 * @property string $label
 * @property string $labelClass
 *
 * @property Category[] $categories
 * @property Group[] $groups
 * @property Product[] $products
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'image', 'backgroundColor', 'landHeader', 'landTitle', 'label'], 'string', 'max' => 255],
            [['labelClass'], 'string', 'max' => 5],
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
            'image' => 'фото стены',
            'backgroundColor' => 'титул стены',
            'landHeader' => 'заголовок стены',
            'landTitle' => 'титул стены',
            'label' => 'ярлык',
            'labelClass' => 'html Class',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id_department' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id_department' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_department' => 'id']);
    }
    
}

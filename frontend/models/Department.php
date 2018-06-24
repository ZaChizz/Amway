<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $landHeader
 * @property string $landTitle
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
            [['title', 'image', 'landHeader', 'landTitle'], 'string', 'max' => 255],
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
            'landHeader' => 'заголовок стены',
            'landTitle' => 'титул стены',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id_department' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
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
    
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'id']);
    }
}

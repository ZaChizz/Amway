<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_group
 * @property integer $id_department
 * @property integer $id_skin
 * @property integer $id_flavor
 * @property integer $id_size
 * @property integer $id_weight
 * @property integer $id_volume
 * @property string $title
 * @property string $variant_title
 * @property integer $vendor_code
 * @property string $description
 * @property string $short_description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $display
 * @property integer $grouping
 *
 * @property OffersProduct[] $offersProducts
 * @property PriceHistory[] $priceHistories
 * @property Category $idCategory
 * @property Department $idDepartment
 * @property Flavor $idFlavor
 * @property Group $idGroup
 * @property Size $idSize
 * @property Skin $idSkin
 * @property Volume $idVolume
 * @property Weight $idWeight
 * @property ProductColor[] $productColors
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'id_group', 'id_department', 'id_skin', 'id_flavor', 'id_size', 'id_weight', 'id_volume', 'title', 'variant_title', 'vendor_code', 'description', 'created_at', 'updated_at', 'display', 'grouping'], 'required'],
            [['id_category', 'id_group', 'id_department', 'id_skin', 'id_flavor', 'id_size', 'id_weight', 'id_volume', 'vendor_code', 'created_at', 'updated_at', 'display', 'grouping'], 'integer'],
            [['description'], 'string'],
            [['title', 'variant_title', 'short_description'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
            [['id_flavor'], 'exist', 'skipOnError' => true, 'targetClass' => Flavor::className(), 'targetAttribute' => ['id_flavor' => 'id']],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['id_group' => 'id']],
            [['id_size'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['id_size' => 'id']],
            [['id_skin'], 'exist', 'skipOnError' => true, 'targetClass' => Skin::className(), 'targetAttribute' => ['id_skin' => 'id']],
            [['id_volume'], 'exist', 'skipOnError' => true, 'targetClass' => Volume::className(), 'targetAttribute' => ['id_volume' => 'id']],
            [['id_weight'], 'exist', 'skipOnError' => true, 'targetClass' => Weight::className(), 'targetAttribute' => ['id_weight' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Категории',
            'id_group' => 'Группы',
            'id_department' => 'Отдел',
            'id_skin' => 'Кожа',
            'id_flavor' => 'Запах',
            'id_size' => 'Размер',
            'id_weight' => 'Вес',
            'id_volume' => 'Объем',
            'title' => 'Название',
            'variant_title' => 'Вариант',
            'vendor_code' => 'Артикул',
            'description' => 'Описание',
            'short_description' => 'Короткое описание',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'display' => 'Отображение в каталоге',
            'grouping' => 'Группировка вариаций',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffersProducts()
    {
        return $this->hasMany(OffersProduct::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceHistories()
    {
        return $this->hasMany(PriceHistory::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'id_department']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor()
    {
        return $this->hasOne(Flavor::className(), ['id' => 'id_flavor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'id_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'id_size']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkin()
    {
        return $this->hasOne(Skin::className(), ['id' => 'id_skin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVolume()
    {
        return $this->hasOne(Volume::className(), ['id' => 'id_volume']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeight()
    {
        return $this->hasOne(Weight::className(), ['id' => 'id_weight']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductColors()
    {
        return $this->hasMany(ProductColor::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['id_product' => 'id']);
    }
}

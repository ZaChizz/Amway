<?php

namespace frontend\models;

use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_group
 * @property integer $id_department
 * @property string $skin
 * @property string $flavor
 * @property string $amount
 * @property string $weight
 * @property string $volume
 * @property string $rgb
 * @property string $consist
 * @property string $packaging
 * @property string $applications
 * @property string $with_use
 * @property string $necessary
 * @property string $useful
 * @property string $title
 * @property string $brand
 * @property string $variant_title
 * @property integer $vendor_code
 * @property string $description
 * @property string $short_description
 * @property string $tag_search
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $display
 * @property integer $grouping
 *
 * @property OffersProduct[] $offersProducts
 * @property PriceHistory[] $priceHistories
 * @property Category $idCategory
 * @property Department $idDepartment
 * @property Group $idGroup
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
            [['id_category', 'id_group', 'id_department', 'title', 'brand', 'variant_title', 'vendor_code', 'description', 'created_at', 'updated_at', 'display', 'grouping'], 'required'],
            [['id_category', 'id_group', 'id_department', 'vendor_code', 'created_at', 'updated_at', 'display', 'grouping'], 'integer'],
            [['consist', 'applications', 'with_use', 'necessary', 'useful', 'description'], 'string'],
            [['skin', 'flavor', 'amount', 'weight', 'volume', 'rgb', 'packaging', 'title', 'brand', 'variant_title', 'short_description', 'tag_search'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
            [['id_group'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['id_group' => 'id']],
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
            'id_group' => 'Id Group',
            'id_department' => 'Id Department',
            'skin' => 'кожа',
            'flavor' => 'запах',
            'amount' => 'количество',
            'weight' => 'вес',
            'volume' => 'объем',
            'rgb' => 'цвет',
            'consist' => 'состав',
            'packaging' => 'упаковка',
            'applications' => 'способ приминения',
            'with_use' => 'c этим средством используют',
            'necessary' => 'это средство необходимо для людей, у которых',
            'useful' => 'это полезно знать',
            'title' => 'название',
            'brand' => 'бренд',
            'variant_title' => 'вариант',
            'vendor_code' => 'артикул',
            'description' => 'описание',
            'short_description' => 'короткое описание',
            'tag_search' => 'теги для поиска',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'display' => 'отображение в каталоге',
            'grouping' => 'группировка вариаций',
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
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'id_group']);
    }
    
    public function getImages()
    {
        return $this->hasMany(ProductImage::className(), ['id_product' => 'id']);
    }
    
    protected function getCountPrice()
    {
        return count($this->priceHistories);
    }
    
    public function getPricePrev()
    {
        $count = $this->countPrice;
        if($count)
        {
            if($count == 1)
                return $this->priceHistories[0]->price;
            if($count>1)
                return $this->priceHistories[$count-2]->price;
          
        }
        else
            return null;
    }
    
    public function getPriceCurrent()
    {
        $count = $this->countPrice;
        if($count)
        {
            if($count == 1)
                return $this->priceHistories[0]->price;
            if($count>1)
                return $this->priceHistories[$count-1]->price;
        }
        else
            return null;
        
        
    }
    
    public function getTagsAsArray()
    {
        return explode(",", $this->tag_search);
    }
    
    public function getTagsAsLinksearch()
    {
        $string = '';
        foreach($this->tagsAsArray as $link)
        {
            $string .= Html::a($link,false).'/';
        }
        return $string;
    }
}
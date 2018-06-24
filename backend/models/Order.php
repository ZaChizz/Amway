<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $phone
 * @property string $first_name
 * @property integer $display
 * @property string $shopping_cart
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    
    const STATUS = array('1'=>'новый','2'=>'в работе');
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display', 'shopping_cart', 'created_at', 'updated_at'], 'required'],
            [['display', 'created_at', 'updated_at'], 'integer'],
            [['shopping_cart'], 'string'],
            [['phone', 'first_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'номер заказа',
            'phone' => 'телефон',
            'first_name' => 'имя',
            'display' => 'статус',
            'shopping_cart' => 'корзина',
            'created_at' => 'создано',
            'updated_at' => 'исправлено',
        ];
    }
}

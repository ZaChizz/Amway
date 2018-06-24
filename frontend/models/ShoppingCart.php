<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ShoppingCart extends Model
{
    public $amt;
    public $id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['amt', 'id'], 'required'],
            // rememberMe must be a boolean value
            [['amt','id'], 'integer'],
           
        ];
    }
    
    public function initialized($id)
    {
        $this->id = $id;
        $this->amt = 1;
        
        return $this;
    }
    
}

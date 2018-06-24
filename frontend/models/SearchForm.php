<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchForm extends Model
{
    public $query;
   // public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            ['query', 'required'],
            ['query', 'string', 'max' => 255],
            // email has to be a valid email address
            // verifyCode needs to be entered correctly
       //     ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
         //   'verifyCode' => 'Верификационный код',
            'query' => 'Введите поисковый запрос'
        ];
    }

}

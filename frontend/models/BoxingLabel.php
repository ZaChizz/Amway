<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "boxing_label".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Boxing[] $boxings
 */
class BoxingLabel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boxing_label';
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
    public function getBoxings()
    {
        return $this->hasMany(Boxing::className(), ['id_boxing_label' => 'id']);
    }
}

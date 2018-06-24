<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[OffersProduct]].
 *
 * @see OffersProduct
 */
class OffersProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OffersProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OffersProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

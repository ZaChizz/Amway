<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProductColor;

/**
 * ProductColorSearch represents the model behind the search form about `backend\models\ProductColor`.
 */
class ProductColorSearch extends ProductColor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_product', 'id_color'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductColor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_product' => $this->id_product,
            'id_color' => $this->id_color,
        ]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\product`.
 */
class ProductSearch extends product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_group', 'id_department', 'id_skin', 'id_flavor', 'id_size', 'id_weight', 'id_volume', 'vendor_code', 'created_at', 'updated_at', 'display', 'grouping'], 'integer'],
            [['title', 'variant_title', 'description', 'short_description'], 'safe'],
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
        $query = product::find();

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
            'id_category' => $this->id_category,
            'id_group' => $this->id_group,
            'id_department' => $this->id_department,
            'id_skin' => $this->id_skin,
            'id_flavor' => $this->id_flavor,
            'id_size' => $this->id_size,
            'id_weight' => $this->id_weight,
            'id_volume' => $this->id_volume,
            'vendor_code' => $this->vendor_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'display' => $this->display,
            'grouping' => $this->grouping,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'variant_title', $this->variant_title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'short_description', $this->short_description]);

        return $dataProvider;
    }
}

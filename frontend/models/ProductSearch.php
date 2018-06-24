<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\product;

/**
 * ProductSearch represents the model behind the search form about `frontend\models\product`.
 */
class ProductSearch extends product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_group', 'id_department', 'vendor_code', 'created_at', 'updated_at', 'display', 'grouping'], 'integer'],
            [['skin', 'flavor', 'amount', 'weight', 'volume', 'rgb', 'consist', 'packaging', 'applications', 'with_use', 'necessary', 'useful', 'title', 'brand', 'variant_title', 'description', 'short_description', 'tag_search'], 'safe'],
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
        $query2 = product::find();
        $query3 = product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_category' => $this->id_category,
            'id_group' => $this->id_group,
            'id_department' => $this->id_department,
            'vendor_code' => $this->vendor_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'display' => $this->display,
            'grouping' => $this->grouping,
        ]);

        $query->andFilterWhere(['like', 'skin', $this->skin])
            ->andFilterWhere(['like', 'flavor', $this->flavor])
            ->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'rgb', $this->rgb])
            ->andFilterWhere(['like', 'applications', $this->applications])
            ->andFilterWhere(['like', 'with_use', $this->with_use])
            ->andFilterWhere(['like', 'necessary', $this->necessary])
            ->andFilterWhere(['like', 'useful', $this->useful])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'variant_title', $this->variant_title])
            ->andFilterWhere(['like', 'tag_search', $this->tag_search])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'short_description', $this->short_description]);
        
        
        if($this->title)
        {
            $query2->andFilterWhere(['like', 'title', $this->title]);
        
            $query->union($query2); 
        }
        

        
        
        
        

        return $dataProvider;
    }
}

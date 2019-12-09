<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'length', 'width', 'height'], 'integer'],
            [['sku' ,'name' ,'price', 'quantity'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Product::find();

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

        if ($this->category > 0){
            $query->andFilterWhere([
                'category' => $this->category,
            ]);
        }

        if (isset($this->price) and strpos($this->price,';') !== false){
            $price = explode(';',$this->price);
            $price_min = $price[0];
            $price_max = $price[1];
            $query->andFilterWhere(['>=', 'price', $price_min]);
            $query->andFilterWhere(['<=', 'price', $price_max]);
        }

        if (isset($this->quantity) and strpos($this->quantity,';') !== false){
            $quantity = explode(';',$this->quantity);
            $quantity_min = $quantity[0];
            $quantity_max = $quantity[1];
            $query->andFilterWhere(['>=', 'quantity', $quantity_min]);
            $query->andFilterWhere(['<=', 'quantity', $quantity_max]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
        ]);

        $query->andFilterWhere(['like', 'sku', $this->sku]);
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}

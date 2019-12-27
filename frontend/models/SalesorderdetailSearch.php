<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Salesorderdetail;

/**
 * SalesorderdetailSearch represents the model behind the search form about `frontend\models\Salesorderdetail`.
 */
class SalesorderdetailSearch extends Salesorderdetail
{
    /**
     * @inheritdoc
     */
    public $product;
    public $productsubcategory;
    
    public function rules()
    {
        return [
            [['sales_order_id', 'sales_order_detail_id', 'product_id', 'paid'], 'integer'],
            //relations product productsubcategory
            [['nextclean_date', 'modified_date','product','productsubcategory'], 'safe'],
            [['unit_price'], 'number'],
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
        $query = Salesorderdetail::find();
        //included as safe
        $query->joinWith(['productsubcategory','product']);

        // add conditions that should always apply here
        //if ((Yii::$app->request->get('sorderpd') === 0))
        //{
        //$query->andFilterWhere(['>=','unit_price','paid']); 
        //}

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'db' => \frontend\components\Utilities::userdb(),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }
        
        $dataProvider->sort->attributes['productsubcategory'] = [
        'asc' => ['productsubcategory.sort_order' => SORT_ASC],
        'desc' => ['productsubcategory.sort_order' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['product'] = [
        'asc' => ['product.productnumber' => SORT_ASC],
        'desc' => ['product.productnumber' => SORT_DESC],
        ];
                
        // grid filtering conditions
        $query->andFilterWhere([
            'sales_order_id'  => Yii::$app->session['sales_order_id'],
            'sales_order_detail_id' => $this->sales_order_detail_id,
            'nextclean_date' => $this->nextclean_date,
            'product_id' => $this->product_id,
            'productcategory_id' => $this->productcategory_id,
            'productsubcategory_id'=> $this->productsubcategory_id,
            'unit_price' => $this->unit_price,
            'paid' => $this->paid,
            'modified_date' => $this->modified_date,
        ]);
        
        $query->andFilterWhere(['like', 'works_product.productnumber', $this->product]);
        // $query->andFilterWhere(['like', 'works_productsubcategory.name', $this->productsubcategory]);
        $query->andFilterWhere(['like', 'works_productsubcategory.sort_order', $this->productsubcategory]);
        
        return $dataProvider;
    }
}

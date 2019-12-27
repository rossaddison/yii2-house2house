<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\Sort;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

class ProductImport extends Product
{
    
    public function rules()
    {
        return [
            [['id','productcategory_id', 'productsubcategory_id'], 'integer'],
            [['name', 'surname','frequency','contactmobile','specialrequest', 'sellstartdate', 'sellenddate', 'discontinueddate', 'modifieddate'], 'safe'],
            [['listprice'], 'number'],
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

    public function attributeLabels()
    {
        return [
            'id' => 'House',
            'name' => 'Firstname',
            'surname' => 'Surname',
            'contactmobile' => 'Contact Mobile',
            'specialrequest' => 'Special Request',
            'listprice' => 'Price',
            'productnumber'=>'House Number',
            'productcategory_id' => 'Postcode Area (eg. G32 - Carntyne)',
            'postcode' =>'Postcode',
            'productsubcategory_id' => 'Street',
            'sellstartdate' => 'First clean date',
            'sellenddate' => 'Next Clean date',
            'discontinueddate' => 'Discontinued Date',           
        ];
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
        //$query = Product::find()->indexBy('id');
        $query = Product::find();
        
        $dataProvider = new ActiveDataProvider([
          'pagination' => ['pageSize' => 10],
          'query' => $query,
          'db'=> \frontend\components\Utilities::userdb(),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // Error: Call to a member function getSchema() on null therefore uncomment the following line
            //$query->where('0=1');
            return $dataProvider;
        }
         
        $dataProvider->sort->attributes['productcategory_id'] = [
        'asc' => ['productcategory_id' => SORT_ASC],
        'desc' => ['productcategory_id' => SORT_DESC],
        ];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'listprice' => $this->listprice,
            'productcategory_id' => $this->productcategory_id,
            'productsubcategory_id' => $this->productsubcategory_id,
            'frequency'=>$this->frequency,
            'name'=>$this->name,
            'surname'=>$this->surname,
            'gc_number'=>$this->gc_number,
            'sellstartdate' => $this->sellstartdate,
            'sellenddate' => $this->sellenddate,
            'discontinueddate' => $this->discontinueddate,
            'modifieddate' => $this->modifieddate,
        ])
        //->andFilterWhere(['>=', 'productcategory_id',$this->productcategory_id,])
        //    ->orderBy('productcategory_id')
        ->all();
        
        return $dataProvider;
    }
}

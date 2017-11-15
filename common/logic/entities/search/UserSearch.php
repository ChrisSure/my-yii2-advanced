<?php

namespace common\logic\entities\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use common\logic\entities\auth\User;

/**
 * UserSearch represents the model behind the search form about `app\modules\live\models\User`.
 */
class UserSearch extends User
{
    
    public $date_from;
    public $date_to;
    public $role;
    
    
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['username', 'role'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
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
        $query = User::find()->joinWith('auth');

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
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['auth_assignment.item_name' => $this->role]);
		$query->andFilterWhere(['>=', 'user.created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'user.created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);
        $query->andFilterWhere(['like', 'username', Html::encode($this->username)]);

        return $dataProvider;
    }
}

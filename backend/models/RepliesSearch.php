<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Replies;

/**
 * RepliesSearch represents the model behind the search form about `backend\models\Replies`.
 */
class RepliesSearch extends Replies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['replyid', 'topicid', 'userid'], 'integer'],
            [['content', 'creationdate'], 'safe'],
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
        $query = Replies::find();

        // add conditions that should always apply here
       // $query->joinWith('topic');
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
            'replyid' => $this->replyid,
            'creationdate' => $this->creationdate,
            'topicid' => $this->topicid,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}

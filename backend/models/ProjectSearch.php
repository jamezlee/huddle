<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `backend\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectid', 'userid'], 'integer'],
            [['projectname', 'projectclassification', 'projectdescription', 'projectplanedstartdate', 'projectplanedenddate', 'projectactualstartdate', 'projectactualenddate', 'createdate', 'projectstatus'], 'safe'],
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
        $query = Project::find();

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
            'projectid' => $this->projectid,
            'projectplanedstartdate' => $this->projectplanedstartdate,
            'projectplanedenddate' => $this->projectplanedenddate,
            'projectactualstartdate' => $this->projectactualstartdate,
            'projectactualenddate' => $this->projectactualenddate,
            'createdate' => $this->createdate,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'projectname', $this->projectname])
            ->andFilterWhere(['like', 'projectclassification', $this->projectclassification])
            ->andFilterWhere(['like', 'projectdescription', $this->projectdescription])
            ->andFilterWhere(['like', 'projectstatus', $this->projectstatus]);

        return $dataProvider;
    }
}

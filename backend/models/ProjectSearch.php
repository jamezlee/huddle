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

    public $globalProjectSearch;



    public function rules()
    {
        return [
            [['projectid', 'userid'], 'integer'],
            [['globalProjectSearch','projectname', 'projectclassification', 'projectdescription', 'projectplannedstartdate', 'projectplannedenddate', 'projectactualstartdate', 'projectactualenddate', 'creationdate', 'projectstatus', 'projectfile', 'comments'], 'safe'],
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
        $query->joinWith('user');

        // grid filtering conditions
//        $query->andFilterWhere([
//            'projectid' => $this->projectid,
//            'projectplannedstartdate' => $this->projectplannedstartdate,
//            'projectplannedenddate' => $this->projectplannedenddate,
//            'projectactualstartdate' => $this->projectactualstartdate,
//            'projectactualenddate' => $this->projectactualenddate,
//            'creationdate' => $this->creationdate,
//            'userid' => $this->userid,
//        ]);



        $query->orFilterWhere(['like', 'projectname', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'projectclassification', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'projectdescription', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'projectstatus', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'projectfile', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'user.username', $this->globalProjectSearch])
            ->orFilterWhere(['like', 'comments', $this->globalProjectSearch]);

        return $dataProvider;
    }
}

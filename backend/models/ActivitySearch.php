<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Activity;


/**
 * ActivitySearch represents the model behind the search form about `backend\models\Activity`.
 */
class ActivitySearch extends Activity
{

    public $globalActivitySearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activityid', 'projectid', 'comments'], 'integer'],
            [['globalActivitySearch','activityname', 'activitydescription', 'activityplannedstartdate', 'activityplannedenddate', 'activityactualstartdate', 'activityactualenddate', 'creationdate', 'activitystatus'], 'safe'],
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
        $query = Activity::find();

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
        $query->joinWith('project');

//          grid filtering conditions
//        $query->andFilterWhere([
//            'activityid' => $this->activityid,
////            'projectid' => $this->projectid,
//            'activityplannedstartdate' => $this->activityplannedstartdate,
//            'activityplannedenddate' => $this->activityplannedenddate,
//            'activityactualstartdate' => $this->activityactualstartdate,
//            'activityactualenddate' => $this->activityactualenddate,
//            'creationdate' => $this->creationdate,
//            'comments' => $this->comments,
//        ]);

        $query->orFilterWhere(['like', 'activityname', $this->globalActivitySearch])
            ->orFilterWhere(['like', 'activitydescription', $this->globalActivitySearch])
            ->orFilterWhere(['like', 'activitystatus', $this->globalActivitySearch])
            ->orFilterWhere(['like', 'project.projectname', $this->globalActivitySearch]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Task;

/**
 * TaskSearch represents the model behind the search form about `backend\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public $globalTaskSearch;
    public function rules()
    {
        return [
            [['assignID', 'userid', 'activityid'], 'integer'],
            [['globalTaskSearch','taskname', 'taskdescription', 'taskplannedstartdate', 'taskplannedenddate', 'taskactualstartdate', 'taskactualenddate', 'creationdate', 'taskstatus', 'taskfile', 'comments'], 'safe'],
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
        $query = Task::find();

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
       // $query->joinWith('activity');
        $query->joinWith('user');
        // grid filtering conditions
//        $query->andFilterWhere([
//            'assignID' => $this->assignID,
//            'userid' => $this->userid,
//            'activityid' => $this->activityid,
//            'taskplannedstartdate' => $this->taskplannedstartdate,
//            'taskplannedenddate' => $this->taskplannedenddate,
//            'taskactualstartdate' => $this->taskactualstartdate,
//            'taskactualenddate' => $this->taskactualenddate,
//            'creationdate' => $this->creationdate,
//        ]);

        $query->orFilterWhere(['like', 'taskname', $this->globalTaskSearch])
            ->orFilterWhere(['like', 'taskdescription', $this->globalTaskSearch])
            ->orFilterWhere(['like', 'taskstatus', $this->globalTaskSearch])
            ->orFilterWhere(['like', 'taskfile', $this->globalTaskSearch])
           // ->orFilterWhere(['like', 'activity.activityname', $this->$globalTaskSearch])
            ->orFilterWhere(['like', 'user.username', $this->globalTaskSearch])
           // ->orFilterWhere(['like', 'project.projectname', $this->$globalTaskSearch])
            ->orFilterWhere(['like', 'comments', $this->globalTaskSearch]);

        return $dataProvider;
    }
}

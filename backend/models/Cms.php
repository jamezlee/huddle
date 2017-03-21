<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cms".
 *
 * @property integer $id
 * @property string $aboutus
 * @property string $faq
 * @property string $contactus
 */
class Cms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aboutus', 'faq', 'contactus'], 'required'],
            [['aboutus', 'faq', 'contactus'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aboutus' => 'Aboutus',
            'faq' => 'Faq',
            'contactus' => 'Contactus',
        ];
    }
}

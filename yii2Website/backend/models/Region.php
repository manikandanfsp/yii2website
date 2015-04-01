<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property string $region_name
 * @property integer $region_status
 * @property string $created_at
 *
 * @property Beverage[] $beverages
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_name', 'region_status'], 'required'],
            [['region_status'], 'integer'],
            [['created_at'], 'safe'],
            [['region_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_name' => 'Region Name',
            'region_status' => 'Region Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeverages()
    {
        return $this->hasMany(Beverage::className(), ['region_id' => 'id']);
    }
}

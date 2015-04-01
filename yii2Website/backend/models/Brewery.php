<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brewery".
 *
 * @property integer $id
 * @property string $brewery_name
 * @property integer $brewery_status
 * @property string $created_at
 *
 * @property Beverage[] $beverages
 */
class Brewery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brewery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brewery_name', 'brewery_status'], 'required'],
            [['brewery_status'], 'integer'],
            [['created_at'], 'safe'],
            [['brewery_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brewery_name' => 'Brewery Name',
            'brewery_status' => 'Brewery Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeverages()
    {
        return $this->hasMany(Beverage::className(), ['brewery_id' => 'id']);
    }
}

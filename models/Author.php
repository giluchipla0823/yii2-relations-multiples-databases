<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    public static function getDatabaseName(){
        return 'db_api_authors';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_authors');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'country'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'gender', 'country'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

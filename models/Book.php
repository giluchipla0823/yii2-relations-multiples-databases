<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $author_id
 * @property string $created_at
 * @property string $updated_at
 */
class Book extends \yii\db\ActiveRecord
{
    public $authorName;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price', 'author_id'], 'required'],
            [['price', 'author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}

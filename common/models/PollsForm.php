<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "polls".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $created_at
 */
class PollsForm extends Model
{
    public $name;
    public $email;
    public $rating = [];
    public $comment;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'rating', 'comment'], 'required'],
            [['comment'], 'string'],
            ['rating', 'each', 'rule' => ['number', 'min' => 0, 'max' => 10]],
            [['name', 'email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => Poll::class],
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
            'email' => 'Email',
            'rating' => 'Rating',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    public function ratingList()
    {
        $ratingScale = [0,1,2,3,4,5,6,7,8,9,10];
        return array_combine($ratingScale, $ratingScale);
    }

}

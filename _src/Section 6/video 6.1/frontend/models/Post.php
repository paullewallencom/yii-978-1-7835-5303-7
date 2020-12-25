<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $body  (MySQL TEXT field type)
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
        ];
    }
	
	public function getResult() {
		if (empty($this->body))
			return self::find();
		
		$params = [':post' => $this->body];
		return self::find()->where(['like', 'body', "%" . $this->body . "%", FALSE]);
	}
}

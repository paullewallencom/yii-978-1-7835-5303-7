<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $body
 */
class Mongopost extends \yii\mongodb\ActiveRecord
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
	
	public function attributes() {
		
		return ['_id', 'body'];
	}
	
	public function getResult() {
		if (empty($this->body))
			return self::find();
		
		return self::find()->where(['like', 'body', $this->body, false]);
	}
}

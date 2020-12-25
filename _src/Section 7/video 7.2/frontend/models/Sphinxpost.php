<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $body
 */
class Sphinxpost extends \yii\sphinx\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sphinxpost';
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
		return self::findBySql("SELECT id, body FROM `sphinxpost` WHERE MATCH(:post)", $params);
	}
}

<?php

namespace tests\codeception\frontend\models;

use Yii;
use tests\codeception\frontend\unit\DbTestCase;
use frontend\models\Post;
use tests\codeception\common\fixtures\PostFixture;
use common\models\User;
use Codeception\Specify;

class PostTest extends DbTestCase
{
    use Specify;

    public function testSave()
    {
        $this->specify('is saving correct', function () {

            $model = new Post();
            $model->body = 'some text';

            expect('saved successfully', $model->save())->true();

        });
		
        $this->specify('body should be a string', function () {
            $model = new Post();
			$model->body = 1;
			
            expect('save fails', $model->save())->false();
        });
    }

    public function fixtures()
    {
        return [
            'user' => [
                'class' => PostFixture::className(),
                'dataFile' => '@tests/codeception/frontend/unit/fixtures/data/models/post.php'
            ],
        ];
    }
}

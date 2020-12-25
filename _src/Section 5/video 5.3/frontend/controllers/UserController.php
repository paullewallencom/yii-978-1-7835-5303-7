<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],		
//			[
//				'class' => 'yii\filters\PageCache',
//				'only' => ['view'],
//				'duration' => 60,
//				'variations' => [
//					\Yii::$app->language //, Yii::$app->request->get('id'),
//				],
//				'dependency' => [
//					'class' => 'yii\caching\DbDependency',
//					'sql' => 'SELECT updated_at FROM user where id = :id',
//					'params' => [':id' => Yii::$app->request->get('id')],
//				],
//			],
//			[
//				'class' => 'yii\filters\HttpCache',
//				'only' => ['view'],
//				'lastModified' => function ($action, $params) {
//					$q = new \yii\db\Query();
//					return $q->select('updated_at')->from('user')
//							->where('id = :id', [':id' => Yii::$app->request->get('id')])->scalar();
//				},
//			],
        ];
    }

    /**
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single user model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$cache = Yii::$app->cache;
		$secretKey = $cache['secretKey'];
		if ($secretKey === false) {
			Yii::trace('set secret key in cache');
			$secretKey = Yii::$app->security->generateRandomKey();
			$cache->set('secretKey', $secretKey, 10);
		}
		
		$db = Yii::$app->db;
		$model = $db->cache(function($db) use ($id) {
			return Yii::$app->controller->findModel($id);
		});
        return $this->render('view', [
            'model' => $model,
			'key' => $secretKey,
        ]);
    }

    /**
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

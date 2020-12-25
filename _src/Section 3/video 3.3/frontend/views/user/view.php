<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\user */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

	<p>
		<?= 'User ID: ' . Html::encode($model->id); ?>
	</p>
	<p>
		<?php $escapedUsername = Html::encode($model->username); ?>
		<?= 'Username: ' . $escapedUsername; ?>
	</p>
	<p>
		<?= 'Key: ' . $key; ?>
	</p>
    <p>
		<?php $encodedUsername = Yii::$app->security->encryptByPassword(
				$escapedUsername, $key); ?>
		<?= 'Username: ' . $encodedUsername; ?>
	</p>
    <p>
		<?php $decodedUsername = Yii::$app->security->decryptByPassword(
				$encodedUsername, $key); ?>
		<?= 'Username: ' . $decodedUsername; ?>
	</p>
	<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('.');
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<div style="margin: 40px 0px">
		<?php $form = ActiveForm::begin([
			'layout' => 'horizontal',
			'fieldConfig' => [
	//			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
				'horizontalCssClasses' => [
					'label' => 'col-sm-1',
					'offset' => '',
					'wrapper' => 'col-sm-5 pull-left',
					'error' => '',
					'hint' => '',
				],
			],
		]);?>

		<?= $form->field($model, 'body')->textInput()->label('Keyword'); ?>


		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>


		<?php ActiveForm::end(); ?>
	</div>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'body:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

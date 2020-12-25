<?php
use tests\codeception\frontend\FunctionalTester;

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that post index page works');
$I->amOnPage(Yii::$app->urlManager->createUrl(['post/index']));
$I->see('Posts');
$I->seeLink('Create Post');
//$I->click('Permissions');
$I->see('Keyword');

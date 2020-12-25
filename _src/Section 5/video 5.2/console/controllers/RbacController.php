<?php
namespace console\controllers;
 
use Yii;
use yii\console\Controller;
use common\models\User;

/**
 * Description of RbacController
 *
 * @author vitalii
 */

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
 
		try {
			$authManager->removeAll();
			
			// Create roles
			$guest  = $authManager->createRole('guest');
			$author  = $authManager->createRole('author');
			$moderator = $authManager->createRole('moderator');
			$admin  = $authManager->createRole('admin');

			// Create simple, based on action{$NAME} permissions
			$postIndex		= $authManager->createPermission('post index');
			$postCreate		= $authManager->createPermission('post create');
			$postView		= $authManager->createPermission('post view');
			$postUpdate		= $authManager->createPermission('post update');
			$postDelete		= $authManager->createPermission('post delete');
			$categoryIndex	= $authManager->createPermission('category index');
			$categoryCreate = $authManager->createPermission('category create');
			$categoryView	= $authManager->createPermission('category view');
			$categoryUpdate = $authManager->createPermission('category update');
			$categoryDelete = $authManager->createPermission('category delete');

			// Add permissions in Yii::$app->authManager
			$authManager->add($postIndex);
			$authManager->add($postCreate);
			$authManager->add($postView);
			$authManager->add($postUpdate);
			$authManager->add($postDelete);
			$authManager->add($categoryIndex);
			$authManager->add($categoryCreate);
			$authManager->add($categoryView);
			$authManager->add($categoryUpdate);
			$authManager->add($categoryDelete);
			
			// Add rule, based on UserExt->group === $user->group
	//        $userGroupRule = new UserGroupRule();
	//        $authManager->add($userGroupRule);
	//
	//        // Add rule "UserGroupRule" in roles
	//        $guest->ruleName  = $userGroupRule->name;
	//        $brand->ruleName  = $userGroupRule->name;
	//        $talent->ruleName = $userGroupRule->name;
	//        $admin->ruleName  = $userGroupRule->name;

			// Add roles in Yii::$app->authManager
			$authManager->add($guest);
			$authManager->add($author);
			$authManager->add($moderator);
			$authManager->add($admin);

			// Add permission-per-role in Yii::$app->authManager
			// Guest
			$authManager->addChild($guest, $postIndex);
			$authManager->addChild($guest, $postView);
			$authManager->addChild($guest, $categoryIndex);
			$authManager->addChild($guest, $categoryView);

			// Author
			$authManager->addChild($author, $postCreate);
			$authManager->addChild($author, $guest);

			// Moderator
			$authManager->addChild($moderator, $postUpdate);
			$authManager->addChild($moderator, $postDelete);
			$authManager->addChild($moderator, $categoryCreate);
			$authManager->addChild($moderator, $categoryUpdate);
			$authManager->addChild($moderator, $author);

			// Admin
			$authManager->addChild($admin, $categoryDelete);
			$authManager->addChild($admin, $moderator);
		} catch (yii\console\Exception $e) {
			throw new $e;
		}
    }
	
	public function actionAssign()
	{
		$authManager = Yii::$app->authManager;
		
		try {
			$author  = $authManager->getRole('author');
			$moderator = $authManager->getRole('moderator');
			$admin  = $authManager->getRole('admin');

			$userAdmin = User::findByUsername('admin');
			$userModerator = User::findByUsername('moderator');
			$userAuthor = User::findByUsername('author');
			
			$authManager->assign($admin, $userAdmin->id);
			$authManager->assign($moderator, $userModerator->id);
			$authManager->assign($author, $userAuthor->id);
		} catch (yii\console\Exception $ex) {
			throw new $ex;
		}
	}
}

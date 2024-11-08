<?php

namespace app\controllers;

use app\form\LoginForm;
use app\form\UserForm;
use Yii;
use yii\db\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Class SiteController
 * @package app\controllers
 */
class SecurityController extends Controller
{
	/**
	 * @var string
	 */
	public $layout = 'empty';
	
	/**
	 * @param $action
	 * @return bool|Response
	 * @throws BadRequestHttpException
	 */
	public function beforeAction($action): Response|bool
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		return parent::beforeAction($action);
	}
	
	/**
	 * @return Response|string
	 */
	public function actionLogin(): Response|string
	{
		$model = new LoginForm();
		
		if ($this->request->isPost &&
			$model->load($this->request->post()) &&
			$model->login()
		) {
			return $this->goHome();
		}
		
		return $this->render('login', [
			'model' => $model,
		]);
	}
	
	/**
	 * @return Response
	 */
	public function actionLogout(): Response
	{
		Yii::$app->user->logout();
		
		return $this->goHome();
	}
	
	/**
	 * @return Response|string
	 * @throws Exception
	 */
	public function actionRegistration(): Response|string
	{
		$model = new UserForm();
		
		if ($this->request->isPost && $model->load($this->request->post()) && $user = $model->create()) {
			Yii::$app->user->login($user);
			
			return $this->goHome();
		}
		
		return $this->render('registration', [
			'model' => $model,
		]);
	}
}

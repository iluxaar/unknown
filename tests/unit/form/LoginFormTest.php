<?php

namespace app\tests\unit\form;

use app\form\LoginForm;
use app\tests\fixtures\UserFixture;

/**
 * Class LoginFormTest
 * @package app\tests\unit\form
 */
class LoginFormTest extends \Codeception\Test\Unit
{
	private LoginForm $model;
	
	public function _fixtures(): array
	{
		return [
			'profiles' => [
				'class' => UserFixture::class,
				'dataFile' => codecept_data_dir() . 'user.php'
			],
		];
	}
	
    protected function _after(): void
    {
        \Yii::$app->user->logout();
    }

    public function testLoginNoUser(): void
    {
        $this->model = new LoginForm([
            'email' => 'not_existing_user',
            'password' => 'wrong_password',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
    }

    public function testLoginWrongPassword(): void
    {
        $this->model = new LoginForm([
            'email' => 'test@test.lc',
            'password' => 'wrong_password',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
        expect($this->model->errors)->hasKey('password');
    }

    public function testLoginCorrect(): void
    {
        $this->model = new LoginForm([
            'email' => 'test@test.lc',
            'password' => '58d0cbc28c',
        ]);

        expect_that($this->model->login());
        expect_not(\Yii::$app->user->isGuest);
        expect($this->model->errors)->hasntKey('password');
    }

}

<?php

namespace unit\form;

use app\form\UserForm;
use app\tests\fixtures\UserFixture;
use yii\db\Exception;

/**
 * Class UserFormTest
 * @package app\tests\unit\form
 */
class UserFormTest extends \Codeception\Test\Unit
{
	private UserForm $model;
	
    protected function _after(): void
    {
        \Yii::$app->user->logout();
    }
	
	/**
	 * @return void
	 * @throws Exception
	 */
	public function testNewUserInvalidEmail(): void
	{
		$this->model = new UserForm([
			'name' => 'test',
			'email' => 'test',
			'mobile_phone' => '+7 (777) 877-88-78',
		]);
		
		expect_not($this->model->save());
		expect($this->model->errors)->hasKey('email');
	}
	
	/**
	 * @return void
	 * @throws Exception
	 */
    public function testNewUserInvalidMobilePhone(): void
    {
        $this->model = new UserForm([
	        'name' => 'test',
            'email' => 'test@test.lc',
            'mobile_phone' => '+7 (777) 877-88-7',
        ]);

        expect_not($this->model->save());
	    expect($this->model->errors)->hasKey('mobile_phone');
    }
}

<?php

namespace app\form;

use app\jobs\MailSendJob;
use app\models\User;
use Yii;
use yii\base\Model;
use yii\db\Exception;

/**
 * Class UserForm
 * @package app\form
 */
class UserForm extends Model
{
	/**
	 * @var string
	 */
	public $name;
	
	/**
	 * @var string
	 */
	public $email;
	
	/**
	 * @var string
	 */
	public $mobile_phone;
	
	/**
	 * @return array
	 */
	public function rules(): array
	{
		return [
			[['name', 'email', 'mobile_phone'], 'required'],
			[['email'], 'email',
				'message' => Yii::t('app', 'Недопустимый Email'),
			],
			['email', 'unique',
				'targetClass' => User::class,
				'message' => Yii::t('app', 'Email уже используется'),
			],
			['mobile_phone', 'unique',
				'targetClass' => User::class,
				'message' => Yii::t('app', 'Номер уже используется'),
			],
		];
	}
	
	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return [
			'name' => Yii::t('app', 'Имя мастера'),
			'email' => Yii::t('app', 'Email'),
			'mobile_phone' => Yii::t('app', 'Номер телефона'),
		];
	}
	
	/**
	 * @return bool|User
	 * @throws Exception
	 */
	public function save(): bool|User
	{
		if (!$this->validate()) {
			return false;
		}
		
		$user = new User([
			'name' => $this->name,
			'email' => $this->email,
			'mobile_phone' => $this->mobile_phone,
		]);
		
		$password = $user->setPassword();
		
		if ($user->save()) {
			$this->sendEmail($user, $password);
			return $user;
		}
		
		return false;
	}
	
	/**
	 * @param $user
	 * @param $password
	 * @return string|null
	 */
	protected function sendEmail($user, $password): ?string
	{
		$message = Yii::$app->mailer->compose('new-user', [
			'user' => $user,
			'password' => $password,
		])->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
			->setTo($user->email)
			->setSubject('Регистрация в системе ' . Yii::$app->name);
		
		return Yii::$app->queue->push(new MailSendJob([
			'message' => $message,
		]));
	}
	
}
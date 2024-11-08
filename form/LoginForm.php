<?php

namespace app\form;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * @property-read User|null $user
 */
class LoginForm extends Model
{
	/**
	 * @var
	 */
	public $email;
	
	/**
	 * @var
	 */
	public $password;
	
	/**
	 * @var bool
	 */
	private $_user;
	
	/**
	 * @return array
	 */
	public function rules(): array
	{
		return [
			[['email', 'password'], 'required'],
			['email', 'validateEmail'],
			['password', 'validatePassword'],
		];
	}
	
	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return [
			'email' => 'Email',
			'password' => 'Пароль',
		];
	}
	
	/**
	 * @param string $attribute
	 */
	public function validateEmail(string $attribute)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();
			
			if (!$user) {
				$this->addError($attribute, Yii::t('app', 'Пользователь не найден'));
			}
		}
	}
	
	/**
	 * @param string $attribute
	 */
	public function validatePassword(string $attribute)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();
			
			if ($user && !$user->validatePassword($this->password)) {
				$this->addError($attribute, Yii::t('app', 'Неверный пароль'));
			}
		}
	}
	
	/**
	 * @return bool
	 */
	public function login(): bool
	{
		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser());
		}
		return false;
	}
	
	
	/**
	 * @return User|null
	 */
	public function getUser(): ?User
	{
		if (!$this->_user) {
			$this->_user = User::findByEmail($this->email);
		}
		
		return $this->_user;
	}
}
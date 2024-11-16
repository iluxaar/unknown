<?php

namespace app\models;

use app\query\UserQuery;
use app\validators\MobileNumberValidator;
use Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name Имя мастера
 * @property string $email Email
 * @property string $mobile_phone Номер телефона
 * @property string $password_hash Хеш пароля
 */
class User extends ActiveRecord implements IdentityInterface
{
	/**
	 * @return string
	 */
    public static function tableName(): string
    {
        return 'user';
    }
	
	/**
	 * @return array
	 */
    public function rules(): array
    {
        return [
            [['name', 'email', 'mobile_phone'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
	        [['email'], 'email'],
            [['mobile_phone'], 'string', 'max' => 18],
	        [['password_hash'], 'string', 'max' => 32],
            [['email', 'mobile_phone'], 'unique'],
	        ['mobile_phone', MobileNumberValidator::class],
        ];
    }
	
	/**
	 * @return array
	 */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя мастера'),
	        'email' => Yii::t('app', 'Email'),
            'mobile_phone' => Yii::t('app', 'Номер телефона'),
        ];
    }
	
	/**
	 * @return array
	 */
	public static function list(): array
	{
		$users = self::find()
			->select(['id', 'name'])
			->orderBy('name')
			->asArray()
			->all();
		
		return ArrayHelper::map($users, 'id', 'name');
	}
	
	/**
	 * @return UserQuery
	 */
    public static function find(): UserQuery
    {
        return new UserQuery(static::class);
    }
	
	/**
	 * @param $email
	 * @return User|array|null
	 */
	public static function findByEmail($email): User|array|null
	{
		return self::find()
			->where(['email' => $email])
			->one();
	}
	
	/**
	 * @param $password
	 * @return bool
	 */
	public function validatePassword($password): bool
	{
		return $this->password_hash === md5($password);
	}
	
	/**
	 * @param $id
	 * @return User|IdentityInterface|null
	 */
	public static function findIdentity($id): User|IdentityInterface|null
	{
		return static::findOne($id);
	}
	
	/**
	 * @return string
	 * @throws Exception
	 */
	public function setPassword(): string
	{
		$password = bin2hex(random_bytes(5));
		$this->password_hash = md5($password);
		
		return $password;
	}
	
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
	
	public static function findIdentityByAccessToken($token, $type = null)
	{
		// TODO: Implement findIdentityByAccessToken() method.
	}
	
	public function getAuthKey()
	{
		// TODO: Implement getAuthKey() method.
	}
	
	public function validateAuthKey($authKey)
	{
		// TODO: Implement validateAuthKey() method.
	}
}

<?php

use yii\db\Migration;

/**
 * Class m241029_205648_create_tbl_user
 */
class m241029_205648_create_tbl_user extends Migration
{
	
	private const TBL = 'user';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable(self::TBL, [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull()->comment('Имя мастера'),
			'email' => $this->string(255)->notNull()->unique()->comment('Email'),
			'mobile_phone' => $this->string(18)->notNull()->unique()->comment('Номер телефона'),
			'password_hash' => $this->string(32)->notNull()->comment('Хэш пароля'),
			'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время добавления'),
		]);
		
		$this->createIndex('user_name_index', self::TBL, 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL);
    }

}

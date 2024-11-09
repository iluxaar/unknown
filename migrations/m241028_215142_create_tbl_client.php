<?php

use yii\db\Migration;

/**
 * Class m241028_215142_create_tbl_client
 */
class m241028_215142_create_tbl_client extends Migration
{
    private const TBL = 'client';

    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(self::TBL, [
            'id' => $this->primaryKey(),
            'name'=> $this->string(255)->notNull()->comment('Имя клиента'),
            'mobile_phone' => $this->string(18)->unique()->notNull()->comment('Номер телефона'),
            'birthday' => $this->string(10)->comment('День рождения'),
	        'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время добавления'),
            'comment' => $this->text()->comment('Примечание'),
        ]);
	    
	    $this->createIndex('client_name_index', self::TBL, 'name');
	    $this->createIndex('client_mobile_phone_index', self::TBL, 'mobile_phone');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable(self::TBL);
    }

}

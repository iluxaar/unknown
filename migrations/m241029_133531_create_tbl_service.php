<?php

use yii\db\Migration;

/**
 * Class m241029_133531_create_tbl_service
 */
class m241029_133531_create_tbl_service extends Migration
{
    private const TBL = 'service';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TBL, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique()->comment('Наименование'),
            'price' => $this->integer()->notNull()->comment('Стоимость'),
	        'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время добавления'),
        ]);
	    
	    $this->createIndex('service_name_index', self::TBL, 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TBL);
    }

}

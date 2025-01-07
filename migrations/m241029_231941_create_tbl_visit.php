<?php

use yii\db\Migration;

/**
 * Class m241029_231941_create_tbl_visit
 */
class m241029_231941_create_tbl_visit extends Migration
{
	private const TBL = 'visit';
	
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable(self::TBL, [
			'id' => $this->primaryKey(),
			'user_id' => $this->integer()->notNull()->comment('Мастер'),
			'client_id' => $this->integer()->notNull()->comment('Клиент'),
			'service_id' => $this->integer()->notNull()->comment('Процедура'),
			'visit_datetime' => $this->dateTime()->notNull()->comment('Время визита'),
			'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment('Статус записи'),
			'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('Время добавления'),
			'comment' => $this->text()->comment('Примечание'),
		]);
		
		$this->addForeignKey('visit_user_fk', self::TBL, 'user_id', 'user', 'id');
	    $this->addForeignKey('visit_client_fk', self::TBL, 'client_id', 'client', 'id');
	    $this->addForeignKey('visit_service_fk', self::TBL, 'service_id', 'service', 'id');
	    
	    $this->createIndex('visit_datetime_index', self::TBL, 'visit_datetime');
	    $this->createIndex('visit_status_index', self::TBL, 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropForeignKey('visit_service_fk', self::TBL);
	    $this->dropForeignKey('visit_client_fk', self::TBL);
	    $this->dropForeignKey('visit_user_fk', self::TBL);
        $this->dropTable(self::TBL);
    }
	
}
